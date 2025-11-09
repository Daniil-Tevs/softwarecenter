<?php

	namespace App\Http\Controllers\Api;

	use App\Http\Controllers\Controller;
	use App\Http\Requests\Api\Task\ShowRequest;
	use App\Http\Requests\Api\Task\UpdateRequest;
	use App\Mail\Api\TaskAssigned;
	use App\Mail\Api\TaskCreated;
	use App\Mail\Api\TaskUpdated;
	use App\Models\Task;
	use Illuminate\Http\JsonResponse;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Mail;

	class TaskController extends Controller
	{
		public function show(Task $task): JsonResponse
		{
			$task->load('media', 'performer:id,email');
			$task->file = $task->media->map(fn($media) => $media->getUrl())->first();

			return response()->json($task);
		}

		public function update(UpdateRequest $request, Task $task): JsonResponse
		{
			$data = $request->validated();
			if (empty($data)) return response()->json(['success' => false, 'error' => __('errors.empty_data')], 422);

			$isAssignTask = ($data['performer_id'] ?? false) && ($data['performer_id'] !== $task->performer_id);

			if ($task->update($data)) {
				if ($data['is_remove_file'] ?? false)
					$task->clearMediaCollection();

				if ($request->hasFile('file')) {
					$task->clearMediaCollection();
					$task->addMedia($request->file('file'))->toMediaCollection();
				}

				Mail::to($task->project->owner->email)->queue(new TaskUpdated($task->project, $task, $request->user()));

				if ($isAssignTask) {
					$task->load('performer:id,email');
					Mail::to($task->performer->email)->queue(new TaskAssigned($task->project, $task, $request->user()));
				}

				return response()->json(['success' => true, 'id' => $task->id]);
			}

			return response()->json(['success' => false, 'error' => __('errors.update')], 422);
		}

		public function destroy(Task $task)
		{
			if ($task->delete())
				return response()->json(['success' => true]);

			return response()->json(['success' => false, 'error' => __('errors.delete')], 422);
		}
	}
