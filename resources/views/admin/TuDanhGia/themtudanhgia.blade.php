@extends('layouts.trangchu')

@section('content')
<div style="text-align:right;padding: 4px;">
    <a class="btn btn-primary btn-sm" style="margin-right: 15px; margin-top: 5px;" href="<?= route('qlsv_tudanhgia.mon', $id) ?>">
        <i class="glyphicon glyphicon-list-alt"></i></a>
</div>

<body>
    <div class="container-fluid py-5" style="margin-bottom: 140px;">
        <div class="row" style="padding: 20px;">
            <form id="jsvalidations" method="post" action="{{route('qlsv_tudanhgia.store')}}">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-3">
                        <label for="">Tiêu đề</label>
                        <textarea rows="2" id="tieude" type="text" class="form-control" name="tieude" placeholder="nhập tên tiêu đề"></textarea>
                    </div>

                    <div class="col-sm-3">
                        <label for="">Câu hỏi</label>
                        <textarea rows="3" id="cauhoi" type="text" class="form-control" name="cauhoi" placeholder="nhập tên câu hỏi"></textarea>
                    </div>

                    <div class="col-sm-3">
                        <input type="hidden" class="form-control" value={{$thutu}} id="thutu" name="thutu" placeholder="nhập thứ tự worktask" readonly />
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <input type="hidden" name="id_monhoc" value="{{$monhoc2[0]->id}}" id="monhoc1" class="form-control" />
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-success px-4 float-right"><i class="glyphicon glyphicon-plus"></i> Thêm mới</button>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#monhoc1").change(function(e) {
                e.preventDefault();


                // var _token = $("input[name='_token']").val();
                // var name = $("input[name='id_monhoc']").value;
                var name = document.getElementById("monhoc1").value;


                $.ajax({
                    url: '/worktask/show',
                    type: 'GET',
                    data: {
                        name: name
                    },
                    success: function(data) {

                        alert(data);
                        var thutu = JSON.parse(data);
                        alert(thutu);
                        document.getElementById("thutu").value = data.success;

                    }
                });
            });
        });
    </script>
    @endsection