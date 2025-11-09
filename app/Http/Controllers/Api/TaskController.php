<?php

	namespace App\Http\Controllers\Api;

	use App\Http\Controllers\Controller;
	use App\Http\Requests\Api\Task\ShowRequest;
	use App\Models\Task;
	use Illuminate\Http\JsonResponse;
	use Illuminate\Http\Request;

	class TaskController extends Controller
	{
		public function show(ShowRequest $request, Task $task): JsonResponse
		{
			return response()->json($task);
		}
	}
