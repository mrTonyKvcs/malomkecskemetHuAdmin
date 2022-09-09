<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gift extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
       'game_id', 'application_id', 'name'
    ];

    protected $dates = [
        'started_at', 'ended_at'
    ];

    public function applicant()
    {
        return $this->belongsTo(GameApplicant::class, 'application_id');
    }
}
