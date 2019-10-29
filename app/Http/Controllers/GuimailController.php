<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Session;

class GuimailController extends Controller
{
    function guimaillienhe(Request $request){
        $input = $request->all();
          Mail::send('mauthulienhe', 
            array(	'name'=>$input['name'],
                    'email'=>$input['email'], 
                    'content'=>$input['message']
            ), 
            function($message){
                $message
                ->from('anhluan.saigon@gmail.com','Từ ứng dụng website')
                ->to('anhluan.saigon123@gmail.com', 'Ban quan tri')
                //->attach('img/a.png') // gửi đính kèm file nếu muốn
                ->subject('Thư liên hệ');
            }
        );
          Session::flash('thongbao', 'Đã gửi mail thành công');
          //redirect()->route('/')	;	
          //print_r($_POST);
          return view('thongbao');
    }
    
}
