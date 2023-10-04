<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'Tickets';

    protected $fillable = [
        'titulo',
        'contenido',
        'estado',
        'autor'
    ];
}
