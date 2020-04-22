<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user=Role::where('name' ,'User')->first();
        $role_author=Role::where('name' ,'Author')->first();
        $role_admin=Role::where('name' ,'Admin')->first();

        $user=new User();
        $user->name="user";
        $user->email="user@email.com";
        $user->password=app('hash')->make('user');
        $user->save();
        $user->roles()->attach($role_user);

        $author=new User();
        $author->name="author";
        $author->email="author@email.com";
        $author->password=app('hash')->make('author');
        $author->save();
        $author->roles()->attach($role_author);



        $admin=new User();
        $admin->name="admin";
        $admin->email="admin@email.com";
        $admin->password=app('hash')->make('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);

    }
}
