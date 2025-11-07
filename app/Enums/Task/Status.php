<?php

	namespace App\Enums\Task;

	enum Status: int
	{
		case Planned = 1;
		case Progress = 2;
		case Done = 3;

		public function label(): string
		{
			return match ($this) {
				self::Planned => 'Запланировано',
				self::Progress => 'В прогрессе',
				self::Done => 'Завершено',
			};
		}

		public static function values(): array
		{
			return array_map(fn($status) => $status->value, self::cases());
		}
	}
