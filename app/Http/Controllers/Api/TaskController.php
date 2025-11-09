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
		public function show(Task $task): JsonResponse
		{
			$task->getMedia();
			$task->file = $task->media->map(fn($media) => $media->getUrl())->first();

			return response()->json($task);
		}

		public function update(UpdateRequest $request, Task $task): JsonResponse
		{
			$data = $request->validated();

			if (empty($data)) return response()->json(['success' => false, 'error' => __('errors.empty_data')], 422);

			if ($task->update($data)) {
				if ($data['is_remove_file'] ?? false)
					$task->clearMediaCollection();

				if ($request->hasFile('file')) {
					$task->clearMediaCollection();
					$task->addMedia($request->file('file'))->toMediaCollection();
				}

				return response()->json(['success' => true, 'id' => $task->id]);
			}

			return response()->json(['success' => false, 'error' => __('errors.create')], 422);
		}
	}
