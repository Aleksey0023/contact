<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>

<p>В базу данных был добавлен новый контакт.</p><br>
<p>Имя: {{ $contact->name }}</p>
<p>Телефон: {{ $contact->phone }}</p>
<p>Email: {{ $contact->email }}</p>

</body>
</html>
