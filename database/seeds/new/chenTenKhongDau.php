<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class chenTenKhongDau extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $kq = DB::select("select * from loaitin");
        foreach($kq as $Ten)
        {
            DB::table('loaitin')->where('idLT',$Ten->idLT)->update(['Ten_KhongDau' => Str::slug($Ten->Ten,'-')]);
        }
    }
}
