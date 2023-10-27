<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()
            ->createOne([
                            'email'    => 'test@example.org',
                            'password' => bcrypt('test@example.org'),
                        ]);
    }
}
