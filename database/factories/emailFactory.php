
<?php
use Faker\Generator as Faker;
$factory->define(App\Emails::class, function (Faker $faker) {
    return [
        'emailsent' => $faker->boolean(0),
        'adresse_mail' => $faker->email,
    ];
});