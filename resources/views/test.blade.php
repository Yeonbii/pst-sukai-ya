<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @vite('resources/css/app.css') --}}
    <title>Document</title>
</head>
<body>
    <div>
        <table border="1">
            <thead>
                <tr>
                    <th style="min-width: 300px">Bagian</th>
                    <th style="min-width: 300px">No</th>
                    <th style="">Text</th>
                    <th style="min-width: 300px">Note</th>
                    <th style="min-width: 300px">Pilihan Jawaban</th>
                    <th style="min-width: 300px">Pilihan Jawaban</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $question)
                    <tr>
                        <td>{{ $question->part->name }}</td>
                        <td align="center">{{ $question->no }}</td>
                        <td style="min-width:500px">{{ $question->text }}</td>
                        <td><p>{!! nl2br($question->note) !!}</p></td>
                        <td>
                            @foreach ($question->options as $option)
                                <p>{{ $option->no }}. {{ $option->text }}</p>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($question->options as $option)
                                <p>{{ $option->no }}. {{ $option->text }}</p>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
</body>
</html>