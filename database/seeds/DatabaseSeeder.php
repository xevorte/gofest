<?php

use App\Testimonial;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        factory(Testimonial::class, 5)->create();
        factory(User::class, 5)->create();
    }
}
