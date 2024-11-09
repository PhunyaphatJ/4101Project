<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($students as $student)
    <div>
        <p>{{ $student->student_id }}</p>
        <p>{{ $student->person->name }}</p>
        <p>{{ $student->person->surname }}</p>
        <p>{{ $student->student_type }}</p>
    </div>
    @endforeach
</body>
</html>