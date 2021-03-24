<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 1;

        $permissions = [
            [
                'id'    => $i++,
                'title' => 'user_management_access',
            ],
            [
                'id'    => $i++,
                'title' => 'permission_create',
            ],
            [
                'id'    => $i++,
                'title' => 'permission_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'permission_show',
            ],
            [
                'id'    => $i++,
                'title' => 'permission_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'permission_access',
            ],
            [
                'id'    => $i++,
                'title' => 'role_create',
            ],
            [
                'id'    => $i++,
                'title' => 'role_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'role_show',
            ],
            [
                'id'    => $i++,
                'title' => 'role_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'role_access',
            ],
            [
                'id'    => $i++,
                'title' => 'user_create',
            ],
            [
                'id'    => $i++,
                'title' => 'user_edit',
            ],
            [
                'id'    => $i++,
                'title' => 'user_show',
            ],
            [
                'id'    => $i++,
                'title' => 'user_delete',
            ],
            [
                'id'    => $i++,
                'title' => 'user_access',
            ],
            [
                'id'    => $i++,
                'title' => 'activiation_access',
            ],
            [
                'id'    => $i++,
                'title' => 'block_user',
            ],
            [
                'id'    => $i++,
                'title' => 'start_emergency',
            ],
        ];
        Permission::insert($permissions);
    }
}
