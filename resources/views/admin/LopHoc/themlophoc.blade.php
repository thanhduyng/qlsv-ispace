@extends('layouts.trangchu')

@section('content')
<div style="text-align:right;padding: 4px; margin-right: 10px;">
    <a style="margin-top: 5px;" class="btn btn-primary btn-sm" href="<?= route("qlsvlophoc.index") ?>">
        <i class="glyphicon glyphicon-list-alt"></i></a>
</div>
<form method="post" action="{{route('qlsvlophoc.storecopy')}}">
    @csrf
    <div class="form-group">
        <div class="col-sm-6 col-xs-6">
            <label for="">Khoá</label>
            <select name="id_khoahoc" id="id_khoahoc" required class="form-control" onchange="taotenlop()">
                <option value="">--Chọn--</option>
                @foreach($khoaHoc as $nd => $value)
                <option value="{{$nd}}" {{($nd == $lopHoc->id_khoahoc) ? 'selected' : ''}}>{{$value}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-6 col-xs-6">
            <label for="">Môn</label>
            <select name="id_monhoc" id="id_monhoc" required class="form-control" onchange="taotenlop()">
                <option>--Chọn--</option>
                @foreach($monHoc as $nd => $value)
                <option value="{{$nd}}" {{($nd == $lopHoc->id_monhoc) ? 'selected' : ''}}>{{$value}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <br> <br> <br>
    <div class="form-group">
        <div class="col-sm-6 col-xs-6" style=""><label>Giảng viên</label>
            <select name="id_giangvien" required class="form-control" onchange="taotenlop()" id="id_giangvien">
                <option>--Chọn--</option>
                @foreach($giangVien as $nd => $value)
                <option value="{{$nd}}" {{($nd == $lopHoc->id_giangvien) ? 'selected' : ''}}>{{$value}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-6 col-xs-6">
            <label for="">Tên Lớp</label>
            <input type="text" class="form-control" id="tenlophoc" name="tenlophoc" value="{{$lopHoc->tenlophoc}}" placeholder="nhập tên lớp học" />
        </div>
    </div>

    <div style="margin-top: 90px; margin-left: 15px;">
        <h4 style="font-size: 20px; font-weight: bold;">Danh sách sinh viên</h4>
    </div>
    <!-- Danh sách sinh viên -->

    <table style="width: 93%; margin-left: 15px;">
        <thead>
            <tr>
                <th style="height: 13px;">STT</th>
                <th style="height: 13px; width: 65%;">Tên sinh viên</th>
            </tr>
        </thead>
        <tbody class="sinhvien_duocchon">
            @php
            $stt = 1;
            @endphp
            @foreach($sinhvienlophocs as $key=>$value)
            <tr>
                <td class=stt><span class=stt>{{$stt++}}</span></td>
                <td>
                    <input type=hidden name=id_sinhvien[] class=id_sinhvien value="{{$key}}">
                    <?php echo \App\qlsv_sinhvien::find($value->id_sinhvien)->hovaten ?></i>
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- end danh sách sinh viên -->


    <button style="margin-left: 15px; margin-top: 4px;" type="submit" class="btn btn-primary px-4 float-right"><i class="glyphicon glyphicon-floppy-disk"></i> Lưu</button>
</form><br>
</div><br>

<script>
    function taotenlop() {
        var tengiangvien = $("#id_giangvien option:selected").text();
        var tenmonhoc = $("#id_monhoc option:selected").text();
        var tenkhoahoc = $("#id_khoahoc option:selected").text();
        $('#tenlophoc').val(tenkhoahoc + ' - ' + tenmonhoc + ' - ' + tengiangvien);
    }
</script>
@endsection