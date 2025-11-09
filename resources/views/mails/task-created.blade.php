<x-layouts.mail>
	<x-slot:heading>
		<h2 style="margin: 0">Новое задание <strong>"{{$task?->title}}"</strong></h2>
	</x-slot:heading>

	Пользователь <strong>{{$user->email}}</strong> создал новое задание#{{$task?->id}} в проекте
	<strong>{{$project?->name}}</strong>.
</x-layouts.mail>
