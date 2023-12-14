<?php

namespace App\Models;

class Listing
{
    public static function all()
    {
        return [
            [
                'id'          => 1,
                'title'       => 'some title',
                'description' => 'some loingaskjdhajksdhakjhsdkaskjhd',
            ],
            [
                'id'          => 2,
                'title'       => 'some title 2',
                'description' => 'some loingaskjdhajksdhakjhsdkjahdkjhd',
            ],
        ];
    }

    public static function find($id)
    {
        $listings = self::all();

        foreach ($listings as $listing) {
            if ($listing['id'] == $id) {
                return $listing;
            }
        }

        return null;
    }
}
