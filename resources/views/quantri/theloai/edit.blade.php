@extends('quantri.layoutquantri')
@section('pagetitle', 'Chỉnh thể loại') 
@section('main')

    @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div><br />
    @endif

    <form method="post" action="{{ route('theloai.update', $tl->idTL) }}">
        {{ csrf_field()}}
        {!! method_field('patch') !!}
   		  
        <div class="form-group">    
            <label for="first_name">Tên TL:</label>
            <input type="text" class="form-control" name="TenTL" value="{{ $tl->TenTL }}"/>
        </div>
        <div class="form-group">
            <label for="last_name">Thứ tự:</label>
            <input type="text" class="form-control" name="ThuTu" value="{{ $tl->ThuTu }}"/>
        </div>
        <div class="form-group">              
            <input type="radio" name="AnHien" id="AH1" value="1" @if ($tl->AnHien === 1)  checked @endif/> 
            <label for="AH1"> Hiện </label> &nbsp; &nbsp;
            <input type="radio" name="AnHien" id="AH0" value="0" @if ($tl->AnHien === 0)  checked @endif/> 
            <label for="AH0"> Ẩn </label>
          </div>
	   <div class="form-group">              
            <input type="radio" name="HienMenu" id="HM1" value="1" @if ($tl->HienMenu === 1)  checked @endif/> 
		    <label for="HM1"> Hiện trên menu </label> &nbsp; &nbsp;
		    <input type="radio" name="HienMenu" id="HM0" value="0" @if ($tl->HienMenu === 0)  checked @endif/> 
		    <label for="HM0"> Ẩn trên menu</label>
        </div>
	   <div class="form-group">              
            <input type="radio" name="lang" id="TV" value="vi" @if ($tl->lang === "vi")  checked @endif/> 
		    <label for="TV"> Tiếng việt </label> &nbsp; &nbsp;
		    <input type="radio" name="lang" id="EN" value="en" @if ($tl->lang === "en")  checked @endif/> 
            <label for="EN"> English</label>
          </div>                      
          <button type="submit" class="btn btn-primary-outline">LƯU DATABASE</button>
    </form>

@endsection
