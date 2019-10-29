@extends('quantri.layoutquantri')
@section('pagetitle', 'Thêm thể loại')
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

<form method="post" action="{{ route('theloai.store') }}">
    {{ csrf_field() }}
    <div class="form-group">    
        <label for="first_name">Tên TL:</label>
        <input type="text" class="form-control" name="TenTL"/>
    </div>
    <div class="form-group">
        <label for="last_name">Thứ tự:</label>
        <input type="text" class="form-control" name="ThuTu"/>
    </div>
    <div class="form-group">            
        <input type="radio" name="AnHien" id="AH1" value="1" checked/> 
        <label for="AH1"> Hiện </label> &nbsp; &nbsp;
        <input type="radio" name="AnHien" id="AH0" value="0"/> 
        <label for="AH0"> Ẩn </label>
    </div>
    <div class="form-group">              
        <input type="radio" name="HienMenu" id="HM1" value="1" checked/> 
        <label for="HM1"> Hiện trên menu </label> &nbsp; &nbsp;
        <input type="radio" name="HienMenu" id="HM0" value="0"/> 
        <label for="HM0"> Ẩn trên menu</label>
    </div>
    <div class="form-group">              
        <input type="radio" name="lang" id="TV" value="vi" checked/> 
        <label for="TV"> Tiếng việt </label> &nbsp; &nbsp;
        <input type="radio" name="lang" id="EN" value="en"/> 
        <label for="EN"> English</label>
    </div>                      
    <button type="submit" class="btn btn-primary-outline">LƯU DATABASE</button>
</form>

@endsection
