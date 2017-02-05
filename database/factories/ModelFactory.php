<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Models\Brand::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'logo_path' => $faker->imageUrl(),
        'description' => $faker->sentence,
        'order' => $faker->numberBetween(0, 10)
    ];
});

$factory->define(App\Models\Admin::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        //'parent_id' =>  $faker->numberBetween(1,10) ,
        'name' => $faker->name,
        'description' => $faker->sentence,
        'keywords' => $faker->word,
        'price_range' => $faker->word,
        'url' => $faker->url,
        'is_show' => $faker->numberBetween(0, 1),
        'is_nav' => $faker->numberBetween(0, 1),
        'order' => $faker->numberBetween(0, 9)
    ];
});

$factory->define(App\Models\Product::class, function (Faker\Generator $faker) {
    return [
        'pid' => $faker->randomNumber(),
        'name' => $faker->name,
        'cate_id' => $faker->randomNumber(),
        'brand_id' => $faker->word,
        'order' => $faker->randomNumber(),
        'weight' => $faker->randomNumber(),
        'stock' => $faker->randomNumber(),
        'cost_price' => $faker->randomFloat(),
        'market_price' => $faker->randomFloat(),
        'shop_price' => $faker->randomFloat(),
        'state' => $faker->boolean,
        'is_best' => $faker->boolean,
        'is_hot' => $faker->boolean,
        'is_new' => $faker->boolean,
        'is_free_shipping' => $faker->boolean,
        'is_on_sale' => $faker->boolean,
        'on_time' => $faker->dateTimeBetween(),
        'description' => $faker->text,
        'keywords' => $faker->word,
        'sale_count' => $faker->randomNumber(),
        'visit_count' => $faker->randomNumber(),
        'review_count' => $faker->randomNumber(),
        'deleted_at' => $faker->dateTimeBetween(),
    ];
});

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'username' => $faker->userName,
        'email' => $faker->safeEmail,
        'password' => bcrypt($faker->password),
        'mobile' => $faker->word,
        'verify_email' => $faker->boolean,
        'verify_mobile' => $faker->boolean,
        'lift_ban_time' => $faker->dateTimeBetween(),
        'level_id' => $faker->randomNumber(),
        'last_visit_time' => $faker->dateTimeBetween(),
        'last_visit_ip' => $faker->word,
        'register_ip' => $faker->word,
        'register_rg_id' => $faker->word,
        'sex' => $faker->boolean,
        'remember_token' => str_random(10),
        'deleted_at' => $faker->dateTimeBetween(),
    ];
});

$factory->define(App\Models\Attribute::class, function (Faker\Generator $faker) {
    return [
        'name'=>$faker->firstName,
        'is_filter'=>$faker->numberBetween(0,1),
        'show_type'=>$faker->numberBetween(0,2),
        'order'=>$faker->numberBetween(0,20)
    ];
});