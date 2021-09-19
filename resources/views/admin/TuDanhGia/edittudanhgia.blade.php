@extends('layouts.trangchu')

@section('content')
<div style="text-align:right;padding: 4px;">
    <a class="btn btn-primary btn-sm" style="margin-right: 15px; margin-top: 5px;" href="<?= route('qlsv_tudanhgia.mon', $monhoc2[0]->id) ?>">
        <i class="glyphicon glyphicon-list-alt"></i></a>
</div>

<body>
    <div class="container-fluid py-5" style="margin-bottom: 80px;">
        <div class="row" style="padding: 20px;">
            <form id="jsvalidations" method="post" action="{{route('qlsv_tudanhgia.update',$qlsv_tudanhgia->id)}}">
                @csrf
                <div class="form-group row">
                    <div>
                        <input type="hidden" name="id" value="{{$qlsv_tudanhgia->id}}">
                    </div>
                    <div class="col-sm-6">
                        <label for="">Tiêu đề</label>
                        <textarea rows="2" id="tieude" type="text" class="form-control" name="tieude" placeholder="nhập tên tiêu đề">{{$qlsv_tudanhgia->tieude}}</textarea>
                    </div>

                    <div class="col-sm-6">
                        <label for="">Câu hỏi</label>
                        <textarea rows="3" id="cauhoi" type="text" class="form-control" name="cauhoi" placeholder="nhập câu hỏi">{{$qlsv_tudanhgia->cauhoi}}</textarea>
                    </div>

                    <div class="col-sm-3 ">
                        <label>Trạng thái</label>
                        <select name="trangthai" required class="form-control">
                        <option value="1" {{$qlsv_tudanhgia->trangthai == 1 ? 'selected' : '' }} name="trangthai"> Hiển thị
                        <option value="2" {{$qlsv_tudanhgia->trangthai == 2 ? 'selected' : '' }} name="trangthai"> Ẩn
                        </select>
                    </div>
                    <input type="hidden" name="id_monhoc" value="{{$monhoc2[0]->id}}" id="monhoc1" class="form-control" />
                    <input type="hidden" class="form-control" name="thutu" value="{{$qlsv_tudanhgia->thutu}}" />
                </div>
                <div>
                    <button type="submit" class="btn btn-primary px-4 float-right"><i class="glyphicon glyphicon-floppy-disk"></i> Lưu</button>
                </div>
            </form>
        </div>
    </div>
    @endsection