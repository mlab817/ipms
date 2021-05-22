<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;
use Nuwave\Lighthouse\Exceptions\RendersErrorsExtensions;
use Throwable;

class CustomException extends Exception implements RendersErrorsExtensions
{
	protected $reason;

    public function __construct(string $message, string $reason)
    {
	    parent::__construct($message);

	    $this->reason = $reason;
    }

	public function isClientSafe()
	{
		return true;
	}

	public function getCategory()
	{
		return 'custom';
	}

	public function extensionsContent(): array
	{
		return [
			'some' => 'additional information',
			'reason' => $this->reason,
		];
	}
}
