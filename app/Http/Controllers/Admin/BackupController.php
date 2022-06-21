<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Layout;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Spatie\DbDumper\Databases\MySql;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BackupController extends Controller
{
    public function password()
    {
        session()->forget('pass');
        $layout = Layout::where('user_id', auth()->user()->id)->first(['create_btn']);
        return view('admin.web_backup.password', compact('layout'));
    }
    public function checkPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);
        session()->put('pass', $request->password);
        $admin    = User::wherePermission(1)->first();
        if (Hash::check($request->password, $admin->password)) {
            return redirect()->route('admin.backup.index');
        }
        Alert::error('Your password is incorrect');
        return redirect()->back();
    }
    public function index()
    {
        $layout = Layout::where('user_id', auth()->user()->id)->first(['tbl','tbl_bg','tbl_text','create_btn']);

        $password = session()->get('pass');
        $admin    = User::wherePermission(1)->first();
        if ($password && Hash::check($password, $admin->password)) {
            return view('admin.web_backup.index', [
                'backups' => $this->getBackups(),
            ], compact('layout'));
        }
        return redirect()->route('admin.backup.password');
    }

    /**
     * Run Application Files Backup
     * @param  string $value
     * @return [type]        [description]
     */
    public function backupFiles()
    {
        Artisan::call('backup:run', ['--only-files' => true, '--filename' => now()->format('Y-m-d-H-i-s').'_FILES.zip']);
        $output = Artisan::output();

        if (Str::contains($output, 'Backup completed!')) {
            toast('Files backed-up successfully', 'success');
        } else {
            toast('Files backed-up failed', 'error');
        }

        $db = $this->getBackups()->last();
        return $this->downloadBackup($db['filename'], $db['extension']);
    }

    /**
     * Run Application DB Backup
     * @param  string $value
     * @return [type]        [description]
     */
    public function backupDb()
    {
        Artisan::call('backup:run', ['--only-db' => true, '--filename' => now()->format('Y-m-d-H-i-s').'_DATABASE.zip']);
        $output = Artisan::output();

        if (Str::contains($output, 'Backup completed!')) {
            toast('Database backed-up successfully', 'success');
        } else {
            toast('Database backed-up failed', 'error');
        }
        $db = $this->getBackups()->last();
        return $this->downloadBackup($db['filename'], $db['extension']);
    }

    private function getBackups()
    {
        $path = public_path('backups');

        // Check if backup-file-path already exist
        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        $files = File::allFiles($path);
        $backups = collect([]);
        foreach ($files as $dt) {
            $backups->push([
                'filename' => pathinfo($dt->getFilename(), PATHINFO_FILENAME),
                'extension' => pathinfo($dt->getFilename(), PATHINFO_EXTENSION),
                'path' => $dt->getPath(),
                'size' => $dt->getSize(),
                'time' => $dt->getMTime(),
            ]);
        }
        return $backups;
    }

    public function downloadBackup($name, $ext)
    {
        $path = public_path('backups');
        $file = $path . '/' . $name . '.' . $ext;
        $status = Storage::disk('backup')->download($name . '.' . $ext, $name . '.' . $ext);
        return $status;
    }
    public function deleteBackup($name, $ext)
    {
        $path = public_path('backups');
        $file = $path . '/' . $name . '.' . $ext;
        $status = File::delete($file);
        if ($status) {
            toast('Backup deleted successfully', 'success');
        } else {
            toast('Ops! an error occurred, Try Again', 'error');
        }
        return redirect()->back();
    }
    public function restoreLoad(Request $request)
    {
        return view('admin.web-backup.restore');
    }

    public function dbdump()
    {
        // return 'k';
        MySql::create()
            ->setDbName(env('DB_DATABASE', 'forge'))
            ->setUserName(env('DB_USERNAME', 'forge'))
            ->setPassword(env('DB_PASSWORD', ''))
            ->dumpToFile(base_path('app' . now() . '.sql'));
        Alert::success('Database Dump Successful!', 'Please Check your root directory.');
        return back();
    }
}
