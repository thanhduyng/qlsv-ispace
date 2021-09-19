@extends('layouts.trangchu')

@section('content')
<div style="text-align:right;padding: 4px;">
    <a class="btn btn-success btn-sm" href="{{route('qlsv_tudanhgia.create',$idd)}}">
        <i class="glyphicon glyphicon-plus"></i></a>

</div>
<form method=get>
    <table id="demo">
        <thead class="andi">
            <tr>
                <th>STT</th>
                <th>Tiêu đề/Câu hỏi</th>
                <th>Chức Năng</th>
            </tr>
        </thead>
        <tbody>
            @if($tudanhgia->count())
            @foreach($tudanhgia as $i =>$values )
            <tr>
                <input type="hidden" value="{{$values->id}}">
                <td> <a class="btn btn-default btn-circle">
                        <?php static $k = 0;
                        echo $k = $k + 1; ?>
                    </a>
                </td>
                <td>
                    <div style="margin-left: 27px;">
                        <i?><a style="color: black; font-weight: bold;">{{$i+1}}. {{$values->tieude}}</a></i><br>
                        <i>- {{$values->cauhoi}}</i><br>
                    </div>
                </td>
                <td style="padding-left:0;line-height: 33px;">
                    <a class="btn-default btn-xs" href="{{route('qlsv_tudanhgia.edit',$values->id)}}">
                        <i class="glyphicon glyphicon-pencil"></i></a>
                    <a class="btn-default btn-xs servicedeletebtn" href="{{route('qlsv_tudanhgia.delete',$values->id)}}">
                        <i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</form>
<div>
</div>
@endsection