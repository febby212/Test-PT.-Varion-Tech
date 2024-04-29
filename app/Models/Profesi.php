<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesi extends Model
{
    use HasFactory;

    protected $casts = ['id' => 'string'];

    protected $fillable = [
        'id',
        'kode_profesi',
        'nama'
    ];
}