<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'title' => $this->title,
            'news_content' => $this->news_content,
            'created_at' => date('Y-m-d', $this->created_at),
            //eager loading untuk memastikan bahwa Anda hanya mengakses relasi yang dimuat, sehingga
            //Anda dapat menghindari kesalahan saat mencoba mengakses relasi yang belum dimuat.
            'writer' => $this->whenLoaded('writer')
            // 'created_at' => Carbon::parse($this->created_at)->format('Y-m-d'),
        ];
    }
}