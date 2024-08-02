<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Controlla se l'utente admin esiste già
        $user = User::where('email', 'admin@example.com')->first();

        // Se l'utente non esiste, creane uno nuovo
        if (!$user) {
            User::create([
                'name' => 'Admin',
                'email' => 'kirofiniello@outlook.it',
                'password' => Hash::make('12345678'), // Assicurati di cambiare la password
            ]);
        }
    }
}
