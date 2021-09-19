<?php

namespace App\Http\Controllers;

use App\qlsv_monhoc;
use App\qlsv_sinhvienlophoc;
use App\qlsv_tudanhgia;
use App\qlsv_tudanhgiasinhvienlophoc;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QlsvTudanhgiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = " Danh sách Tự đánh giá";
        $search = $request->get('search') ?? "";
        $qlsv_monhoc = DB::table('qlsv_monhocs')->pluck('tenmonhoc', 'id');

        $qlsv_tudanhgia = DB::table('qlsv_tudanhgias')
            ->where('id_monhoc', 'like', '%' . $search . '%')
            ->where("deleted_at", 0)
            ->get();
        return view('admin/TuDanhGia/listtudanhgia', compact([
            'title', 'search'
        ]), [
            'qlsv_monhoc' => $qlsv_monhoc,
            'qlsv_tudanhgia' => $qlsv_tudanhgia
        ]);
    }

    public function mon(qlsv_monhoc $qlsv_monhoc, Request $request, $id)
    {
        $tudanhgia1 = qlsv_monhoc::find($id);

        $tudanhgia = DB::table('qlsv_tudanhgias')
            ->join('qlsv_monhocs', 'qlsv_tudanhgias.id_monhoc', '=', 'qlsv_monhocs.id')
            ->where('qlsv_monhocs.id', $id)
            ->where('qlsv_tudanhgias.deleted_at', 0)
            ->select('qlsv_tudanhgias.id', 'qlsv_tudanhgias.id_monhoc', 'qlsv_tudanhgias.tieude', 'qlsv_tudanhgias.cauhoi', DB::raw('count(*) as user_count'))
            ->groupBy('qlsv_tudanhgias.id')
            ->get();

        $monhoc = DB::table("qlsv_monhocs")->pluck("tenmonhoc", "id");

        $title = "Danh sách đánh giá  môn  " . $tudanhgia1->tenmonhoc;

        return view("admin/TuDanhGia/dstudanhgia", ['tudanhgia' => $tudanhgia, 'title' => $title, 'monhoc' => $monhoc, 'idd' => $id]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $monhoc = DB::table("qlsv_monhocs")->pluck("tenmonhoc", "id");

        $monhoc2 = DB::table("qlsv_monhocs")
            ->where('id', $id)
            ->where('deleted_at', 0)->get();

        $title = "Tạo đánh giá môn " . $monhoc2[0]->tenmonhoc;

        $thutu = DB::table("qlsv_tudanhgias")
            ->where('deleted_at', 0)
            ->where('id_monhoc', $monhoc2[0]->id)
            ->max('thutu');

        return view("admin/TuDanhGia/themtudanhgia", ['monhoc' => $monhoc, 'monhoc2' => $monhoc2, 'title' => $title, 'thutu' => $thutu + 1, 'id' => $id]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tudanhgia = new qlsv_tudanhgia();
        $tudanhgia->id_monhoc = $request->request->get("id_monhoc");

        $thutu = DB::table("qlsv_tudanhgias")
            ->where('deleted_at', 0)
            ->where('id_monhoc', $tudanhgia->id_monhoc)
            ->max('thutu');

        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $data  = new qlsv_tudanhgia();
        $data->id_monhoc = $request->id_monhoc;
        $data->tieude = $request->tieude;
        $data->cauhoi = $request->cauhoi;
        $data->trangthai = 1;
        $data->thutu = $request->thutu;
        $data->deleted_at = "0";
        $data->created_at =  Carbon::now();
        $users = auth()->user();
        $data->nguoitao = $users->name;
        $data->save();

        return  redirect()->route('qlsv_tudanhgia.create', ['id' => $tudanhgia->id_monhoc, 'thutu' => $thutu]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\qlsv_tudanhgia  $qlsv_tudanhgia
     * @return \Illuminate\Http\Response
     */
    public function show(qlsv_tudanhgia $qlsv_tudanhgia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\qlsv_tudanhgia  $qlsv_tudanhgia
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,qlsv_tudanhgia $qlsv_tudanhgia, $id)
    {

        $qlsv_tudanhgia = qlsv_tudanhgia::find($id);
        $qlsv_tudanhgia->id_monhoc = $request->request->get("id_monhoc");

        $monhoc2 = DB::table("qlsv_tudanhgias")
            ->join('qlsv_monhocs', 'qlsv_tudanhgias.id_monhoc', '=', 'qlsv_monhocs.id')
            ->where('qlsv_tudanhgias.id', $id)
            ->where('qlsv_monhocs.deleted_at', 0)
            ->where('qlsv_tudanhgias.deleted_at', 0)
            ->select('qlsv_monhocs.id', 'qlsv_monhocs.tenmonhoc')
            ->get();

        $title = "Cập nhập đánh giá môn " . $monhoc2[0]->tenmonhoc;

        $qlsv_monhoc = DB::table('qlsv_monhocs')->pluck('tenmonhoc', 'id');
        return view('admin/TuDanhGia/edittudanhgia', compact([
            'title', 'qlsv_monhoc', 'monhoc2','qlsv_tudanhgia'
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\qlsv_tudanhgia  $qlsv_tudanhgia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, qlsv_tudanhgia $qlsv_tudanhgia, $id)
    {

        $tudanhgia = qlsv_tudanhgia::find($id);
        $tudanhgia->tieude = $request->request->get("tieude");
        $tudanhgia->cauhoi = $request->request->get("cauhoi");
        $tudanhgia->trangthai = $request->request->get("trangthai");
        $tudanhgia->thutu = $request->request->get("thutu");
        $tudanhgia->id_monhoc = $request->request->get("id_monhoc");
        $users = auth()->user();
        $tudanhgia->nguoisua = $users->name;
        $tudanhgia->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $tudanhgia->save();
        return redirect('/tudanhgia/mon/' . $tudanhgia->id_monhoc);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\qlsv_tudanhgia  $qlsv_tudanhgia
     * @return \Illuminate\Http\Response
     */
    public function destroy(qlsv_tudanhgia $qlsv_tudanhgia, $id)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $qlsv_tudanhgia = DB::table('qlsv_tudanhgias')->where('id', $id)->update(["deleted_at" => "1", "updated_at" => Carbon::now()]);
        return response()->json(['_typeMessage' => 'deleteSuccess']);
    }
}
