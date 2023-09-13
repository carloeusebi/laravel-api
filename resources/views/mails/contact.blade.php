<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Someone sent you a message</h1>
    <p>Their email: {{ $data['email'] }}</p>
    <p>{{ $data['content'] }}</p>
</body>

</html>
