<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'slug', 'name'
    ];

    protected $dates = [
        'started_at', 'expired_at'
    ];

    /**
     * undocumented function
     *
     * @return void
     */
    public function applicants()
    {
        return $this->hasMany(GameApplicant::class, 'game_id');
    }
}
