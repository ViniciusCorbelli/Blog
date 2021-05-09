<?php

use App\User;
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
        factory(User::class, 5)->create();
        User::updateOrCreate([
            'name' => 'Admin',
            'email' => 'admin@admin.com.br',
            'access' => 'Administrador',
        ],[
            'name' => 'Admin',
            'email' => 'admin@admin.com.br',
            'email_verified_at' => now(),
            'cpf' => '000.000.000-00',
            'access' => 'Administrador',
            'password' => bcrypt('123456'),
            'image' => 'user.png',
        ]);
    }
}
