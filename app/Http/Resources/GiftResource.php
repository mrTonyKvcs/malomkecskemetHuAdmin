<?php

namespace App\Http\Resources;

use App\Models\GameApplicant;
use Illuminate\Http\Resources\Json\JsonResource;

class GiftResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $applicants = GameApplicant::query()
            ->where('game_id', $this->game_id)
            ->where('created_at', '>=', $this->started_at)
            ->where('created_at', '<=', $this->ended_at)
            ->get();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'start' => $this->started_at->format('H:i'),
            'finish' => $this->ended_at->format('H:i'),
            'applicant' => new GameApplicantResource($this->applicant),
            'applicants' => $applicants,
        ];
    }
}
