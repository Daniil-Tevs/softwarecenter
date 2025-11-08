<?php

	namespace App\Http\Requests\Api\Project;

	use Illuminate\Foundation\Http\FormRequest;

	class StoreRequest extends FormRequest
	{
		public function authorize(): bool
		{
			return auth()->check();
		}

		public function rules(): array
		{
			return [
				'name' => 'required|string|min:3|max:255'
			];
		}
	}
