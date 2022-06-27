<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $table = 'transactions';

    protected $fillable = [
        'travel_packages_id',
        'users_id',
        'transaction_code',
        'name',
        'email',
        'phone_number',
        'check_in',
        'check_out',
        'rooms',
        'guests',
        'duration',
        'type_room',
        'transaction_total',
        'transaction_status'
    ];

    public function travel_package()
    {
        return $this->belongsTo(TravelPackage::class, 'travel_packages_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'transaction_travel_packages_id', 'id');
    }
}
