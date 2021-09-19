@extends('layouts.layout')

@section('content')

<main style="margin-bottom: 20px;">
    <h1></h1><br>
    <form action="" method="post" style="margin-top: -22px; height: 1899px;">
        <h4 class="andi" style="text-align: center; font-weight: bold;">Thời Khoá Biểu</h4>
        <div class="andi">
            <hr>
        </div>
        <table style="margin-bottom: 200px;">
            <?php $stt = 1 ?>
            <thead>
                <tr class="andi">
                    <th style="height: 13px;">STT</th>
                    <th style="height: 13px; width: 90%;">Nội dung</th>

                </tr>
            </thead>
            <tbody>
                @foreach($thoiKhoaBieu as $i => $values)
                <tr>
                    <td>
                        <a class="btn btn-default btn-circle">{{$i+1}}</a>
                    </td>
                    <td>
                        <i style="font-weight: bold; margin-left: 20px;">
                            {{ date('d-m-Y', strtotime($values->ngayhoc))}} /
                            @if( $values->cahoc == 1)
                            Sáng
                            @elseif($values->cahoc == 2)
                            Chiều
                            @elseif($values->cahoc == 3)
                            Tối
                            @endif
                        </i><br>
                        <i style="margin-left: 20px"> <?php echo \App\qlsv_lophoc::find($values->id_lophoc)->tenlophoc ?></i><br>

                        @if($values->id_phonghoc !=null)
                        <i style="margin-left: 20px"><?php echo \App\qlsv_phonghoc::find($values->id_phonghoc)->tenphonghoc ?></i><br>
                        @endif
                        <i style="margin-left: 20px">
                            @if( $values->diadiemhoc == 1)
                            Trường
                            @elseif($values->diadiemhoc == 2)
                            Xưởng Ô tô
                            @elseif($values->diadiemhoc == 3)
                            Khác
                            @endif
                        </i><br>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </form>
</main>
<script>
    @endsection