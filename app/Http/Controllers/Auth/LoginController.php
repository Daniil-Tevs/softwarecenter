<?php

	namespace App\Http\Controllers\Auth;

	use App\Http\Controllers\Controller;
	use App\Http\Requests\Auth\LoginRequest;
	use Illuminate\Http\JsonResponse;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Validation\ValidationException;

	class LoginController extends Controller
	{
		public function index(LoginRequest $request): JsonResponse
		{
			if (!Auth::attempt($request->validated()))
				throw ValidationException::withMessages(['email' => ['The provided credentials are incorrect.'],]);

			return response()->json(['token' => $request->user()->createToken('auth_token')->plainTextToken]);
		}
	}
