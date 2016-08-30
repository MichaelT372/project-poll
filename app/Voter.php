<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{

    protected $fillable = [
        'poll_id',
        'ip_address'
    ];

    public function poll()
    {
        return $this->belongsTo('App\Poll');
    }
}
