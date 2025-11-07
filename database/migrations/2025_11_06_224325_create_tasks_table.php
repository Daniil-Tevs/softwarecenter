<?php

	use App\Enums\Task\Status;
	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;

	return new class extends Migration {
		/**
		 * Run the migrations.
		 */
		public function up(): void
		{
			Schema::create('tasks', function (Blueprint $table) {
				$table->id();
				$table->enum('status', Status::values());

				$table->string('title');
				$table->text('description')->nullable();
				$table->string('file')->nullable();

				$table->timestamp('finished_at')->nullable();

				$table->foreignId('project_id')->constrained('projects')->cascadeOnUpdate()->cascadeOnDelete();
				$table->foreignId('performer_id')->nullable()->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();

				$table->timestamps();
			});
		}

		/**
		 * Reverse the migrations.
		 */
		public function down(): void
		{
			Schema::dropIfExists('tasks');
		}
	};
