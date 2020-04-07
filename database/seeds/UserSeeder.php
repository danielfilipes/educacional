<?php

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
        DB::table('users')->insert(
            [
                'name' => 'Daniel Filipe Santos Costa',
                'user_type_id' => 1,
                'email' => 'daniel@gmail.com',
                'password' => Hash::make('12345678'),
                'cpf' => '08806708600',
                'rg' => 'MG17172721',
                'birthday' => \Carbon\Carbon::createFromDate('1992-07-10')->toDateTimeString(),
                'phone' => '38998526652'
            ]            
        );

        DB::table('users')->insert(
            [
                'name' => 'Administrador',
                'user_type_id' => 1,
                'email' => 'admin@admin.com',
                'password' => Hash::make('12345678'),
                'cpf' => '00000000000',
                'birthday' => \Carbon\Carbon::createFromDate('1985-01-01')->toDateTimeString()
            ]
            
        );
    }
}
