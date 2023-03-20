<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projection extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'room_id',
        'time',
        'date'
    ];

    public function ticket(){
        return $this->hasMany(Ticket::class);
    }
}
