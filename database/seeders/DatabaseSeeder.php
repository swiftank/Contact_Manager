<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'password' => Hash::make('password'),
        ]);

        DB::table('companies')->insert([
            [
                'name' => 'ABC Company',
                'email' => 'abc@gmail.com',
                'description' => 'Deals in cars sale and purchase',
                'contact' => 'abc@gmail.com',
                 
            ],
            [
                'name' => 'XYZ Company',
                'email' => 'xyz@gmail.com',
                'description' => 'Deals in trucks sale and purchase',
                'contact' => 'xyz@gmail.com',
                 
            ],
            [
                'name' => 'PKL Company',
                'email' => 'pkl@gmail.com',
                'description' => 'Deals in foods sale and purchase',
                'contact' => 'pkl@gmail.com',
                 
            ],
             
        ]);

        DB::table('contacts')->insert([
            [
                'name' => 'Ankush Kumar',
                'company_id' => 1,
                'email' => 'ankush@gmail.com',
                'position' => 'Web Developer',
                'contact' => '9821114112',
            ],
            [
                'name' => 'Terry Lawrence',
                'company_id' => 1,
                'email' => 'terry@gmail.com',
                'position' => 'Sales Executive',
                'contact' => '983456332',
            ],
            [
                'name' => 'Micheal Whale',
                'company_id' => 2,
                'email' => 'micheaal@gmail.com',
                'position' => 'Agent',
                'contact' => '1234567',
            ], [
                'name' => 'Andrew Simone',
                'company_id' => 2,
                'email' => 'andrew@gmail.com',
                'position' => 'Agent',
                'contact' => '143567893',
            ], [
                'name' => 'Monica Dels',
                'company_id' => 2,
                'email' => 'monica@gmail.com',
                'position' => 'Sales Executive',
                'contact' => '345678903',
            ], [
                'name' => 'James Allen',
                'company_id' => 3,
                'email' => 'james@gmail.com',
                'position' => 'Random',
                'contact' => '983456332',
            ], [
                'name' => 'Jordan Etkins',
                'company_id' => 3,
                'email' => 'jordan@gmail.com',
                'position' => 'Trafic Marshall',
                'contact' => '983456332',
            ], [
                'name' => 'Alisa ',
                'company_id' => 3,
                'email' => 'alis@gmail.com',
                'position' => 'Sales Executive',
                'contact' => '983456332',
            ], [
                'name' => 'Demarco Benis',
                'company_id' => 3,
                'email' => 'demarco@gmail.com',
                'position' => 'Sales Executive',
                'contact' => '983456332',
            ], [
                'name' => 'Mannat',
                'company_id' => 1,
                'email' => 'mannat@gmail.com',
                'position' => 'Sales Executive',
                'contact' => '983456332',
            ],
        ]);

    }
}
