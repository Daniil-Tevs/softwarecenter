<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\Relations\BelongsTo;

	class Task extends Model
	{
		protected $fillable = [
			'status',
			'title',
			'description',
			'file',
			'finished_at',
			'project_id',
			'performer_id',
		];

		protected $hidden = [
			'project_id',
			'performer_id'
		];

		public function performer(): BelongsTo
		{
			return $this->belongsTo(User::class, 'performer_id');
		}

		public function project(): BelongsTo
		{
			return $this->belongsTo(Project::class, 'project_id');
		}
	}
