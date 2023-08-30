<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name" => "Admin Dynopat",
            "email" => "dynopat@mail.com",
            "password" => \Hash::make("dynopat@2023!R"),
      
        ]);
    }
}
