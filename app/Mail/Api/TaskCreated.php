<?php

	namespace App\Mail\Api;

	use App\Models\Project;
	use App\Models\Task;
	use App\Models\User;
	use Illuminate\Bus\Queueable;
	use Illuminate\Contracts\Queue\ShouldQueue;
	use Illuminate\Mail\Mailable;
	use Illuminate\Mail\Mailables\Content;
	use Illuminate\Mail\Mailables\Envelope;
	use Illuminate\Queue\SerializesModels;

	class TaskCreated extends Mailable implements ShouldQueue
	{
		use Queueable, SerializesModels;

		public function __construct(public Project $project, public Task $task, public User $user)
		{
		}

		public function envelope(): Envelope
		{
			$title = $this->task?->title ?? '';
			return new Envelope(
				subject: "Новое задание - $title",
			);
		}

		public function content(): Content
		{
			return new Content(
				view: 'mails.task-created',
			);
		}

		public function attachments(): array
		{
			return [];
		}
	}
