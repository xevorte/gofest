<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonials';

    protected  $fillable = [
        'user_id',
        'travel_packages_id',
        'title',
        'description',
        'rating'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function travel_package()
    {
        return $this->belongsTo(TravelPackage::class, 'travel_packages_id', 'id');
    }
}
