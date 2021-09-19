@extends('layouts.trangchu')

@section('content')
<main style=" margin-bottom: 200px;">
    <form action="" method="post">
        @csrf
        <div class="form-group row">
            <label style="margin-left: 20px; font-size: 15px; margin-top: 42px;" class="col-sm-2 col-xs-2">Lớp:</label>
            <div class="col-sm-10" style="width: 75%; float: left; margin-left: -15px;">
                <p style="margin-left: 10px;font-size: 15px; font-weight: bold;margin-top: 42px;">{{$qlsv_lophoc->tenlophoc}}
                    <input type="hidden" name="idlop" value="{{$qlsv_lophoc->id}}">
                </p>
            </div>
        </div>
        <table style="width: 93%; margin-left: 15px; margin-bottom: 10px; ">
            <?php $stt = 1 ?>
            <thead>
                <tr>
                    <th style="height: 13px;">STT</th>
                    <th style="height: 13px; width: 30%;">Ngày / Buổi</th>
                    <th style="height: 13px; width: 40%;">Nội dung</th>
                    <th style="height: 13px; width: 30%;">Lý do</th>
                </tr>
            </thead>
            <tbody>
                @foreach($xinNghi as $values)
                <tr>
                    <td>
                        <?= $stt++ ?>
                    </td>
                    <td>{{ date('d-m-Y', strtotime($values->ngayhoc))}} /
                        @if( $values->cahoc == 1)
                        Sáng
                        @elseif($values->cahoc == 2)
                        Chiều
                        @elseif($values->cahoc == 3)
                        Tối
                        @endif
                    </td>
                    <td>
                        <p>{{$values->noidung}}</p>
                    </td>
                    <td>
                        <p>{{$values->lydo}}</p>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </form>
</main>
<!-- end content -->
@endsection