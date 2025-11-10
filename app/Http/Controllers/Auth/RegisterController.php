<?php

	namespace App\Http\Controllers\Auth;

	use App\Http\Controllers\Controller;
	use App\Http\Requests\Auth\RegisterRequest;
	use App\Models\User;
	use Illuminate\Http\JsonResponse;
	use Illuminate\Http\Request;

	class RegisterController extends Controller
	{
		/**
		 * @OA\Post(
		 *   path="/api/auth/register",
		 *   summary="Регистрация пользователя",
		 *   tags={"Auth"},
		 *   @OA\RequestBody(
		 *     required=true,
		 *     @OA\JsonContent(
		 *       required={"email","password","password_confirmation"},
		 *       @OA\Property(property="email", type="string", format="email", example="test@domain.com"),
		 *       @OA\Property(property="password", type="string", format="password", minLength=8, example="test6678"),
		 *       @OA\Property(property="password_confirmation", type="string", format="password", minLength=8, example="test6678")
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

		public function index(RegisterRequest $request): JsonResponse
		{
			if ($user = User::query()->create($request->validated()))
				return response()->json(['token' => $user->createToken('auth_token')->plainTextToken]);

			return response()->json(['error' => __('errors.create')], 422);
		}
	}
