<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // you can change the name of key
            'id' => $this->id,
            'title'=> $this->title,
            'salary'=> $this->annual_salary,
        ];
    }
}
