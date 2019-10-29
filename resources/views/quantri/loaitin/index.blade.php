@extends('quantri.layoutquantri')
@section('pagetitle', 'Danh sách loại tin') 
@section('main')

<div class="row">
<div class="wd-900 mg-l-30">
  <table id="datatable1" class="table display responsive nowrap">
    <thead> <tr>
            <th>idLT</th>
            <th>Tên</th>
            <th>Thứ tự</th>
            <th>Ẩn hiện</th>
            <th>Tên Không Dấu</th>
            <th>Thể loại</th>
            <th>Ngôn ngữ</th>
            <th>Chỉnh</th>
		<th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dslt as $row)
        <tr>
            <td>{{$row->idLT}}</td>
            <td>{{$row->Ten}}</td>
            <td>{{$row->ThuTu}}</td>
            <td>{{$row->AnHien}}</td>
            <td>{{$row->Ten_KhongDau}}</td>
		    <td>{{$row->idTL}}</td>            
            <td>{{$row->lang}}</td>
            <td>
            <a href="{{ route('loaitin.edit',$row->idLT)}}" class="btn btn-primary"> 
                Chỉnh 
             </a>
            </td>
            <td>
             <form action="{{ route('loaitin.destroy' , $row->idLT)}}" method="post">
               {{ csrf_field()}}
               {!! method_field('delete') !!}
               <button class="btn btn-danger" type="submit" onclick="return confirm('Xóa hả?');">Xóa</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection

@section('jsscript')
<script src="{{ asset('public/lib') }}/datatables/jquery.dataTables.js"></script>
<link href="{{ asset('public/lib') }}/datatables/jquery.dataTables.css" rel="stylesheet">
<script>
        $(function(){
          $('#datatable1').DataTable({
            responsive: true,		  
          pageLength:5,    	  
            language: {
              searchPlaceholder: 'Tìm kiếm...',
              sSearch: '',
              lengthMenu: '_MENU_ items/page',
          paginate: {previous: " < ", next:" > " },
          lengthMenu: "Hiện _MENU_ tin trong mỗi trang",
          zeroRecords: "Không tìm thấy",
          info: "Đang hiện trang _PAGE_ trong _PAGES_ trang",
          infoEmpty: "Không có dòng nào",
          infoFiltered: "(Lọc trong _MAX_ tin)",
            }
          });
        });
      </script>
  
@endsection

  
