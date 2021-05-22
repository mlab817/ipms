<?php

namespace App\GraphQL\Directives;

use Log;
use Illuminate\Validation\Rule;
use Nuwave\Lighthouse\Schema\Directives\ValidationDirective;

class UpdateProjectInputValidationDirective extends ValidationDirective
{
	public function rules(): array
	{
		$id = $this->args['id'];
		return [
			'version' => [
				'required',
				Rule::exists('projects','version')->where(function ($query) use ($id) {
					$query->where('id', $id);
				}),
			],
		];
	}

	public function messages(): array
	{
		return [
			'version.exists' => 'The version in the server does not match your copy',
		];
	}
}
