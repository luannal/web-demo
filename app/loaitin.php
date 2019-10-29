<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaitin extends Model
{
    protected $table='loaitin';
	protected $primaryKey='idLT';
	protected $fillable = [
        'idLT',
        'Ten',
        'ThuTu',
        'AnHien',
        'lang',
        'idTL',
        'Ten_KhongDau',       
    ];
}
