<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ykien extends Model
{
    protected $table='ykien';
	protected $primaryKey='idYKien';
	protected $fillable = [
        'idTin',
        'Ngay',
        'NoiDung',
        'Email',
        'HoTen',
        'AnHien'       
    ];
}
