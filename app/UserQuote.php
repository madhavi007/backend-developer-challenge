<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserQuote extends Model
{
    protected $fillable = [
        'season_number', 'episode', 'quote',
    ];
}
