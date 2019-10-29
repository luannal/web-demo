<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class theloai extends Model
{
    protected $table='theloai';
	protected $primaryKey='idTL';
	protected $fillable = [
        'idTL',
        'TenTL',
        'ThuTu',
        'AnHien',
        'lang',
        'HienMenu'       
    ];

}
