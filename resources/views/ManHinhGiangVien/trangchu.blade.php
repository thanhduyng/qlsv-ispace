@extends('layouts.layout')

@section('content')
<main>
    <div class="row" style="margin-bottom: 280px;">
        <div class="col-xs-4 cao40">
            <a href="{{ route('giang_vien.tranglophoc') }}">
                <img src="/images/lophoc.png" class="lopgv">
            </a>
            <label class="lopgvlabel">Lớp Học</label>
        </div>
        <div class="col-xs-4 cao40">
            <a href="{{route("giang_vien.index")}}">
                <img src="/images/thongbao.png" class="thongbaogv">
            </a>
            <label class="thongbaogvlabel">Thông báo</label>
        </div>


        <div class="col-xs-4 cao40">
            <a href="{{route("giang_vien.viewxinnghilop")}}">
                <img src="/images/xinnghi.png" class="lopgv">
            </a>
            <label class="phepgvlabel">Phép của SV</label>
        </div>
    </div>
</main>
@endsection