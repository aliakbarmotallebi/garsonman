<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Table extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'token',
        'qrcode'
    ];


    public static function getTokenGenerate(): string
    {
        return Str::uuid()->toString();
    }

}
