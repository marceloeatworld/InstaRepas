<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;
    protected $table = 'seasons';

    public $timestamps = false;

    protected $fillable = [
        'season_name',
    ];

    public function foods()
    {
        return $this->belongsToMany(Food::class, 'foods_seasons');
    }

  
    public static function getSeasonByMonth($month)
    {
        $season = null;
        if ($month >= 3 && $month <= 5) {
            $season = 'Spring';
        } elseif ($month >= 6 && $month <= 8) {
            $season = 'Summer';
        } elseif ($month >= 9 && $month <= 11) {
            $season = 'Autumn'; 
        } else {
            $season = 'Winter';
        }
    
        return self::where('season_name', $season)->first();
    }
    
}
