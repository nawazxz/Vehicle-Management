<?php

namespace Database\Seeders;

use App\Models\User;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();
        try {
            $admin = User::create([
                'username'  => 'admin',
                'email'     => 'shah@gmail.com',
                'name'      => 'admin',
                'password'  => Hash::make('passpass'),
                'email_verified_at' => now(),
            ]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw $e->getMessage();
        }
    }
}
