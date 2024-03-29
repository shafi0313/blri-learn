<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RoleToPermission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $pers = [
            'dashboard'=>[
                'access-dashboard',
                'dashboard-manage',
            ],
            'user'=>[
                'user-manage',
                'user-add',
                'user-edit',
                'user-delete',
                'user-impersonate',
                'user-access-dashboard',
            ],
            'activity'=>[
                'activity-manage',
                'activity-add',
                'activity-edit',
                'activity-delete'
            ],
            'permission'=>[
                'permission-manage',
                'permission-add',
                'permission-edit',
                'permission-delete',
                'permission-change'
            ],
            'role'=>[
                'role-manage',
                'role-add',
                'role-edit',
                'role-delete',
                'role-change'
            ],
            'backup'=>[
                'backup-manage',
                'backup-delete'
            ],
            'visitor'=>[
                'visitor-manage',
                'visitor-delete'
            ],
            'setting'=>[
                'setting-manage',
                'language-manage',
            ],
            'slider'=>[
                'slider-manage',
                'slider-add',
                'slider-edit',
                'slider-delete'
            ],
            'course-cat'=>[
                'course-cat-manage',
                'course-cat-add',
                'course-cat-edit',
                'course-cat-delete'
            ],
            'course'=>[
                'course-manage',
                'course-add',
                'course-edit',
                'course-delete'
            ],
            'lecture'=>[
                'lecture-manage',
                'lecture-add',
                'lecture-edit',
                'lecture-delete'
            ],
            'chapter'=>[
                'chapter-manage',
                'chapter-add',
                'chapter-edit',
                'chapter-delete'
            ],
            'quiz'=>[
                'quiz-manage',
                'quiz-add',
                'quiz-edit',
                'quiz-delete'
            ],
            'student-history'=>[
                'student-history-manage',
                'student-history-show',
                'student-history-delete'
            ],
        ];
        foreach ($pers as $per => $val) {
            foreach ($val as $name) {
                Permission::create([
                    'module'        => $per,
                    'name'          => $name,
                    'removable'     => 0,
                ]);
            }
        }


        // $superadmin = Role::create(['name' => 'superadmin','removable'=> 0]);
        $admin      = Role::create(['name' => 'admin','removable'=> 0]);
        $admin->givePermissionTo(Permission::all());
        $teacher    = Role::create(['name' => 'teacher','removable'=> 0]);
    }
}
