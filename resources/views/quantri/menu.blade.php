<div class="kt-sideleft">
    <label class="kt-sidebar-label">Quản Trị</label>
    <ul class="nav kt-sideleft-menu">
      <li class="nav-item">
        <a href="" class="nav-link with-sub">
          <span>Thể Loại</span>
        </a>
        <ul class="nav-sub">
          <li class="nav-item"><a href="{{ route('theloai.create')}}" class="nav-link">Thêm thể loại</a></li>
          <li class="nav-item"><a href="{{ route('theloai.index')}}" class="nav-link">Danhs sách thể loại</a></li>
        </ul>
      </li>
      
      <li class="nav-item">
        <a href="" class="nav-link with-sub">
          <span>Loại Tin</span>
        </a>
        <ul class="nav-sub">
          <li class="nav-item"><a href="{{ route('loaitin.create')}}" class="nav-link">Thêm loại tin</a></li>
          <li class="nav-item"><a href="{{ route('loaitin.index')}}" class="nav-link">Danhs sách loại tin</a></li>      
        </ul>
      </li><!-- nav-item -->

      <li class="nav-item">
        <a href="" class="nav-link with-sub">
          <span>Tin tức</span>
        </a>
        <ul class="nav-sub">
          <li class="nav-item"><a href="{{ route('tintuc.create')}}" class="nav-link">Thêm tin mới</a></li>
          <li class="nav-item"><a href="{{ route('tintuc.index')}}" class="nav-link">Danhs sách tin</a></li>
        </ul>
      </li>
   
    </ul>
  </div>