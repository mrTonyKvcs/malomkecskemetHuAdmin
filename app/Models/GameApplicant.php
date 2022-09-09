<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameApplicant extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'game_id', 'receipt_number', 'name', 'email', 'age', 'city', 'phone_number', 'accept_giveaway_rules', 'accept_gdpr', 'sign_up_for_newsletter', 'receipt_image_path'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function gift()
    {
        return $this->belongsTo(Gift::class, 'application_id');
    }

    public function scopeAuthenticated($query)
    {
        return $query->where('authenticated', true);
    }
}
