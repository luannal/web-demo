<?php
if ($lang=="vi") {
  $kq = DB::select("SELECT giatri FROM cauhinh WHERE id=1");
} elseif ($lang=="en") {
  $kq = DB::select("SELECT giatri FROM cauhinh WHERE id=4");
}

$idLTs = $kq[0]->giatri;
$kq = DB::select("SELECT idLT, Ten as TenLT FROM loaitin WHERE idLT in ($idLTs)");
?>

<style>
  h2.entry__title {height:45px}
  div.entry__excerpt p {font-size:17px; text-align:justify; }
  div.entry__excerpt {height:83px; overflow:hidden; }

</style>

<section class="section tab-post mb-16">
            <div class="title-wrap title-wrap--line">
              <h3 class="section-title">{{ trans('mes.tm') }}</h3>

              <div class="tabs tab-post__tabs"> 
                <ul class="tabs__list">
                  <li class="tabs__item tabs__item--active">
                    <a href="#tab-all" class="tabs__trigger">{{ trans('mes.tc') }}</a>
                  </li>
                  <?php foreach($kq  as $row ) {?>
                  <li class="tabs__item">
                    <a href="#tab-<?=$row->idLT?>" class="tabs__trigger"><?=$row->TenLT?></a>
                  </li>
                  <?php } ?>                 
                </ul> <!-- end tabs -->
              </div>
            </div>

            <!-- tab content -->
            <div class="tabs__content tabs__content-trigger tab-post__tabs-content">
              
              <div class="tabs__content-pane tabs__content-pane--active" id="tab-all">
                <div class="row card-row">
                  <?php 
                  $arr = explode(",", $idLTs);
                  foreach ($arr as $idLT) {
                    
                    $tinmn = DB::select("SELECT idTin,TieuDe,Ngay,TomTat, urlHinh,loaitin.Ten, Ten_KhongDau 
                      FROM tin,loaitin WHERE tin.idLT=loaitin.idLT and tin.idLT = $idLT AND tin.AnHien=1 and tin.lang=? 
                      ORDER BY idTin DESC LIMIT 0, 2",array($lang));
                    foreach ($tinmn as $t ) {   
                  ?>
                  <div class="col-md-6">
                    <article class="entry card">
                      <div class="entry__img-holder card__img-holder">
                        <a href="<?=URL::to("/tin/{$t->idTin}");?>">
                          <div class="thumb-container thumb-70">
                            <img data-src="<?=$t->urlHinh?>" onerror="this.src='img/defaultimg.jpg'" src="img/defaultimg.jpg" class="entry__img lazyload" alt="" />
                          </div>
                        </a>
                        <a href="<?=URL::to('/');?>/loai/<?=$t->Ten_KhongDau;?>" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--violet"><?=$t->Ten?></a>
                      </div>

                      <div class="entry__body card__body">
                        <div class="entry__header">
                          
                          <h2 class="entry__title">
                            <a href="<?=URL::to("/tin/{$t->idTin}");?>"><?=$t->TieuDe?></a>
                          </h2>
                          <ul class="entry__meta">                            
                            <li class="entry__meta-date">
                              <?=date('d/m/Y',strtotime($t->Ngay))?>
                            </li>
                          </ul>
                        </div>
                        <div class="entry__excerpt">
                          <p><?=$t->TomTat?></p>
                        </div>
                      </div>
                    </article>
                  </div> 
                    <?php }?>
                  <?php }?>                
                </div>
              </div> <!-- end pane 1 -->

              <?php $arr = explode(",", $idLTs);?>
              <?php foreach ($arr as $idLT) {?>
              <div class="tabs__content-pane" id="tab-<?=$idLT?>">
                <div class="row card-row">
                  <?php 
                  $tinmn = DB::select("SELECT idTin,TieuDe,Ngay,TomTat, urlHinh, loaitin.Ten, Ten_KhongDau 
                  FROM tin,loaitin WHERE tin.idLT=loaitin.idLT and tin.idLT = $idLT AND tin.AnHien=1 and tin.lang=? 
                     ORDER BY idTin DESC LIMIT 0, 4",array($lang));
                  foreach ($tinmn as $t ) { 
                  ?>
                  <div class="col-md-6">
                    <article class="entry card">
                      <div class="entry__img-holder card__img-holder">
                        <a href="<?=URL::to("/tin/{$t->idTin}");?>">
                          <div class="thumb-container thumb-70">
                            <img data-src="<?=$t->urlHinh?>" onerror="this.src='img/defaultimg.jpg'" src="img/defaultimg.jpg" class="entry__img lazyload" alt="" />
                          </div>
                        </a>
                        <a href="<?=URL::to("/tin/{$t->idTin}");?>" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--orange"><?=$t->Ten?></a>
                      </div>

                      <div class="entry__body card__body">
                        <div class="entry__header">
                          
                          <h2 class="entry__title">
                            <a href="<?=URL::to("/tin/{$t->idTin}");?>"><?=$t->TieuDe?></a>
                          </h2>
                          <ul class="entry__meta">
                            <li class="entry__meta-date">
                              <?=date('d/m/Y',strtotime($t->Ngay))?>
                            </li>
                          </ul>
                        </div>
                        <div class="entry__excerpt">
                          <p><?=$t->TomTat?></p>
                        </div>
                      </div>
                    </article>
                  </div>
                  <?php }?>                
                </div>
              </div> <!-- end pane 2 -->
              <?php } //foreach?>
            </div> <!-- end tab content -->            
          </section>