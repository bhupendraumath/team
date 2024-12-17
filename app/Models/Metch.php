<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metch extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'stage',
        'team_id',
        'is_winner'

    ];
}
