<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'slug'  => $this->slug,
            'title' => $this->title,
            'image' => $this->image,
            'excerpt' => $this->excerpt,
            'body' => $this->body,
        ];
    }
}
