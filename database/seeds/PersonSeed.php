<?php

use Illuminate\Database\Seeder;

class PersonSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Person::class, 750)->create();
    }
}
