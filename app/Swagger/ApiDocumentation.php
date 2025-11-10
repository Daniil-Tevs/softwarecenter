<?php

	namespace App\Swagger;

	/**
	 * @OA\Info(
	 *   title="Soft Ware Center",
	 *   version="1.0.0",
	 *   description="Описание API для тестового задания"
	 * )
	 *
	 * @OA\SecurityScheme(
	 *   securityScheme="sanctum",
	 *   type="http",
	 *   scheme="bearer",
	 *   bearerFormat="JWT",
	 *   description="Laravel Sanctum token authentication"
	 * )
	 */
	class ApiDocumentation
	{
	}
