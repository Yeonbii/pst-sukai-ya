<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <th>Bagian</th>
                <th>No</th>
                <th>Text</th>
                <th>Pilihan Jawaban</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questions as $question)
                <tr>
                    <td>{{ $question->part->name }}</td>
                    <td>{{ $question->no }}</td>
                    <td>{{ $question->text }}</td>
                    <td>
                        @foreach ($question->options as $option)
                            <p>{{ $option->no }}. {{ $option->text }}</p>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>