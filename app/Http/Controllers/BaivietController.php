<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BaivietController extends Controller
{
	public $lang='vi';	
	public function __construct(){
		;
		
	}
    public function index(){
		
		$this->lang= session()->get('lang');
		if ($this->lang==null) $this->lang='vi';		
		\App::setLocale($this->lang);
        return view('_index')->with('lang',$this->lang);
    }
    
    public function detail($id){
		$this->lang= session()->get('lang');
		if ($this->lang==null) $this->lang='vi';		
		\App::setLocale($this->lang);
	   settype($id, "int"); if ($id<=0) return ;
	   $kq = DB::select("select * from tin where idTin=$id");
	   $ctTin=$kq[0];
	   return view('_detail')
	   ->with('title',$ctTin->TieuDe)
	   ->with('ctTin',$ctTin)
	   ->with('idLT',$ctTin->idLT)
	   ->with('lang', $this->lang)
	   ->with('tags',$ctTin->tags);
	}

	function cat($TenKD){	
		
		$this->lang= session()->get('lang');
		if ($this->lang==null) $this->lang='vi';		
		\App::setLocale($this->lang);
		$TenKD =  strip_tags(trim($TenKD));
		$kq = DB::select("select idLT, Ten as TenLT from loaitin where Ten_KhongDau =?",array($TenKD));
		if (count($kq)==0) die("Không biết loại tin");
		$idLT= $kq[0]->idLT;
		$TenLT = $kq[0]->TenLT;
		$lt = DB::table('tin')
		->select('idTin', 'TieuDe','TomTat','SoLanXem','Ngay','urlHinh')
		->where('idLT', '=', $idLT)->where('AnHien',1)
		->orderBy('idTin','desc')
		->paginate(6);
		$d=array('lang'=>$this->lang,'title'=>$TenLT,'TenLT'=>$TenLT,'listtin'=>$lt);
		return view('_cat',$d);
	}//cat
	  
	function lienhe(){
		
		$this->lang= session()->get('lang');
		if ($this->lang==null) $this->lang='vi';		
		\App::setLocale($this->lang);
		$d=array('lang'=>$this->lang,'title'=>'Liên hệ');
		return view('_lienhe',$d);
	}
	 
	public function changeLanguage($lang){		
		
		\Session::put('lang', $lang);		
		return redirect()->route('/'); 
	    //return redirect()->back();
	}

	public function timkiem(Request $request){
		
		$this->lang= session()->get('lang');
		if ($this->lang==null) $this->lang='vi';		
		\App::setLocale($this->lang);
		$lang= $this->lang;
		$tukhoa= $request->tukhoa;
		$tukhoa =  strip_tags(trim($tukhoa));
		$tin= DB::table('tin')
		->select('idTin', 'TieuDe','TomTat','Content','SoLanXem','Ngay','urlHinh')		
		->where('TieuDe', 'like', "%$tukhoa%")->orwhere('TomTat', 'like', "%$tukhoa%")->orwhere('Content', 'like', "%$tukhoa%")
		->orderBy('idTin','desc')
		->paginate(6);
		$d=array('lang'=>$this->lang,'title'=>$tukhoa,'tin'=>$tin,'tukhoa'=>$tukhoa);
		return view('_timkiem',$d);
	}
	
}
