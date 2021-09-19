<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class qlsv_sinhvien extends Model
{
    protected $table = 'qlsv_sinhviens';
    protected $fillable = ['id', 'id_user','id_khoahoc','hovaten','diachi','gioitinh','sodienthoaicanhan','sodienthoaigiadinh','ghichu'];
    public $timestams = false;
}
