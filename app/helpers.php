<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

if (!function_exists('bdDate')) {
    function bdDate($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }
}

if (!function_exists('ageWithDays')) {
    function ageWithDays($d_o_b)
    {
        return Carbon::parse($d_o_b)->diff(Carbon::now())->format('%y years, %m months and %d days');
    }
}
if (!function_exists('ageWithMonths')) {
    function ageWithMonths($d_o_b)
    {
        return Carbon::parse($d_o_b)->diff(Carbon::now())->format('%y years, %m months');
    }
}

if (!function_exists('fileStore')) {
    function fileStore(Request $request, $requestName, string $name, string $path)
    {
        if ($request->hasFile($requestName)) {
            $pathCreate = public_path() . $path;
            !file_exists($pathCreate) ?? File::makeDirectory($pathCreate, 0777, true, true);

            $image = $request->file($requestName);
            $image_name = $name . uniqueId(10) . '.' . $image->getClientOriginalExtension();
            if ($image->isValid()) {
                $request->image->move($path, $image_name);

                return $image_name;
            }
        }
    }
}

/************************** Image **************************/
if (!function_exists('imageStore')) {
    function imageStore(Request $request, $request_name, string $name, string $path)
    {
        if ($request->hasFile($request_name)) {
            $pathCreate = public_path() . '/uploads/images/' . $path . '/';
            !file_exists($pathCreate) ?? File::makeDirectory($pathCreate, 0777, true, true);

            $image = $request->file($request_name);
            $imageName = $name . uniqueId(10) . '.' . $image->getClientOriginalExtension();
            if ($image->isValid()) {
                $request->$request_name->move(public_path() . '/uploads/images/' . $path . '/', $imageName);
                return $imageName;
            }
        }
    }
}

if (!function_exists('imageUpdate')) {
    function imageUpdate(Request $request, $request_name, string $name, string $path, $old_image)
    {
        if ($request->hasFile($request_name)) {
            $deletePath =  public_path() . '/uploads/images/' . $path . '/' . $old_image;
            if (file_exists($deletePath) && $old_image != '') {
                unlink($deletePath);
            }
            $createPath = public_path() . '/' . $path;
            !file_exists($createPath) ?? File::makeDirectory($createPath, 0777, true, true);

            $image = $request->file($request_name);
            $imageName = $name . '_' . uniqueId(10) . '.' . $image->getClientOriginalExtension();
            if ($image->isValid()) {
                $request->$request_name->move(public_path() . '/uploads/images/' . $path . '/', $imageName);
                return $imageName;
            }
        }
    }
}

if (!function_exists('profileImg')) {
    function profileImg()
    {
        if (!empty(user()->image) && file_exists(asset('uploads/images/user/' . user()->image))) {
            return asset('uploads/images/user/' . user()->image);
        } else {
            return asset('backend/images/brand/soft-giant-bd.svg');
        }
    }
}

if (!function_exists('imagePath')) {
    function imagePath($folder, $image = '')
    {
        $path = 'uploads/images/' . $folder . '/' . $image;
        if (file_exists($path) && @getimagesize($path)) {
            return asset($path);
        } else {
            // return setting('app_logo');
        }
    }
}

if (!function_exists('devAdminEmail')) {
    function devAdminEmail()
    {
        return 'dev.admin@shafi95.com';
    }
}


if (!function_exists('readableSize')) {
    function niceSize($bytes)
    {
        $units = ['B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB'];
        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }
        return round($bytes, 2) . ' ' . $units[$i];
    }
}

if (!function_exists('permissionText')) {
    function permissionText($permission)
    {
        switch ($permission) {
            case 0;
                $permission = 'No Login Permission';
                break;
            case 1;
                $permission = 'Admin';
                break;
            case 2;
                $permission = 'Creator';
                break;
            case 3;
                $permission = 'Editor';
                break;
            case 4;
                $permission = 'Viewer';
                break;
        }
        return $permission;
    }
}

if (!function_exists('profileImg')) {
    function profileImg($img)
    {
        if (file_exists(asset('uploads/images/users/' . $img))) {
            return asset('uploads/images/users/' . $img);
        } else {
            return asset('uploads/images/users/logo.png');
        }
    }
}

if (!function_exists('userCan')) {
    function userCan($permission)
    {
        if (auth()->check() && user()->can($permission)) {
            return true;
        }
        return false;
    }
}

if (!function_exists('readableSize')) {
    function readableSize($bytes)
    {
        $result = '';
        $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

        foreach ($arBytes as $arItem) {
            if ($bytes >= $arItem["VALUE"]) {
                $result = $bytes / $arItem["VALUE"];
                $result = strval(round($result, 2)) . " " . $arItem["UNIT"];
                break;
            }
        }
        return $result;
    }
}

