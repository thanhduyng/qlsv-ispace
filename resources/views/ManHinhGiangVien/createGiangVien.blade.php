@extends('layouts.layout')

@section('content')
<div class="row" style="margin-bottom: 20px;">
    <div class="col-xs-6" style="margin-top: 20px;">
        <a href="{{route('giang_vien.createGiangVienLop')}}">
            <img src="/images/lophocs.png" style="width: 78%; margin-top: 12px; margin-bottom: -89px; margin-left: 23px;">
        </a>
        <label style="margin-top: 90px; margin-left: 33px;">Tạo thông báo Lớp</label>
    </div>
   
    <div class="col-xs-6" style="margin-top: 20px;">
        <a href="{{route('giang_vien.createGiangVienSinhVienLop')}}">
            <img src="/images/students.png" style="width: 85%; margin-left: 15px;">
        </a>
        <label style="margin-top: 40px; margin-left: 36px;">Tạo thông báo SV</label>
    </div>

</div>
@endsection