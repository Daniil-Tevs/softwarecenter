<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\Relations\BelongsTo;
	use Spatie\MediaLibrary\HasMedia;
	use Spatie\MediaLibrary\InteractsWithMedia;

	class Task extends Model implements HasMedia
	{
		use InteractsWithMedia;

		protected $fillable = [
			'status',
			'title',
			'description',
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
