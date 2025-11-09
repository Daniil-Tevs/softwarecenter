<?php

	namespace App\Http\Requests\Api\Task;

	use App\Enums\Task\Status;
	use App\Models\Project;
	use Illuminate\Foundation\Http\FormRequest;
	use Illuminate\Validation\Rule;

	class ListRequest extends FormRequest
	{
		public function authorize(): bool
		{
			return auth()->check();
		}

		public function rules(): array
		{
			return [
				'finished_at' => 'nullable|date',
				'performer' => 'nullable|exists:users,id',
				'status' => ['nullable', Rule::enum(Status::class)],
			];
		}
	}
