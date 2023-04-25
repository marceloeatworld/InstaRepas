<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'season_name',
    ];

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'foods_seasons');
    }
}
