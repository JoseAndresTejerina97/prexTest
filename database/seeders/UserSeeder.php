<?php

namespace Database\Seeders;

use App\Src\Giphy\Infrastructure\Persistence\Eloquent\Model\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Prex',
            'email' => 'andrestejerina97@gmail.com',
            'password' => Hash::make("prexTest"),

        ]);
    }
}
