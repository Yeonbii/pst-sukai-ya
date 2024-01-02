<!DOCTYPE html>
<html lang="en">
<body>
    <div>
        <h3>Tabel Data Responden diurutkan berdasarkan Tahun dan Bulan Penerimaan Layanan</h3>
        <table border="1">
            <thead>
                <tr>

                    <th align="center" style="width: 50px; min-width: 50px;"><b>No</b></th>
                    <th align="center" style="width: 200px; min-width: 200px;"><b>Name</b></th>

                    @foreach ($questions_i as $question)
                        <th
                            @if ($question->input_type == '7')
                                style="width: 50px; min-width: 50px;"
                            @else
                                style="width: 200px; min-width: 200px;"
                            @endif
                            align="center"
                        ><b>I_{{ $question->no }}</b></th>  
                    @endforeach

                    @foreach ($questions_s as $question)
                        <th 
                            @if ($question->input_type == '7')
                                style="width: 50px; min-width: 50px;"
                            @else
                                style="width: 200px; min-width: 200px;"
                            @endif
                            align="center"
                        ><b>S_{{ $question->no }}</b></th>  
                    @endforeach

                    @foreach ($questions_sv as $question)
                        <th align="center" style="width: 50px; min-width: 50px;"><b>SV_{{ $question->no }}</b></th>  
                    @endforeach

                    @foreach ($questions_sr as $question)
                        <th align="center" style="width: 50px; min-width: 50px;"><b>SR_{{ $question->no }}</b></th>  
                    @endforeach
                    
                    @foreach ($questions_f as $question)
                        <th align="center" width="500px" style="width: 500px; min-width: 500px;"><b>F_{{ $question->no }}</b></th>  
                    @endforeach

                    @foreach ($questions_o as $question)
                        <th 
                            @if ($question->input_type == '7')
                                style="width: 50px; min-width: 50px;"
                            @elseif ($question->input_type == '9')
                                style="width: 500px; min-width: 500px;"
                            @else
                                style="width: 200px; min-width: 200px;"
                            @endif
                            align="center"
                        ><b>O_{{ $question->no }}</b></th>  
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($respondens as $responden)
                    <tr>

                        <td align="center" valign="top">
                            <p>{{ $no }}</p>
                        </td>

                        <td valign="top">
                            <p>{{ $responden->name }}</p>
                        </td>

                        @foreach ($responden->questions as $question)
                            <td valign="top" style="{{ ($question->input_type == '6' || $question->input_type == '8') ? 'text-align: center;' : '' }}">
                                <p>{{ $question->pivot->value }}</p>
                            </td>
                        @endforeach
                        
                    </tr>
                    @php
                        $no++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>    
</body>
</html>
