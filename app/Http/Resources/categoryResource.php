<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class categoryResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'categoryID' => $this->id,
            'picture' => $this->image,
            'categoryName' => $this->title
        ];
    }
}
