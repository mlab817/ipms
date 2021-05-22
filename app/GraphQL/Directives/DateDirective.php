<?php

namespace App\GraphQL\Directives;

use Carbon\Carbon;
use Nuwave\Lighthouse\Support\Contracts\ArgTransformerDirective;
use Nuwave\Lighthouse\Schema\Directives\BaseDirective;

class DateDirective extends BaseDirective implements ArgTransformerDirective
{
    /**
     * Directive name.
     *
     * @return string
     */
    public function name(): string
    {
        return 'date';
    }

    /**
     * Transform given string to MySQL date.
     *
     * @param  string  $argumentValue
     * @return mixed
     */
    public function transform($argumentValue)
    {
        if (!$argumentValue) {
            return null;
        }

        return Carbon::parse($argumentValue)->format('Y-m-d');
    }
}