@extends('layouts.trangchu')

@section('content')
<main>
    <div class="row">
        <div class="col-xs-4 cao40">
            <a href="{{ route('quan_tri.viewdiemthi') }}">
                <img src="/images/diemthi.png" class="diemthipdt">
            </a>
            <label class="diemthipdtlabel">Điểm Thi</label>
        </div>
        <div class="col-xs-4 cao40">
            <a href="{{ route('quan_tri.viewdanhgia') }}">
                <img src="/images/tudanhgia.png" class="danhgiapdt">
            </a>
            <label class="danhgiapdtlabel">Đánh Giá</label>
        </div>
        <div class="col-xs-4 cao40">
            <a href="{{route("quan_tri.index")}}">
                <img src="/images/worktask.png" class="worktaskpdt">
            </a>
            <label class="worktaskpdtlabel">Work Task</label>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 cao20">
            <a href="{{ route('quan_tri.chonlophoc') }}">
                <img src="/images/lophoc.png" class="lophocpdt">
            </a>
            <label class="lophocpdtlabel">Lớp Học</label>
        </div>
        <div class="col-xs-4 cao20">
            <a href="{{route("quan_tri.index")}}">
                <img src="/images/thongbao.png" class="thongbaopdt">
            </a>
            <label class="thongbaopdtlabel">Thông báo</label>
        </div>
        <div class="col-xs-4 cao20">
            <a href="{{route("qlsv_monhoc.index")}}">
                <img src="/images/book.png" class="thongbaopdt">
            </a>
            <label class="thongbaopdtlabel" style="margin-left: 24px;">Môn học</label>
        </div>
        
    </div>
</main>
@endsection