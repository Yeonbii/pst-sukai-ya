<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @vite('resources/css/app.css') --}}
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div>
        <table>
            <thead>
                <tr>
                    <th style="min-width: 50px" rowspan="2">No</th>
                    <th style="min-width: 200px" rowspan="2">Name</th>
                    <th style="min-width: 200px" colspan="{{ $total_i }}">Bagian Identitas</th>
                    <th style="min-width: 200px" colspan="{{ $total_s }}">Bagian Layanan</th>
                    <th style="min-width: 200px" colspan="{{ $total_sv }}">Bagian Nilai Pelayanan</th>
                    <th style="min-width: 200px" colspan="{{ $total_sr }}">Bagian Rating Pelayanan</th>
                    <th style="min-width: 200px" colspan="{{ $total_f }}">Bagian Feedback</th>
                    <th style="min-width: 200px" colspan="{{ $total_o }}">Bagian Lain-lain</th>
                </tr>
                <tr>

                    @foreach ($questions_i as $question)
                        <th
                            @if ($question->input_type == '7')
                                style="min-width: 50px"
                            @else
                                style="min-width: 200px"
                            @endif
                        >I_{{ $question->no }}</th>  
                    @endforeach

                    @foreach ($questions_s as $question)
                        <th 
                            @if ($question->input_type == '7')
                                style="min-width: 50px"
                            @else
                                style="min-width: 200px"
                            @endif
                        >S_{{ $question->no }}</th>  
                    @endforeach

                    @foreach ($questions_sv as $question)
                        <th style="min-width: 50px">SV_{{ $question->no }}</th>  
                    @endforeach

                    @foreach ($questions_sr as $question)
                        <th style="min-width: 50px">SR_{{ $question->no }}</th>  
                    @endforeach
                    
                    @foreach ($questions_f as $question)
                        <th style="min-width: 500px">F_{{ $question->no }}</th>  
                    @endforeach

                    @foreach ($questions_o as $question)
                        <th 
                            @if ($question->input_type == '7')
                                style="min-width: 50px"
                            @elseif ($question->input_type == '9')
                                style="min-width: 500px"
                            @else
                                style="min-width: 200px"
                            @endif
                        >O_{{ $question->no }}</th>  
                    @endforeach

                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($respondens as $responden)
                    <tr>
                        <td align="center" valign="top">{{ $no }}</td>
                        <td valign="top">{{ $responden->name }}</td>
                        @foreach ($responden->questions as $question)
                            <td valign="top" style="{{ ($question->input_type == '6' || $question->input_type == '8') ? 'text-align: center;' : '' }}">
                                {{ $question->pivot->value }}
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
</body>
</html>