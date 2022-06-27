<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    protected $table = 'transportations';

    protected $fillable = [
        'image',
        'company_name',
        'slug',
        'type',
        'status'
    ];

    public function transactions()
    {
        return $this->hasMany(TransactionTransportation::class, 'transportations_id', 'id');
    }
}
