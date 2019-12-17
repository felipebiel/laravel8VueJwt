<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
   
    public function run()
    {   
        /*CRIA O PRIMEIRO USUARIO PADRÂO DA APLICAÇÂO*/
        User::create([
            'name'      => 'Admin Assys',
            'email'     => 'assys@assys.com.br',
            'password'  => bcrypt('12345678'),
        ]);

        $this->command->info('User administrativo assys@assys.com.br foi criado com a senha 12345678');
    }
}
