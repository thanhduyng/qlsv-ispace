@extends('layouts.layout')

@section('content')
<main style="padding-top: 0px; margin-top: 90px; margin-bottom: 20px;">
    <h1></h1><br>

    <div class="form-group row">
        <label style="margin-left: 15px;font-size: 15px;" class="col-sm-2 col-xs-2">Lớp:</label>
        <div class="col-sm-10" style="width: 75%; float: left; margin-left: -15px;">
            <p style="margin-left: 10px; font-size: 15px; font-weight: bold;">{{$qlsv_lophoc->tenlophoc}}
            </p>
        </div>
    </div>
    <form action="" method="post">
        <!-- <h4 style="text-align: center; font-weight: bold;">Bảng xin nghỉ phép của Sinh Viên</h4>
        <hr> -->
        <table style="width: 93%; margin-left: 15px; ">
            <?php $stt = 1 ?>
            <thead>
                <tr>
                    <th style="height: 13px;">STT</th>
                    <th style="height: 13px; width: 40%;"> SV</th>
                    <th style="height: 13px; width: 35%;">Ngày / Ca</th>
                    <th class="andi" style="height: 13px; width: 15%;">Nội dung</th>
                    <th style="height: 13px; width: 30%;">Lý do</th>

                </tr>
            </thead>
            <tbody>
                @foreach($xinNghiSV as $values)
                <tr>
                    <td>
                        <?= $stt++ ?>
                    </td>
                    <td>
                        <?php echo \App\qlsv_sinhvien::find($values->id_sinhvien)->hovaten ?>
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
                    <td class="andi">{{$values->noidung}} </td>
                    <td>{{$values->lydo}} </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </form>
</main>
@endsection