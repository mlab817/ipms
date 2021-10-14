<?php

namespace App\Http\Resources;

use App\Models\RefRegion;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RegionCollection extends ResourceCollection
{
    public $collects = RefRegion::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'data' => $this->collection->transform(function (RefRegion $region) {
                return [
                    'id'                => $region->id,
                    'name'              => $region->name,
                    'label'             => $region->label,
                    'investment'        => $region->investment ? new InvestmentResource($region->investment) : null,
                    'infrastructure'    => $region->infrastructure ? new InvestmentResource($region->infrastructure) : null,
                ];
            }),
        ];
    }
}
