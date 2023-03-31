<?php

namespace Database\Seeders;

use App\Models\SystemVariable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guard_name = 'web';
        $role_names = ['Admin', 'SubAdmin', 'Content', 'Product', 'View'];
        foreach ($role_names as $_name) {
            Role::findOrCreate($_name, $guard_name);
        }

        $group_perms = [
            '1'  => [
                'xem danh sach bai viet' => [1, 2, 3],
                'them bai viet'          => [1, 2, 3],
                'sua bai viet'           => [1, 2, 3],
            ],
            '2'  => [
                'xem danh sach nhom bai viet' => [1, 2, 3],
                'them nhom bai viet'          => [1, 2, 3],
                'sua nhom bai viet'           => [1, 2, 3],
            ],
            '3'  => [
                'xem san pham'  => [1, 2, 3],
                'them san pham' => [1, 2, 3],
                'sua san pham'  => [1, 2, 3],
            ],
            '4'  => [
                'xem nhom san pham'  => [1, 2, 3],
                'them nhom san pham' => [1, 2, 3],
                'sua nhom san pham'  => [1, 2, 3],
                'xoa nhom san pham'  => [1, 2, 3],
            ],
            '10' => [
                'xem danh sach nguoi dung' => [1, 2],
                'them nguoi dung'          => [1, 2],
                'sua nguoi dung'           => [1, 2],
            ],
            '11' => [
                'xem danh sach vai tro' => [1, 2],
                'them vai tro'          => [1, 2],
                'sua vai tro'           => [1, 2],
            ],
            '12' => [
                'xem danh sach quyen' => [1, 2],
                'them quyen'          => [1, 2],
                'sua quyen'           => [1, 2],
                'xoa quyen'           => [1, 2],
            ],
            '13' => [
                'setting thong so he thong' => [1, 2],
            ]
        ];

        foreach ($group_perms as $group => $perms) {
            if (!$perms) {
                continue;
            }

            foreach ($perms as $perm => $role_ids) {
                $snake_case_perm = Str::lower(Str::snake(Str::replace(['/', ',', '(', ')', '-'], ' ', $perm)));
                $permission      = Permission::query()
                    ->where('name', $snake_case_perm)
                    ->where('guard_name', $guard_name)
                    ->first();
                if (!$permission) {
                    $permission = Permission::create([
                        'group'      => $group,
                        'name'       => $snake_case_perm,
                        'name_2'     => $perm,
                        'guard_name' => $guard_name
                    ]);
                    $permission->syncRoles($role_ids);
                }
                if ($permission->group != $group) {
                    $permission->update([
                        'group' => $group,
                    ]);
                }
            }
        }
    }
}
