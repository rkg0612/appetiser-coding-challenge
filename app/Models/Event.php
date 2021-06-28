<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'days_of_week',
        'name'
    ];

    public function getDowAttribute()
    {
        return unserialize($this->days_of_week);
    }
}
