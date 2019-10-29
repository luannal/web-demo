<?php

use Illuminate\Database\Seeder;

class capnhatTenKD extends Seeder
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
