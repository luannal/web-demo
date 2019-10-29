<aside class="widget widget_categories">
            <h4 class="widget-title">{{ trans('mes.lt') }}</h4>
            <ul>
              <?php 
              $kq=DB::select("SELECT loaitin.idLT, loaitin.Ten_KhongDau, loaitin.Ten as TenLT,count(*) as SoTin FROM loaitin, tin 
              WHERE tin.idLT=loaitin.idLT AND tin.lang='$lang' AND loaitin.AnHien=1 
              GROUP BY loaitin.idLT, loaitin.Ten, loaitin.Ten_KhongDau 
              ORDER BY count(*) DESC LIMIT 0, 5");
              ?>

              <?php foreach($kq  as $row ) {?>
              <li><a href="<?=URL::to('/');?>/loai/<?=$row->Ten_KhongDau;?>"><?=$row->TenLT?><span class="categories-count"><?=$row->SoTin?></span></a></li>
              <?php }?>
            </ul>
          </aside> 