<?php

use Illuminate\Database\Seeder;

class Usuario_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name'=>'Oliver Sánchez','email'=>'admin','password'=>bcrypt('qweasdzxc')],
        ]);

        DB::table('user_info')->insert([
            ['user_id'=> 1,'clave'=>bcrypt('qweasdzxc'),'tipo'=>'AD','grupo_id'=>2,'activo'=>true],
        ]);
    }
}
