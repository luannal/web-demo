<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\loaitin;
use Illuminate\Support\Str;

class LoaitinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dslt = Loaitin::all();
        return view('quantri.loaitin.index', compact('dslt'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('quantri.loaitin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tl = new loaitin([
            'Ten' => $request->get('Ten'),
            'ThuTu' => $request->get('ThuTu'),
            'AnHien' => $request->get('AnHien'),
            'idTL' => $request->get('idTL'),
            'lang' => $request->get('lang'),
            'Ten_KhongDau'=> str::slug($request->get('Ten'),'-'),
        ]);
        $tl->save();
        return redirect('/loaitin')->with('success','Loại tin đã được lưu');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Loaitin::find($id);
        return view('quantri.loaitin.edit', compact('row'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tl = loaitin::find($id);
        $tl->Ten =  $request->get('Ten');
        $tl->ThuTu = $request->get('ThuTu');
        $tl->AnHien = $request->get('AnHien');
        $tl->idTL = $request->get('idTL');
        $tl->lang = $request->get('lang');
        $tl->Ten_KhongDau = str::slug($request->get('Ten'),'-');
        $tl->save();
        return redirect('/loaitin')->with('success','Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lt = loaitin::find($id);
        $lt->delete();
        return redirect('/loaitin')->with('success', 'Đã xóa xong');
    }
}
