<?php
use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=new Role();
        $admin->name= 'admin';
        $admin->save();

        $author=new Role();
        $author->name= 'author';
        $author->save();

        $subcriber=new Role();
        $subcriber->name= 'subcriber';
        $subcriber->save();

    }
}
