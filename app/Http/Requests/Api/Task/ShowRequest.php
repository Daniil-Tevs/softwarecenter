<?php

	namespace App\Http\Requests\Api\Task;

	use Illuminate\Foundation\Http\FormRequest;

	class ShowRequest extends FormRequest
	{
		public function authorize(): bool
		{
			$this->task->load('project', 'project.owner:id,email');
			return auth()->check() && ($this->task->project->owner_id === auth()->id() || $this->task->project->participants()->where('user_id', auth()->id())->exists());
		}

		public function rules(): array
		{
			return [
				//
			];
		}
	}
