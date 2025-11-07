<?php

	namespace App\Models;

	// use Illuminate\Contracts\Auth\MustVerifyEmail;
	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Relations\BelongsToMany;
	use Illuminate\Database\Eloquent\Relations\HasMany;
	use Illuminate\Foundation\Auth\User as Authenticatable;
	use Illuminate\Notifications\Notifiable;
	use Laravel\Sanctum\HasApiTokens;

	class User extends Authenticatable
	{
		use HasFactory, Notifiable, HasApiTokens;

		protected $fillable = [
			'name',
			'email',
			'password',
		];

		protected $hidden = [
			'password',
			'remember_token',
		];

		protected function casts(): array
		{
			return [
				'email_verified_at' => 'datetime',
				'password' => 'hashed',
			];
		}

		public function projects(): HasMany
		{
			return $this->hasMany(Project::class, 'owner_id');
		}

		public function projectsAsParticipant(): BelongsToMany
		{
			return $this->belongsToMany(Project::class, 'project_participants', 'user_id', 'project_id');
		}
	}