if (!function_exists('activeSubNav')) {
    function activeSubNav($route)
    {
        if (is_array($route)) {
            $rt = '';
            foreach ($route as $rut) {
                $rt .= request()->routeIs($rut) || '';
            }
            return $rt ? ' activeSub ' : '';
        }
        return request()->routeIs($route) ? ' activeSub ' : '';
    }
}

if (!function_exists('activeNav')) {
    function activeNav($route)
    {
        if (is_array($route)) {
            $rt = '';
            foreach ($route as $rut) {
                $rt .= request()->routeIs($rut) || '';
            }
            return $rt ? ' active ' : '';
        }
        return request()->routeIs($route) ? ' active ' : '';
    }
}

if (!function_exists('openNav')) {
    function openNav(array $routes)
    {
        $rt = '';
        foreach ($routes as $route) {
            $rt .= request()->routeIs($route) || '';
        }
        return $rt ? ' show ' : '';
    }
}

if (!function_exists('uniqueId')) {
    function uniqueId($lenght = 8)
    {
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new \Exception("no cryptographically secure random function available");
        }
        return substr(bin2hex($bytes), 0, $lenght);
    }
}
if (!function_exists('user')) {
    function user()
    {
        return auth()->user();
    }
}

if (!function_exists('uniqueId')) {
    function uniqueId($lenght = 8)
    {
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new \Exception("no cryptographically secure random function available");
        }
        return substr(bin2hex($bytes), 0, $lenght);
    }
}

if (!function_exists('imageStore')) {
    function imageStore(Request $request, string $name, string $path)
    {
        if ($request->hasFile('image')) { // next time dinamic this
            $pathCreate = public_path() . $path;
            !file_exists($pathCreate) ?? File::makeDirectory($pathCreate, 0777, true, true);

            $image = $request->file('image');
            $image_name = $name . uniqueId(10) . '.' . $image->getClientOriginalExtension();
            if ($image->isValid()) {
                $request->image->move($path, $image_name);
                return $image_name;
            }
        }
    }
}

if (!function_exists('imageUpdate')) {
    function imageUpdate(Request $request, string $name, string $path, $image)
    {
        if ($request->hasFile('image')) {
            $deletePath =  public_path($path . $image);
            if (file_exists($deletePath) && $image != '') {
                unlink($deletePath);
            }
            // file_exists($deletePath) ? unlink($deletePath) : false;
            $createPath = public_path() . $path;
            !file_exists($createPath) ?? File::makeDirectory($createPath, 0777, true, true);

            $image = $request->file('image');
            $image_name = $name . uniqueId(20) . '.' . $image->getClientOriginalExtension();
            if ($image->isValid()) {
                $request->image->move($path, $image_name);
                return $image_name;
            }
        }
    }
}

if (!function_exists('destroy')) {
    function destroy($data)
    {
        try {
            $data->delete();
            Alert::success('Success', 'Successfully Deleted');
        } catch (\Exception $ex) {
            Alert::error('Oops...', 'Delete Failed');
        }
    }
}

if (!function_exists('fileDestroy')) {
    function fileDestroy(string $path, $data)
    {
        $checkPath =  public_path($path . $data->image);
        try {
            if (file_exists($checkPath)) {
                unlink($checkPath);
            }
            $data->delete();
            Alert::success('Success', 'Successfully Deleted');
        } catch (\Exception $ex) {
            Alert::error('Oops...', 'Delete Failed');
        }
    }
}

if (!function_exists('monthInBangla')) {
    function monthInBangla($month)
    {
        return match ($month) {
            '1'  => 'জানুয়ারি',
            '2'  => 'ফেব্রুয়ারি',
            '3'  => 'মার্চ',
            '4'  => 'এপ্রিল',
            '5'  => 'মে',
            '6'  => 'জুন',
            '7'  => 'জুলাই',
            '8'  => 'আগস্ট',
            '9'  => 'সেপ্টেম্বর',
            '10' => 'অক্টোবর',
            '11' => 'নভেম্বর ',
            '12' => 'ডিসেম্বর',
        };
    }
}

if (!function_exists('carbon')) {
    function carbon($date)
    {
        return \Carbon\Carbon::parse($date);
    }
}

if (!function_exists('digitInBangla')) {
    function digitInBangla($data)
    {
        for ($i = 0; $i < strlen($data); $i++) {
            $datum = match ($data[$i]) {
                '0' => '০',
                '1' => '১',
                '2' => '২',
                '3' => '৩',
                '4' => '৪',
                '5' => '৫',
                '6' => '৬',
                '7' => '৭',
                '8' => '৮',
                '9' => '৯',
            };
            print_r($datum);
        }
    }
}
