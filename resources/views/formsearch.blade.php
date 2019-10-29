<div class="nav__right-item nav__search">
        <a href="#" class="nav__search-trigger" id="nav__search-trigger">
          <i class="ui-search nav__search-trigger-icon"></i>
        </a>
        <div class="nav__search-box" id="nav__search-box">
          <form class="nav__search-form" action="<?=URL::to('timkiem');?>/" method="get">
            <input type="hidden" name="token" value="{{ csrf_token() }}" >
            <input type="text" placeholder="Nhập Từ Khóa" name="tukhoa" class="nav__search-input">
            <button type="submit" class="search-button btn btn-lg btn-color btn-button">
              <i class="ui-search nav__search-icon"></i>
            </button>
          </form>
        </div>                
      </div>