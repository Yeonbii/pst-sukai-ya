<!DOCTYPE html>
<html lang="en">
    <title>Desc Code</title>
<body>
    <h3>Keterangan Kode</h3>
    <table border="1">
        <thead>
            <tr>
                <th align="center" style="width: 50px; min-width: 50px;"><b>Kode</b></th>
                <th align="center" style="width: 1000px; min-width: 1000px;"><b>Pertanyaan</b></th>
                <th align="center" style="width: 500px; min-width: 500px;"><b>Opsi Jawaban</b></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($questions_i as $question)
                <tr>
                    <td align="center" valign="top"><b>I_{{ $question->no }}</b></td>
                    <td valign="top"><p>{{ $question->text }}</p></td>
                    <td valign="top">
                        @if ($question->input_type == '5')
                            @php
                                $no = 1;
                            @endphp
                        
                            @foreach ($question->options as $option)
                                <p>{{ $no }}. {{ $option->text }}</p>
                                
                                @php
                                    $no++;
                                @endphp
    
                            @endforeach
                            
                        @else

                            <p>-</p>

                        @endif
                    </td>
                </tr>
            @endforeach
            
            @foreach ($questions_s as $question)
                <tr>
                    <td align="center" valign="top"><b>S_{{ $question->no }}</b></td>
                    <td valign="top"><p>{{ $question->text }}</p></td>
                    <td valign="top">
                        @if ($question->input_type == '5')
                            @php
                                $no = 1;
                            @endphp
                        
                            @foreach ($question->options as $option)
                                <p>{{ $no }}. {{ $option->text }}</p>
                                
                                @php
                                    $no++;
                                @endphp
    
                            @endforeach
                            
                        @else

                            <p>-</p>

                        @endif
                    </td>
                </tr>
            @endforeach
            
            @foreach ($questions_sv as $question)
                <tr>
                    <td align="center" valign="top"><b>SV_{{ $question->no }}</b></td>
                    <td valign="top"><p>{{ $question->text }}</p></td>
                    <td valign="top">
                        @if ($question->input_type == '5')
                            @php
                                $no = 1;
                            @endphp
                        
                            @foreach ($question->options as $option)
                                <p>{{ $no }}. {{ $option->text }}</p>
                                
                                @php
                                    $no++;
                                @endphp
    
                            @endforeach
                            
                        @else

                            <p>-</p>

                        @endif
                    </td>
                </tr>
            @endforeach

            @foreach ($questions_sr as $question)
                <tr>
                    <td align="center" valign="top"><b>SR_{{ $question->no }}</b></td>
                    <td valign="top"><p>{{ $question->text }}</p></td>
                    <td valign="top">
                        <p>-</p>
                    </td>
                </tr>
            @endforeach

            @foreach ($questions_f as $question)
                <tr>
                    <td align="center" valign="top"><b>F_{{ $question->no }}</b></td>
                    <td valign="top"><p>{{ $question->text }}</p></td>
                    <td valign="top">
                        <p>-</p>
                    </td>
                </tr>
            @endforeach

            @foreach ($questions_o as $question)
                <tr>
                    <td align="center" valign="top"><b>O_{{ $question->no }}</b></td>
                    <td valign="top"><p>{{ $question->text }}</p></td>
                    <td valign="top">
                        @if ($question->input_type == '5')
                            @php
                                $no = 1;
                            @endphp
                        
                            @foreach ($question->options as $option)
                                <p>{{ $no }}. {{ $option->text }}</p>
                                
                                @php
                                    $no++;
                                @endphp
    
                            @endforeach
                            
                        @else

                            <p>-</p>

                        @endif
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>
</html>