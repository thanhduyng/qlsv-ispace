@extends('layouts.trangchu')

@section('content')
<main style="">
    <form action="" method="post">
        @csrf
        <div class="form-group row">
            <label style="margin-left: 20px; font-size: 15px; margin-top: 42px;" class="col-sm-2 col-xs-2">Lớp:</label>
            <div class="col-sm-10" style="width: 75%; float: left; margin-left: -15px;">
                <p style="margin-left: 10px;font-size: 15px; font-weight: bold;margin-top: 42px;">{{$qlsv_lophoc->tenlophoc}}
                </p>
            </div>
        </div>
        <table style="width: 93%; margin-left: 15px; margin-bottom: 10px; ">
            <?php $stt = 1 ?>
            <thead>
                <tr>
                    <th style="height: 13px;">STT</th>
                    <th class="andi" style="height: 13px;">Tiêu đề</th>
                    <th style="height: 13px;">Câu hỏi</th>
                    <th style="height: 13px; width: 50%;">Câu trả lời</th>
                </tr>
            </thead>
            <tbody>
                @foreach($qlsv_sinhvienlophoc as $values)
                <tr>
                    <td>
                        <?= $stt++ ?>
                    </td>
                    <td class="andi">
                        <p>{{$values->tieude}}</p>
                    </td>
                    <td>
                        <p>{{$values->cauhoi}}</p>
                    </td>
                    <td>
                        <p>{{$values->cautraloi}}</p>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </form>
</main>
<!-- end content -->
@endsection