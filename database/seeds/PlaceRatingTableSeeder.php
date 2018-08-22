<?php

use Illuminate\Database\Seeder;
use Hedonist\Entities\Place\PlaceRating;
use Hedonist\Entities\User\User;
use Hedonist\Entities\Place\Place;

class PlaceRatingTableSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $places = Place::all();

        $items = [];

        foreach ($users as $user) {
            foreach ($places as $place) {
                $items[] = [
                    'user_id' => $user->id,
                    'place_id' => $place->id,
                    'rating' => random_int(0,10)
                ];
            }
        }

        PlaceRating::query()->insert($items);
    }
}
