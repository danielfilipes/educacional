<?php

use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user_types')->insert([
            'name' => 'Administrador',
        ]);
        DB::table('user_types')->insert([
            'name' => 'Secretaria',
        ]);
        DB::table('user_types')->insert([
            'name' => 'Professor',
        ]);
        DB::table('user_types')->insert([
            'name' => 'Aluno',
        ]);
    }
}
