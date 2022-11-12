<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;


class Shipment extends Model
{
    use HasFactory,SoftDeletes;

    public function createdBy()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function sender()
    {
        return $this->belongsTo('App\Models\User' );
    }

    public function reciever()
    {
        return $this->belongsTo('App\Models\User');
    }
}
