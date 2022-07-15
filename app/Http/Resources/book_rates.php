<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class book_rates extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'book_id'=>$this->book_id,
            'rate'=>$this->rate,
            'comment'=>$this->comment
        ];
    }
}
