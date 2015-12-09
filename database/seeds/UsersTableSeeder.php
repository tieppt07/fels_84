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
        factory(App\User::class)->create([
            'name' => 'FELS Administrator',
            'email' => 'admin@fels.com',
            'is_admin' => 1,
        ]);

        $me = factory(App\User::class)->create([
            'name' => 'Phung Xuan Tiep',
            'email' => 'xuantiep.pt2012@gmail.com',
            'is_admin' => 1,
        ]);

        factory(App\User::class, 20)->create()->make();
    }
}
