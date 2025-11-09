<x-layouts.mail>
	<x-slot:heading>
		<h2 style="margin: 0">Изменено задание <strong>"{{$task?->title}}"</strong></h2>
	</x-slot:heading>

	Пользователь <strong>{{$user->email}}</strong> обновил информацию в задании#{{$task?->id}} в проекте
	<strong>{{$project?->name}}</strong>.
</x-layouts.mail>
