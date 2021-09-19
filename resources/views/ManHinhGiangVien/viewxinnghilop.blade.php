@extends('layouts.layout')

@section('content')
<form method=get action="">
    <table>
        <thead class="andi">
            <tr>
                <th>STT</th>
                <th width=100%>Nội dung</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lopHoc as $key=> $value)
            <tr>
                <td>
                    <a class="btn btn-default btn-circle">{{$key+1}}</a>
                </td>
                <td width=100%>
                    <p style="margin-left: 23px; font-size: 15px; height: 35px; margin-top: 15px;">Lớp: {{$value->tenlophoc}}</p>
                    <ul style="list-style: none; margin-top: 30px; margin-left: -17px; ">
                        <li style="float: left; margin-right: 3px; "><a class="btn-sm btn-success" style="padding: 8px 18px; font-size: 15px;" href="/giang_vien/viewxinnghisv/?id_lophoc={{$value->id}}">Xem thông tin</a></li>

                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">

    </div>
</form>
@endsection