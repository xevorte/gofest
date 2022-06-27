<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'users_id',
        'transaction_travel_packages_id',
        'transaction_transportations_id',
        'image',
        'name',
        'type'
    ];

    public function transaction_travel_package()
    {
        return $this->belongsTo(Transaction::class, 'transaction_travel_packages_id', 'id');
    }

    public function transaction_transportation()
    {
        return $this->belongsTo(TransactionTransportation::class, 'transaction_transportations_id', 'id');
    }
}
