<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Mail;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Mail::fake();

        $this->call([
                        UserSeeder::class,
                        TodoSeeder::class
                    ]);
    }
}