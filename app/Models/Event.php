<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function workshops()
    {
        return $this->hasMany(Workshop::class);
    }
    public function scopeFutureEvents($query)
    {
        return $query->whereHas('workshops', function ($query) {
            $query->where('start', '>', now());
        });
    }
}
