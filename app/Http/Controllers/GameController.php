<?php

namespace App\Http\Controllers;

use App\Http\Resources\GameApplicantResource;
use App\Http\Resources\GiftResource;
use App\Models\GameApplicant;
use App\Models\Gift;
use Illuminate\Http\Request;
use Inertia\Inertia;

class GameController extends Controller
{
    public function gifts()
    {
        $gifts = Gift::query()
            ->where('game_id', 1)
            ->orderBy('started_at')
            ->get();

        return Inertia::render('Game/Index', ['gifts' => GiftResource::collection($gifts) ]);
    }

    public function draw($id)
    {
        $gift = Gift::findOrFail($id);

        $applicants = GameApplicant::query()
            ->where('game_id', $gift->game_id)
            ->where('created_at', '>=', $gift->started_at)
            ->where('created_at', '<=', $gift->ended_at)
            ->get();

        if (empty($applicants)) {
            $applicants = GameApplicant::query()
                ->get();
        }

        if ($applicants->count() > 0) {
            $winner = $applicants->random();

            $gift->update([
                'application_id' => $winner->id
            ]);
        }

        return redirect()->route('gifts.index');
    }
}
