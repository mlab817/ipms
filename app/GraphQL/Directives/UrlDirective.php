<?php

namespace App\GraphQL\Directives;

use Nuwave\Lighthouse\Support\Contracts\ArgTransformerDirective;
use Nuwave\Lighthouse\Schema\Directives\BaseDirective;

class UrlDirective extends BaseDirective implements ArgTransformerDirective
{
    /**
     * Directive name.
     *
     * @return string
     */
    public function name(): string
    {
        return 'url';
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

        try {
        	return Storage::disk('google')->url($argumentValue);
        } catch (Exception $e) {
        	return $e->getMessage();
        }
    }
}
