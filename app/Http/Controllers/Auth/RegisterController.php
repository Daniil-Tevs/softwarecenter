<?php

	namespace App\Http\Controllers\Auth;

	use App\Http\Controllers\Controller;
	use App\Http\Requests\Auth\RegisterRequest;
	use App\Models\User;
	use Illuminate\Http\JsonResponse;
	use Illuminate\Http\Request;

	class RegisterController extends Controller
	{
		public function index(RegisterRequest $request): JsonResponse
		{
			if ($user = User::query()->create($request->validated()))
				return response()->json(['token' => $user->createToken('auth_token')->plainTextToken]);

			return response()->json(['error' => __('errors.create')], 422);
		}
	}
