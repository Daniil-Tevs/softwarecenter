<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\Relations\BelongsTo;
	use Illuminate\Database\Eloquent\Relations\BelongsToMany;
	use Illuminate\Database\Eloquent\Relations\HasMany;

	class Project extends Model
	{
		protected $fillable = [
			'name',
			'owner_id'
		];


		public function owner(): BelongsTo
		{
			return $this->belongsTo(User::class, 'owner_id');
		}

		public function participants(): BelongsToMany
		{
			return $this->belongsToMany(User::class, 'project_participants', 'project_id', 'user_id');
		}

		public function tasks(): HasMany
		{
			return $this->hasMany(Task::class, 'project_id');
		}
	}
