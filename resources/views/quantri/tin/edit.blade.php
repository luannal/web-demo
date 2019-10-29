@extends('quantri.layoutquantri')
@section('pagetitle', 'Chỉnh tin') 
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

<form method="post" action="{{ route('tintuc.update', $row->idTin) }}">
  {{ csrf_field()}}
  {!! method_field('patch') !!}
  <div class="wd-800 mg-l-30">
    <div class="d-flex flex-column wd-800">
      <div class="form-group mg-b-20">
        <input type="text" name="TieuDe" class="form-control" placeholder="Nhập tiêu đề tin" value="{{ $row->TieuDe }}" required>
      </div>
      <div class="form-group mg-b-20">
        <textarea name="TomTat" rows="3" class="form-control" placeholder="Nhập tóm tắt của tin">{{ $row->TomTat }}</textarea>
      </div>
      <div class="form-group mg-b-20">
        <input type="text" id="urlHinh" name="urlHinh" class="form-control" placeholder="Nhập địa chỉ hình của tin" value="{{ $row->urlHinh }}" required>
      </div>
    </div>
    <div class="d-flex">
      <div class="d-flex form-group mg-b-20">
        <label class="rdiobox">
            <input name="AnHien" type="radio" value="1" @if ($row->AnHien === 1)  checked @endif><span>Hiện</span>
        </label> &nbsp
        <label class="rdiobox">
            <input name="AnHien" type="radio" value="0" @if ($row->AnHien === 0)  checked @endif><span>Ẩn</span>
        </label>
      </div>

      <div class="d-flex form-group mg-b-20 mg-l-120">
        <label class="rdiobox">
          <input name="TinNoiBat" type="radio" value="1" @if ($row->TinNoiBat === 1)  checked @endif><span>Nổi bật</span>
        </label> &nbsp; 
        <label class="rdiobox">
          <input name="TinNoiBat" type="radio" value="0" @if ($row->TinNoiBat === 0)  checked @endif><span>Bình thường</span>
        </label>
      </div>        

      <div class="d-flex form-group mg-b-20 mg-l-120">
        <label class="rdiobox">
            <input name="lang" type="radio" value="vi" @if ($row->lang === "vi")  checked @endif><span>Tiếng Việt</span>
        </label> &nbsp
        <label class="rdiobox">
            <input name="lang" type="radio" value="en" @if ($row->lang === "en")  checked @endif><span>English</span>
        </label>
      </div>
    </div>
    <div class="d-flex">
      <div class="d-flex form-group mg-b-20 wd-300">
        <select name="idTL" class="form-control select2 mg-b-20">
            @php
            $kq = DB::select("select idTL, TenTL from theloai order by ThuTu");
            foreach ($kq as $rowTL ) {
                if ($rowTL->idTL !=$row->idTL) 
                    echo "<option value='{$rowTL->idTL}'>{$rowTL->TenTL}</option>";	
                else 
                    echo "<option value='{$rowTL->idTL}' selected>{$rowTL->TenTL}</option>";	
            }
            @endphp
               
        </select>       
      </div>
         
      <div class="d-flex form-group mg-b-20 mg-l-50 wd-300">
        <select name="idLT" class="form-control select2 mg-b-20 ">
            @php
                $listLT = DB::select("select idLT, Ten from loaitin WHERE idTL=" . $row->idTL ." order by ThuTu");
                foreach ($listLT as $rowLT ) {
                    if ($rowLT->idLT !=$row->idLT) 
                        echo "<option value='{$rowLT->idLT}'>{$rowLT->Ten}</option>";	
                    else 
                        echo "<option value='{$rowLT->idLT}' selected>{$rowLT->Ten}</option>";	
                }
            @endphp

        </select>
      </div>	
    </div>
    <div class="d-flex">
        <div class="d-flex form-group mg-b-20 wd-300">
          <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
          <input type="text" name="Ngay" class="form-control fc-datepicker" placeholder="MM/DD/YYYY" value="{{ date('d/m/Y',strtotime($row->Ngay)) }}">        
        </div>
        <div class="d-flex form-group mg-b-20 mg-l-50 wd-300">
          <input type="text" name="tags" class="form-control" placeholder="Tags của tin" value="{{ $row->tags }}">
        </div>
    </div>
    <div class="form-group mg-b-20">
        <textarea id="Content" name="Content" rows="3" class="form-control" placeholder="Nhập nội dung của tin">{{ $row->Content }}</textarea>
    </div>
          
    <button type="submit" class="btn btn-default">LƯU DATABASE</button>
  </div>         
</form> 
@endsection

@section('jsscript')
<script src="{{ asset('public/lib') }}/jquery-ui/jquery-ui.js"></script>
<script src="{{ asset('public/lib') }}/select2/js/select2.min.js"></script>
<script src="{{ asset('public/lib') }}/highlightjs/highlight.pack.js"></script>
<script src="{{ asset('public/lib') }}/medium-editor/medium-editor.js"></script>
<script src="{{ asset('public/lib') }}/summernote/summernote-bs4.min.js"></script>
<script type="text/javascript" src="{{ asset('public/ckfinder') }}/ckfinder.js?t=20100601"></script>
<link href="{{ asset('public/lib') }}/highlightjs/github.css" rel="stylesheet">
<link href="{{ asset('public/lib') }}/summernote/summernote-bs4.css" rel="stylesheet">
<script>
    $(document).ready(function(){
      $("[name='idTL']").change(function(){ 
        var idTL= $(this).val();
        $("[name='idLT']").load("/la_news/layloaitintrong1theloai/" + idTL);
      });

      $('.fc-datepicker').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        dateFormat: 'dd/mm/yy'
      });
      
      $('#Content').summernote({
          height: 200         
      });
      
      
      var tf1 = document.getElementById( 'urlHinh' );
      tf1.onclick = function(){
        selectFileWithCKFinder( 'urlHinh' );
      };
      
      function selectFileWithCKFinder( elementId ){
        CKFinder.popup({
          chooseFiles: true,
          width: 800,	height: 600,
          onInit: function( finder ) {
            finder.on( 'files:choose', function( evt ) {
              var file = evt.data.files.first();
              var output = document.getElementById( elementId );
              output.value = file.getUrl();
            } );

            finder.on( 'file:choose:resizedImage', function( evt ) {
              var output = document.getElementById( elementId );
              output.value = evt.data.resizedUrl;
            } );
          }
        });
      }

   });
</script>
@endsection