<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'projection_id',
        'spectator_id',
        'ticket_type'
    ];

    public function spectator(){
        return $this->hasOne(Spectator::class);
    }
}
