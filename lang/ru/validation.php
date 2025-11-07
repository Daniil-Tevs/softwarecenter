<?php return [
	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| as the size rules. Feel free to tweak each of these messages here.
	|
	*/

	'accepted' => 'Поле :attribute должно быть принято.',
	'accepted_if' => 'Поле :attribute должно быть принято, когда :other равно :value.',
	'active_url' => 'Поле :attribute должно содержать действительный URL.',
	'after' => 'Поле :attribute должно содержать дату после :date.',
	'after_or_equal' => 'Поле :attribute должно содержать дату после или равную :date.',
	'alpha' => 'Поле :attribute должно содержать только буквы.',
	'alpha_dash' => 'Поле :attribute должно содержать только буквы, цифры, тире и подчёркивания.',
	'alpha_num' => 'Поле :attribute должно содержать только буквы и цифры.',
	'any_of' => 'Поле :attribute недействительно.',
	'array' => 'Поле :attribute должно быть массивом.',
	'ascii' => 'Поле :attribute должно содержать только однобайтовые алфавитно-цифровые символы и знаки.',
	'before' => 'Поле :attribute должно содержать дату до :date.',
	'before_or_equal' => 'Поле :attribute должно содержать дату до или равную :date.',
	'between' => [
		'array' => 'Количество элементов в поле :attribute должно быть между :min и :max.',
		'file' => 'Размер файла в поле :attribute должен быть между :min и :max килобайт.',
		'numeric' => 'Значение поля :attribute должно быть между :min и :max.',
		'string' => 'Длина строки в поле :attribute должна быть между :min и :max символов.',
	],
	'boolean' => 'Поле :attribute должно иметь значение true или false.',
	'can' => 'Поле :attribute содержит недопустимое значение.',
	'confirmed' => 'Подтверждение поля :attribute не совпадает.',
	'contains' => 'В поле :attribute отсутствует обязательное значение.',
	'current_password' => 'Неверный пароль.',
	'date' => 'Поле :attribute должно содержать действительную дату.',
	'date_equals' => 'Поле :attribute должно содержать дату, равную :date.',
	'date_format' => 'Поле :attribute должно соответствовать формату :format.',
	'decimal' => 'Поле :attribute должно иметь :decimal знаков после запятой.',
	'declined' => 'Поле :attribute должно быть отклонено.',
	'declined_if' => 'Поле :attribute должно быть отклонено, когда :other равно :value.',
	'different' => 'Поля :attribute и :other должны различаться.',
	'digits' => 'Поле :attribute должно содержать :digits цифр.',
	'digits_between' => 'Количество цифр в поле :attribute должно быть между :min и :max.',
	'dimensions' => 'Поле :attribute имеет недопустимые размеры изображения.',
	'distinct' => 'Поле :attribute содержит повторяющееся значение.',
	'doesnt_contain' => 'Поле :attribute не должно содержать ни одного из следующих значений: :values.',
	'doesnt_end_with' => 'Поле :attribute не должно заканчиваться одним из следующих: :values.',
	'doesnt_start_with' => 'Поле :attribute не должно начинаться с одного из следующих: :values.',
	'email' => 'Поле :attribute должно содержать действительный адрес электронной почты.',
	'ends_with' => 'Поле :attribute должно заканчиваться одним из следующих: :values.',
	'enum' => 'Выбранное значение для :attribute недействительно.',
	'exists' => 'Выбранное значение для :attribute недействительно.',
	'extensions' => 'Поле :attribute должно иметь одно из следующих расширений: :values.',
	'file' => 'Поле :attribute должно быть файлом.',
	'filled' => 'Поле :attribute обязательно для заполнения.',
	'gt' => [
		'array' => 'Количество элементов в поле :attribute должно быть больше :value.',
		'file' => 'Размер файла в поле :attribute должен быть больше :value килобайт.',
		'numeric' => 'Значение поля :attribute должно быть больше :value.',
		'string' => 'Длина строки в поле :attribute должна быть больше :value символов.',
	],
	'gte' => [
		'array' => 'Количество элементов в поле :attribute должно быть :value или больше.',
		'file' => 'Размер файла в поле :attribute должен быть больше или равен :value килобайт.',
		'numeric' => 'Значение поля :attribute должно быть больше или равно :value.',
		'string' => 'Длина строки в поле :attribute должна быть больше или равна :value символов.',
	],
	'hex_color' => 'Поле :attribute должно быть действительным шестнадцатеричным цветом.',
	'image' => 'Поле :attribute должно быть изображением.',
	'in' => 'Выбранное значение для :attribute недействительно.',
	'in_array' => 'Поле :attribute должно существовать в :other.',
	'in_array_keys' => 'Поле :attribute должно содержать хотя бы один из следующих ключей: :values.',
	'integer' => 'Поле :attribute должно быть целым числом.',
	'ip' => 'Поле :attribute должно содержать действительный IP-адрес.',
	'ipv4' => 'Поле :attribute должно содержать действительный IPv4-адрес.',
	'ipv6' => 'Поле :attribute должно содержать действительный IPv6-адрес.',
	'json' => 'Поле :attribute должно быть действительной JSON-строкой.',
	'list' => 'Поле :attribute должно быть списком.',
	'lowercase' => 'Поле :attribute должно быть в нижнем регистре.',
	'lt' => [
		'array' => 'Количество элементов в поле :attribute должно быть меньше :value.',
		'file' => 'Размер файла в поле :attribute должен быть меньше :value килобайт.',
		'numeric' => 'Значение поля :attribute должно быть меньше :value.',
		'string' => 'Длина строки в поле :attribute должна быть меньше :value символов.',
	],
	'lte' => [
		'array' => 'Количество элементов в поле :attribute не должно превышать :value.',
		'file' => 'Размер файла в поле :attribute должен быть меньше или равен :value килобайт.',
		'numeric' => 'Значение поля :attribute должно быть меньше или равно :value.',
		'string' => 'Длина строки в поле :attribute должна быть меньше или равна :value символов.',
	],
	'mac_address' => 'Поле :attribute должно содержать действительный MAC-адрес.',
	'max' => [
		'array' => 'Количество элементов в поле :attribute не должно превышать :max.',
		'file' => 'Размер файла в поле :attribute не должен превышать :max килобайт.',
		'numeric' => 'Значение поля :attribute не должно превышать :max.',
		'string' => 'Длина строки в поле :attribute не должна превышать :max символов.',
	],
	'max_digits' => 'Поле :attribute не должно содержать более :max цифр.',
	'mimes' => 'Поле :attribute должно быть файлом одного из типов: :values.',
	'mimetypes' => 'Поле :attribute должно быть файлом одного из типов: :values.',
	'min' => [
		'array' => 'Количество элементов в поле :attribute должно быть не менее :min.',
		'file' => 'Размер файла в поле :attribute должен быть не менее :min килобайт.',
		'numeric' => 'Значение поля :attribute должно быть не менее :min.',
		'string' => 'Длина строки в поле :attribute должна быть не менее :min символов.',
	],
	'min_digits' => 'Поле :attribute должно содержать не менее :min цифр.',
	'missing' => 'Поле :attribute должно отсутствовать.',
	'missing_if' => 'Поле :attribute должно отсутствовать, когда :other равно :value.',
	'missing_unless' => 'Поле :attribute должно отсутствовать, если :other не равно :value.',
	'missing_with' => 'Поле :attribute должно отсутствовать, когда присутствует :values.',
	'missing_with_all' => 'Поле :attribute должно отсутствовать, когда присутствуют все :values.',
	'multiple_of' => 'Поле :attribute должно быть кратным :value.',
	'not_in' => 'Выбранное значение для :attribute недействительно.',
	'not_regex' => 'Формат поля :attribute недействителен.',
	'numeric' => 'Поле :attribute должно быть числом.',
	'password' => [
		'letters' => 'Поле :attribute должно содержать хотя бы одну букву.',
		'mixed' => 'Поле :attribute должно содержать хотя бы одну заглавную и одну строчную букву.',
		'numbers' => 'Поле :attribute должно содержать хотя бы одну цифру.',
		'symbols' => 'Поле :attribute должно содержать хотя бы один символ.',
		'uncompromised' => 'Указанное значение :attribute обнаружено в утечке данных. Пожалуйста, выберите другое значение.',
	],
	'present' => 'Поле :attribute должно присутствовать.',
	'present_if' => 'Поле :attribute должно присутствовать, когда :other равно :value.',
	'present_unless' => 'Поле :attribute должно присутствовать, если :other не равно :value.',
	'present_with' => 'Поле :attribute должно присутствовать, когда присутствует :values.',
	'present_with_all' => 'Поле :attribute должно присутствовать, когда присутствуют все :values.',
	'prohibited' => 'Поле :attribute запрещено.',
	'prohibited_if' => 'Поле :attribute запрещено, когда :other равно :value.',
	'prohibited_if_accepted' => 'Поле :attribute запрещено, когда :other принято.',
	'prohibited_if_declined' => 'Поле :attribute запрещено, когда :other отклонено.',
	'prohibited_unless' => 'Поле :attribute запрещено, если :other не входит в :values.',
	'prohibits' => 'Поле :attribute запрещает присутствие :other.',
	'regex' => 'Формат поля :attribute недействителен.',
	'required' => 'Поле :attribute обязательно для заполнения.',
	'required_array_keys' => 'Поле :attribute должно содержать записи для: :values.',
	'required_if' => 'Поле :attribute обязательно, когда :other равно :value.',
	'required_if_accepted' => 'Поле :attribute обязательно, когда :other принято.',
	'required_if_declined' => 'Поле :attribute обязательно, когда :other отклонено.',
	'required_unless' => 'Поле :attribute обязательно, если :other не входит в :values.',
	'required_with' => 'Поле :attribute обязательно, когда присутствует :values.',
	'required_with_all' => 'Поле :attribute обязательно, когда присутствуют все :values.',
	'required_without' => 'Поле :attribute обязательно, когда отсутствует :values.',
	'required_without_all' => 'Поле :attribute обязательно, когда отсутствуют все :values.',
	'same' => 'Поля :attribute и :other должны совпадать.',
	'size' => [
		'array' => 'Количество элементов в поле :attribute должно быть равным :size.',
		'file' => 'Размер файла в поле :attribute должен быть :size килобайт.',
		'numeric' => 'Значение поля :attribute должно быть равным :size.',
		'string' => 'Длина строки в поле :attribute должна быть равной :size символов.',
	],
	'starts_with' => 'Поле :attribute должно начинаться с одного из следующих: :values.',
	'string' => 'Поле :attribute должно быть строкой.',
	'timezone' => 'Поле :attribute должно содержать действительный часовой пояс.',
	'unique' => 'Такое значение поля :attribute уже существует.',
	'uploaded' => 'Не удалось загрузить файл в поле :attribute.',
	'uppercase' => 'Поле :attribute должно быть в верхнем регистре.',
	'url' => 'Поле :attribute должно содержать действительный URL.',
	'ulid' => 'Поле :attribute должно быть действительным ULID.',
	'uuid' => 'Поле :attribute должно быть действительным UUID.',

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using the
	| convention "attribute.rule" to name the lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	*/

	'custom' => [
		'attribute-name' => [
			'rule-name' => 'custom-message',
		],
	],

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap our attribute placeholder
	| with something more reader friendly such as "E-Mail Address" instead
	| of "email". This simply helps us make our message more expressive.
	|
	*/

	'attributes' => [],
];
