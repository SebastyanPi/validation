<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class validation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nit',
        'type',
        'title',
        'register',
        'acta',
        'folio',
        'code'
    ];
}
