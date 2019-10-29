<aside class="widget widget-popular-posts">
            <h4 class="widget-title">{{ trans('mes.txn') }}</h4>
            <ul class="post-list-small">
              <?php 
              $kq = DB::select("SELECT idTin,TieuDe,Ngay,TomTat, urlHinh, 
               loaitin.Ten as TenLT FROM tin, loaitin
               WHERE tin.idLT = loaitin.idLT AND tin.AnHien=1 AND tin.lang='$lang' 
               ORDER BY SoLanXem DESC LIMIT 0, 6");
              ?>
              <?php foreach($kq  as $row ) {?>
              <li class="post-list-small__item">
                <article class="post-list-small__entry clearfix">
                  <div class="post-list-small__img-holder">
                    <div class="thumb-container thumb-100">
                      <a href="<?=URL::to("/tin/{$row->idTin}");?>">
                        <img data-src="<?=$row->urlHinh?>" onerror="this.src='img/defaultimg.jpg'" src="img/defaultimg.jpg" alt="" class="post-list-small__img--rounded lazyload">
                      </a>
                    </div>
                  </div>
                  <div class="post-list-small__body">
                    <h3 class="post-list-small__entry-title">
                      <a href="<?=URL::to("/tin/{$row->idTin}");?>"><?=$row->TieuDe?></a>
                    </h3>
                    <ul class="entry__meta">
                      <li class="entry__meta-date">
                        <?=date('d/m/Y',strtotime($row->Ngay))?>
                      </li>
                    </ul>
                  </div>                  
                </article>
              </li>
              <?php }?>
            </ul>           
          </aside>