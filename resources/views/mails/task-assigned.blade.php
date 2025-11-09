<x-layouts.mail>
	<x-slot:heading>
		<h2 style="margin: 0">Вам назначено задание <strong>"{{$task?->title}}"</strong></h2>
	</x-slot:heading>

	Пользователь <strong>{{$project->owner->email}}</strong> указал Вас в качестве исполнителя для
	задания#{{$task?->title}} в проекте <strong>{{$project?->name}}</strong>.
</x-layouts.mail>
