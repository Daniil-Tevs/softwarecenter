<?php

	namespace App\Http\Controllers\Api;

	use App\Http\Controllers\Controller;
	use App\Http\Requests\Api\Task\ShowRequest;
	use App\Http\Requests\Api\Task\UpdateRequest;
	use App\Models\Task;
	use Illuminate\Http\JsonResponse;
	use Illuminate\Http\Request;

	class TaskController extends Controller
	{
		public function show(ShowRequest $request, Task $task): JsonResponse
		{
			$task->getMedia();
			$task->files = $task->media->map(fn($media) => [
				'name' => $media->name,
				'url' => $media->getUrl(),
			]);
			unset($task['media']);

			return response()->json($task);
		}

		public function update(UpdateRequest $request, Task $task): JsonResponse
		{
			$data = $request->validated();

			if (empty($data)) return response()->json(['success' => false, 'error' => __('errors.empty_data')], 422);

			if ($task->update($data)) {
				if ($data['is_remove_file'] ?? false)
					$task->clearMediaCollection('tasks');

				if ($request->hasFile('file')) {
					$task->clearMediaCollection('tasks');
					$task->addMedia($request->file('file'))->toMediaCollection('tasks');
				}

				return response()->json(['success' => true, 'id' => $task->id]);
			}

			return response()->json(['success' => false, 'error' => __('errors.create')], 422);
		}
	}
