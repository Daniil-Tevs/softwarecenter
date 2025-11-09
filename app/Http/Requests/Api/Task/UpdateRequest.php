<?php

	namespace App\Http\Requests\Api\Task;

	use App\Enums\Task\Status;
	use Illuminate\Foundation\Http\FormRequest;
	use Illuminate\Validation\Rule;

	class UpdateRequest extends FormRequest
	{
		public function authorize(): bool
		{
			$this->task->load('project', 'project.owner:id,email');
			return auth()->check() && ($this->task->project->owner_id === auth()->id() || $this->task->project->participants()->where('user_id', auth()->id())->exists());
		}

		public function rules(): array
		{
			return [
				'status' => ['nullable', Rule::enum(Status::class)],

				'title' => 'nullable|string|min:3|max:255',
				'description' => 'nullable|string|min:10',
				'file' => [
					'nullable',
					'file',
					'mimes:pdf,doc,docx,jpeg,png,gif,svg,xml,xls,xlsx',
					'mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/jpeg,image/png,image/gif,image/svg+xml,text/xml,application/xml,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
					'max:5120'
				],

				'finished_at' => 'nullable|date',
				'performer_id' => 'nullable|exists:users,id',

				'is_remove_file' => 'nullable|boolean'
			];
		}
	}
