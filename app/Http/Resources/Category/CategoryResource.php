<?php

namespace App\Http\Resources\Category;

use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public static $wrap = 'payload';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        // dd($request->route()->action);
        $lng = explode('/', $request->route()->action['prefix']);

        return [
            'id' => $this->id,
            'name' => $this->field('name', $lng[1]),
            'icon' => $this->icon_mobile_link,
            'childes' => $this->childes,
            // 'products' => ProductResource::collection($this->products)
            /*'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,*/
        ];

    }
}
