<?php

	namespace App\Http\Middleware;

	use Closure;
	use Illuminate\Http\Request;
	use Symfony\Component\HttpFoundation\Response;

	class CheckProjectAccess
	{
		public function handle(Request $request, Closure $next, ...$roles): Response
		{
			$project = $request->route('project');
			$task = $request->route('task');

			if ($task) {
				$task->load(['project', 'project.owner:id,email']);
				$project = $task->project;
			}

			if (!$project) abort(403, 'Unauthorized.');

			$isOwner = $project->owner_id === auth()->id();
			$isParticipant = $project->participants()->where('user_id', auth()->id())->exists();

			$isCheckOwner = in_array('owner', $roles);
			$isCheckParticipants = in_array('participant', $roles);

			$isUserHasAccess = ($isCheckOwner && $isOwner) || ($isCheckParticipants && $isParticipant);

			if (!$isUserHasAccess) abort(403, __('errors.project_access'));

			return $next($request);
		}
	}
