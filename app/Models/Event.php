<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }

    public function eventCategory()
    {
        return $this->belongsTo(EventCategory::class);
    }
}