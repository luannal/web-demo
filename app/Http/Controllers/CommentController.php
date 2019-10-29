<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ykien;

class CommentController extends Controller
{
    public function comment($idTin,Request $request){
		$this->lang= session()->get('lang');
		if ($this->lang==null) $this->lang='vi';		
		\App::setLocale($this->lang);
		$noidung = $request->noidung;
		$noidung = strip_tags(trim($noidung));
		$name = $request->name;
		$name = strip_tags(trim($name));
		$email = $request->email;
        $email = strip_tags(trim($email));
        $anhien = 1;
		$comment = new ykien([
            'idTin'=>$idTin,
            'Ngay'=>date("Y-m-d"),
            'NoiDung'=>$noidung,
            'Email'=>$email,
            'HoTen'=>$name,
            'AnHien'=> $anhien
        ]);
        $comment->save();
        return redirect('tin/'.$idTin);
	}
}
