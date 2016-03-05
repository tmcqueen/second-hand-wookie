<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Donation;
use App\Asset;

class DonationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $donation = factory(Donation::class)->create([
            'user_id' => 1
        ]);

        $asset = factory(Asset::class, 50)->create([
            //'name' => $faker->word,
            'user_id' => 1,
            'donation_id' => $donation->id,
            //'cost' => $faker->randomNumber(2)*100,
        ]);
    }
}
