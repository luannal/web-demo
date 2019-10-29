      <ul class="sidenav__menu" role="menubar">
        <li class="active">
          <a href="<?=URL::to('/');?>" class="sidenav__menu-url">{{ trans('mes.tch') }}</a>
        </li>

        <?php 
            $kq = DB::select("select idTL, TenTL from theloai WHERE AnHien=1 AND HienMenu=1 AND lang=? order by ThuTu ", array($lang));
        ?>

        <?php foreach ($kq as $rowTL ) {?>
        <li>
            
            <a href="#" class="sidenav__menu-url"><?=$rowTL->TenTL?></a>
            <button class="sidenav__menu-toggle" aria-haspopup="true" aria-label="Open dropdown" >
              <i class="ui-arrow-down" ></i>
            </button>
            <ul class="sidenav__menu-dropdown">
            <?php
                $kq1 = DB::select("SELECT idLT, Ten, Ten_KhongDau  FROM loaitin
                WHERE AnHien=1 and idTL=? ORDER BY ThuTu", array($rowTL->idTL));
            ?>
            <?php foreach ($kq1 as $rowLT ) {?>
            <li><a href="<?=URL::to("/loai/{$rowLT->Ten_KhongDau}");?>" class="sidenav__menu-url"><?=$rowLT->Ten;?></a></li>
            <?php }?>
            </ul>
            
        </li>
        <?php }?>
        
        <li>
          <a href="<?=URL::to("/lienhe");?>" class="sidenav__menu-url">{{ trans('mes.lh') }}</a>
        </li>
      </ul>