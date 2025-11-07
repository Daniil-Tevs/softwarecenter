<?php

	namespace App\Http\Controllers\Api;

	use App\Http\Controllers\Controller;
	use App\Http\Requests\Api\Projects\StoreRequest;
	use Illuminate\Http\JsonResponse;
	use Illuminate\Http\Request;

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

		public function tasks()
		{

		}
	}
