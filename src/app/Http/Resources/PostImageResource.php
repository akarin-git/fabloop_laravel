<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // dd($request->id);
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'category' => $this->category,
            'title' => $this->title,
            'description_one' => $this->description_one,
            'description_twe' => $this->description_twe,
            'description_three' => $this->description_three,
            'web_page' => $this->web_page,
            'image_path' => $this->image_path,
            'public_id' => $this->public_id,
            'favorite' => FavoriteResource::make($this->whenLoaded('favorite')),
        ];
    }
}
