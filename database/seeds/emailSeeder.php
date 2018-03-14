<?php
use Illuminate\Database\Seeder;
class emailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Emails::class, 12)->create();
    }
}
