<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tin extends Model
{
    protected $table='tin';
	protected $primaryKey='idTin';
    protected $dates = ['Ngay']; //Khai báo các file kiểu ngày
	protected $fillable = [
           'TieuDe','TomTat','urlHinh','Ngay','idUser', 'Content',
    'idLT','idTL','SoLanXem', 'idTL', 'TinNoiBat', 'AnHien','tags',
    ];

}
