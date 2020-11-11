<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          [
            'id' => 1,
            'name' => '富里',
            'username' => 'ayano.tomisato',
            'email' => 'ayano.tomisato@zenken.co.jp',
            'password' => bcrypt('tomisato1234'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
          [
            'id' => 99,
            'name' => '開発',
            'username' => 'kaihatsu',
            'email' => 'shin.aono@zenken.co.jp',
            'password' => bcrypt('kaihatsu1234'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
          ],
        ]);
    }
}
