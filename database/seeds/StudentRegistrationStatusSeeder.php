<?php

use Illuminate\Database\Seeder;

class StudentRegistrationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student_registration_statuses')->insert([
            'name' => 'Ativo',
        ]);
        DB::table('student_registration_statuses')->insert([
            'name' => 'Cancelado',
        ]);
        DB::table('student_registration_statuses')->insert([
            'name' => 'Concluído',
        ]);
        DB::table('student_registration_statuses')->insert([
            'name' => 'Trancado',
        ]);
    }
}
