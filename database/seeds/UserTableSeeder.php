<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
           'nombre' => 'Carlos',
           'apellido'=>'Usaqui',
           'cedula'=>'18314327',
           'email' => 'usaquicarlos@gmail.com',
           'password' => bcrypt('jjjjjj'),
           'created_at' => \Carbon\Carbon::now(),
           'updated_at' => \Carbon\Carbon::now(),
       ]);
    }
}
