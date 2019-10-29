@extends('quantri.layoutquantri')
@section('pagetitle', 'Thêm loại tin') 
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

<form method="post" action="{{ route('loaitin.store') }}">
    {{ csrf_field()}}
    <div class="wd-600 mg-l-30">
        <div class="d-flex flex-column wd-600">
            <div class="form-group mg-b-20">
                <label>Tên: <span class="tx-danger">*</span></label>
                <input type="text" name="Ten" class="form-control" placeholder="Nhập tên loại tin" required>
            </div>
            <div class="form-group mg-b-20">
                <label>Thứ tự:</label>
                <input type="text" name="ThuTu" class="form-control" placeholder="Nhập thứ tự của loại tin"> &nbsp;
            </div>

            <div class="d-flex justify-content-around">
                <div class="d-flex form-group mg-b-20">
                    <label class="rdiobox">
                        <input name="AnHien" type="radio" value="1" checked><span>Hiện</span>
                    </label> &nbsp
                    <label class="rdiobox">
                        <input name="AnHien" type="radio" value="0" ><span>Ẩn</span>
                    </label>
                </div>

                <div class="d-flex form-group mg-b-20">
                    <label class="rdiobox">
                        <input name="lang" type="radio" value="vi" checked><span>Tiếng Việt</span>
                    </label> &nbsp
                    <label class="rdiobox">
                        <input name="lang" type="radio" value="en" ><span>English</span>
                    </label>
                </div>

            </div>
            <select name="idTL" class="form-control select2 mg-b-20">
                <option value="0">Chọn thể loại</option>
                @php
                $kq = DB::select("select idTL, TenTL from theloai order by ThuTu");
                foreach ($kq as $rowTL ) {
                        echo "<option value='{$rowTL->idTL}'>{$rowTL->TenTL}</option>";	
                }
                @endphp
            </select>
        <button type="submit" class="btn btn-default">LƯU DATABASE</button>
        </div>
        
          
      
</form>
 
@endsection
