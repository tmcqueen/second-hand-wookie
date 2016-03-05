<?php

use App\User;
use App\Donation;
use App\Asset;

$factory->define(User::class, function (Faker\Generator $faker) {

    $username = $faker->username;
    $email = $username . '@' . $faker->safeEmailDomain;

    return [
        'name' => $faker->name,
        'email' => $email,
        'username' => $username,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Donation::class, function (Faker\Generator $faker) {
    return [
        'user_id' => factory(User::class)->create()->id,
    ];
});

$factory->define(Asset::class, function(Faker\Generator $faker) {
    return [
        'name'          => $faker->word,
        'user_id'       => 0,
        'donation_id'   => 0,
        'cost'          => $faker->randomNumber(2)*100,
        'description'   => $faker->sentence,
    ];
});

// $factory->defineAs(Asset::class, 'DonatedAssets', function (Faker\Generator $faker) use($factory) {
//     $donation = $factory->raw(Donation::class);
//     $assets = $factory->raw(Asset::class, 20);

// });