<?php

	namespace App\Http\Controllers\Api;

	use App\Http\Controllers\Controller;
	use App\Http\Requests\Api\Project\StoreRequest;
	use App\Http\Requests\Api\Task\ListRequest;
	use App\Http\Requests\Api\Task\StoreRequest as TaskStoreRequest;
	use App\Mail\Api\TaskAssigned;
	use App\Mail\Api\TaskCreated;
	use App\Models\Project;
	use Carbon\Carbon;
	use Illuminate\Database\Eloquent\Builder;
	use Illuminate\Http\JsonResponse;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Mail;

	class ProjectController extends Controller
	{
		public function index()
		{

		}

		public function store(StoreRequest $request): JsonResponse
		{
			if ($project = $request->user()->projects()->create($request->validated()))
				return response()->json(['id' => $project->id]);

			return response()->json(['error' => __('errors.create')], 422);
		}

		public function show()
		{

		}

		public function tasks(ListRequest $request, Project $project): JsonResponse
		{
			$tasks = $project->tasks()
				->when($finishedAt = $request->validated('finished_at'), fn(Builder $query) => $query->whereBetween('finished_at', [Carbon::parse($finishedAt)->startOfDay(), Carbon::parse($finishedAt)->endOfDay()]))
				->when($performer = $request->validated('performer'), fn(Builder $query) => $query->where('performer_id', $performer))
				->when($status = $request->validated('status'), fn(Builder $query) => $query->where('status', $status))
				->with('performer:id,email', 'media')->latest()->get();

			$tasks->transform(function ($task) {
				$task->file = $task->media->map(fn($media) => $media->getUrl())->first();
				return $task;
			});

			return response()->json($tasks);
		}

		public function storeTasks(TaskStoreRequest $request, Project $project): JsonResponse
		{
			$data = $request->validated();
			$task = $project->tasks()->create($data);

			if ($task && $request->hasFile('file'))
				$task->addMedia($request->file('file'))->toMediaCollection();

			if ($task) {
				$project->load('owner:id,email');
				Mail::to($project->owner->email)->queue(new TaskCreated($project, $task, $request->user()));

				if ($task->performer_id) {
					$task->load('performer:id,email');
					Mail::to($task->performer->email)->queue(new TaskAssigned($project, $task, $request->user()));
				}

				return response()->json(['success' => true, 'id' => $task->id]);
			}

			return response()->json(['success' => false, 'error' => __('errors.create')], 422);
		}
	}
