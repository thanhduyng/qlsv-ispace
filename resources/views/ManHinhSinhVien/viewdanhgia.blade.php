@extends('layouts.layout')

@section('content')

<head>
    <style>
        @media (max-width: 880px) {
            .cauhoi {
                float: none !important;
                ;
            }
        }
    </style>
</head>
<div class="container-fluid py-5" style="padding: 20px;margin-left: -40px;margin-top: 5px;">
    <div class="row" style="padding: 20px;margin-bottom: 150px; ">
        <form id="jsvalidations" method="post" action="{{ route('sinh_vien.storedanhgia') }}">
            @csrf
            @if($isSubmit==0)
            <div class="form-group row">
                <label style="margin-left: 40px; font-size: 15px;" class="col-sm-2 col-xs-2">Lớp:</label>
                <div class="col-sm-10" style="width: 75%; float: left; margin-left: -15px;font-size: 15px; font-weight: bold;">
                    <p>{{$qlsv_lophoc->tenlophoc}}
                        <input type="hidden" name="id_lophoc" value="{{$qlsv_lophoc->id}}">
                    </p>
                </div>
            </div>
            @endif
            @if($isSubmit==1)
            <div>
                <h4 style="text-align: center; font-weight: bold;margin-top: 40px;">Chưa có đánh giá</h4>
            </div>
            @endif
            <div>
                <input type="hidden" name="id_sinhvien" value="{{$qlsv_sinhvien->id}}">
            </div>
            <div class="form-group row">
                <div class="col-sm-7 col-xs-12">
                    @if($qlsv_tudanhgiasinhvienlophocs->count())
                    @foreach($qlsv_tudanhgiasinhvienlophocs as $i =>$values )
                    <ul>
                        <input type="hidden" name="id_tudanhgia[]" value="{{$values->id_tdg}}">
                        <h4 style="font-size: 18px;font-weight: bold; display: block;">{{$values->tieude}}</h4>
                        <a style="color: gray; float: left; margin-top: -2px; font-weight: bold;">{{$i+1}}.</a>
                        <li class="cauhoi" style="list-style: none; float: left; margin-left: 6px; font-style: italic;">{{$values->cauhoi}}.</li>
                        <li style="list-style: none; margin-top: 8px; margin-left: 14px;">
                            <textarea rows="4" type="text" value="" class="form-control" id="cautraloi[]" name="cautraloi[]" placeholder="nhập câu trả lời"></textarea><br>
                        </li>
                    </ul>
                    @endforeach
                    @endif
                </div>
            </div>
            @if($isSubmit==0)
            <button style="margin-left: 54px;margin-top: -60px;" type="submit" class="btn btn-primary px-4 float-right">
                <i class="glyphicon glyphicon-send"></i> Gửi</button>
            @endif
        </form>
    </div>
</div>
@endsection