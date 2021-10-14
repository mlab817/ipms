<?php

namespace App\Http\Resources;

use App\Models\RefFundingSource;
use App\Models\Project;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FundingSourceCollection extends ResourceCollection
{
    public $collects = RefFundingSource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'data'  => $this->collection->transform(function (RefFundingSource $fundingSource) {
                return [
                    'id'                => $fundingSource->id,
                    'name'             => $fundingSource->name,
//                    'slug'              => $fundingSource->slug,
                    'investment'        => $fundingSource->investment ? new InvestmentResource($fundingSource->investment) : null,
                    'infrastructure'    => $fundingSource->infrastructure ? new InvestmentResource($fundingSource->infrastructure) : null,
                ];
            }),
        ];
    }
}
