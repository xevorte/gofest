<?php

namespace App;

use Carbon\Traits\Test;
use Illuminate\Database\Eloquent\Model;

class TravelPackage extends Model
{
    protected $table = 'travel_packages';

    protected  $guarded = ['id'];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'rating',
        'city',
        'area',
        'country',
        'type',
        'price',
        'restaurant',
        'wifi',
        'elevator',
        'breakfast',
        'parking',
        'laundry',
    ];

    public function review()
    {
        return $this->hasMany(Testimonial::class, 'travel_packages_id', 'id');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'travel_packages_id', 'id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'travel_packages_id', 'id');
    }
}
