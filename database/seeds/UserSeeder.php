<?php
use App\Role;
use App\User;
use App\Permission;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::where('slug','admin')->first();
        $user = Role::where('slug','user')->first();
        $createTasks = Permission::where('slug','create-users')->first();
        $manageUser = Permission::where('slug','manage-user')->first();

        $user1 = new User();
        $user1->name = 'Admin';
        $user1->email = 'admin@admin.com';
        $user1->password = bcrypt('secret');
        $user1->save();
        $user1->roles()->attach($admin);
        $user1->permissions()->attach($manageUser);

        $user2 = new User();
        $user2->name = 'Jhon Deo';
        $user2->email = 'jhon@deo.com';
        $user2->password = bcrypt('secret');
        $user2->save();
        $user2->roles()->attach($user);
        $user2->permissions()->attach($createTasks);
    }
}
