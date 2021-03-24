<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Role::all() as $role){
            foreach(Permission::get() as $permission){
                $role->permissions()->syncWithoutDetaching($permission->id);  
            }
        }
    }
}
