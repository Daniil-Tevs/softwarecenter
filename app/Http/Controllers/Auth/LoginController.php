<?php

	namespace App\Http\Controllers\Auth;

	use App\Enums\Task\Status;
	use App\Http\Controllers\Controller;
	use App\Http\Requests\Auth\LoginRequest;
	use Illuminate\Http\JsonResponse;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Validation\ValidationException;

	class LoginController extends Controller
	{
		/**
		 * @OA\Post(
		 *   path="/api/auth/login",
		 *   summary="Авторизация пользователя",
		 *   tags={"Auth"},
		 *   @OA\RequestBody(
		 *     required=true,
		 *     @OA\JsonContent(
		 *       required={"email","password"},
		 *       @OA\Property(property="email", type="string", format="email", example="test@domain.com"),
		 *       @OA\Property(property="password", type="string", format="password", minLength=8, example="test6678")
		 *     )
		 *   ),
		 *   @OA\Response(
		 *     response=200,
		 *     description="Успешный ответ с токеном",
		 *     @OA\JsonContent(
		 *       @OA\Property(property="token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9...")
		 *     )
		 *   ),
		 *   @OA\Response(
		 *     response=422,
		 *     description="Ошибка валидации или неверные учетные данные"
		 *   )
		 * )
		 */

		public function index(LoginRequest $request): JsonResponse
		{
			if (!Auth::attempt($request->validated()))
				throw ValidationException::withMessages(['email' => ['The provided credentials are incorrect.'],]);

			return response()->json(['token' => $request->user()->createToken('auth_token')->plainTextToken]);
		}
	}
