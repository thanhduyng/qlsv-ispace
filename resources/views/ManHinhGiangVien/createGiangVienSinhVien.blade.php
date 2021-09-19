@extends('layouts.layout')

@section('content')
<!-- <div style="margin-top: 100px;">
    <form action="<?= route("giang_vien.search") ?>" method="get">
        <div>
            <div class="form-group">
                <div class="col-xs-8">
                    <input style="width: 330px;margin-top: -1px;" id="" class="form-control" type="text" value="{{$search}}" name="search" placeholder="nhập tên sinh viên">
                </div>
                <div class="col-xs-2">
                    <button style="margin-left: 73px;" type="submit" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
        </div>
    </form>
</div> -->

<div class="form-group row">
    <label style="margin-left: 15px; margin-top: 42px; font-size: 15px;" class="col-sm-2 col-xs-2">Lớp:</label>
    <div class="col-sm-10" style="width: 75%; float: left; margin-left: -15px;">
        <p style="margin-left: 10px;margin-top: 42px; font-size: 15px; font-weight: bold;">{{$qlsv_lophoc->tenlophoc}}
        </p>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="row" style="padding: 15px;">
        <form id="jsvalidations" method="post" action="{{route('giang_vien.storeGiangVienSinhVien')}}">
            @csrf
            <div class="form-group row">
                <div class="col-sm-12">
                    <label>Tiêu đề</label>
                    <input type="text" class="form-control" id="" name="tieude" placeholder="nhập tiêu đề" />
                </div>
                <div class="col-sm-12">
                    <label>Nội dung</label>
                    <textarea type="text" class="form-control" rows="3" name="noidung" placeholder="nhập nội dung"></textarea>
                </div>
            </div>

            <div class="row" style="margin-top: 5px;">
                <div class="col-xs-12">
                    <a style="color: black; font-size: 20px;">Chọn sinh viên</a> <a class="btn-default btn-xs" href=""></a>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <th style="height: 13px;">STT</th>
                        <th style="height: 13px; width: 50%;">Tên sinh viên</th>
                        <th style="height: 13px; width: 15%;">Chọn</th>
                    </tr>
                </thead>
                <tbody class="sinhvien_duocchon">
                    @php
                    $stt = 1;
                    @endphp
                    @foreach($sinhVien as $key=>$value)
                    <tr>
                        <td class=stt><span class=stt>{{$stt++}}</span></td>
                        <input type="hidden" class="id_sinhvien" value="{{$value->id}}">
                        <input type="hidden" class="tensinhvien" value="{{$value->hovaten}}">
                        <td>{{$value->hovaten}}</td>
                        <td><input type="checkbox" name="id_user[]" value="{{$value->id_user}}" /></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="submit" style="margin-top: 10px;" class="btn btn-primary px-4 float-right">
                <i class="glyphicon glyphicon-send"></i> Gửi</button>
        </form>

    </div>
</div>
@endsection