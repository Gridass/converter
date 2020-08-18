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
        $user1->name = 'Jhon Deo';
        $user1->email = 'jhon@deo.com';
        $user1->password = bcrypt('secret');
        $user1->save();
        $user1->roles()->attach($user);
        $user1->permissions()->attach($createTasks);

        $user2 = new User();
        $user2->name = 'Mike Thomas';
        $user2->email = 'mike@thomas.com';
        $user2->password = bcrypt('secret');
        $user2->save();
        $user2->roles()->attach($user);
        $user2->permissions()->attach($createTasks);

        $user3 = new User();
        $user3->name = 'Admin';
        $user3->email = 'admin@admin.com';
        $user3->password = bcrypt('secret');
        $user3->save();
        $user3->roles()->attach($admin);
        $user3->permissions()->attach($manageUser);

    }
}
