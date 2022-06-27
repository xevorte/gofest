<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class TransactionTransportation extends Model
{
    use SoftDeletes;

    protected $table = 'transaction_transportations';

    protected $fillable = [
        'transportations_id',
        'users_id',
        'transaction_code',
        'name',
        'email',
        'phone_number',
        'from',
        'to',
        'guests',
        'departure_date',
        'departure_time',
        'class',
        'transaction_total',
        'payment_type',
        'transaction_status'
    ];

    public function transportation()
    {
        return $this->belongsTo(Transportation::class, 'transportations_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'transaction_transportations_id', 'id');
    }
}
