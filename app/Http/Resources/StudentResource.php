<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);

        // return [
        //     // "id" => $this->id,
        //     // "name" => $this->name,
        //     // "gender" => $this->gender,
        //     // "phone" => $this->phone,
        //     // "address" => $this->address,
        //     // "image" => $this->image
        // ];
      

    }
}
