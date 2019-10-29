<?php 
if ($lang=="vi") {
  $kq = DB::select("SELECT giatri FROM cauhinh WHERE id=3");
} elseif ($lang=="en") {
  $kq = DB::select("SELECT giatri FROM cauhinh WHERE id=5");
}
$idLTs = $kq[0]->giatri;
$kq = DB::select("SELECT idLT, Ten as TenLT FROM loaitin WHERE idLT in ($idLTs)");
?>

<section class="section mb-0">
        <div class="row">
          
          <?php foreach ($kq as $lt ) {?>
          <!-- Technology -->
          <div class="col-md-6">
            <div class="title-wrap title-wrap--line">
              <h3 class="section-title"><?=$lt->TenLT?></h3>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <?php     
                $tm = DB::select("SELECT idTin,TieuDe,Ngay,TomTat, urlHinh 
                FROM tin WHERE idLT={$lt->idLT} AND AnHien=1 ORDER BY idTin DESC LIMIT 0, 1");
                $row = $tm[0];
                ?>
                <article class="entry thumb thumb--size-2">
                  <div class="entry__img-holder thumb__img-holder" style="background-image: url('<?=$row->urlHinh?>');" src="img/defaultimg.jpg">
                    
                    <div class="bottom-gradient"></div>
                    <div class="thumb-text-holder thumb-text-holder--1">
                      
                      <h2 class="thumb-entry-title">
                        <a href="<?=URL::to("/tin/{$row->idTin}");?>"><?=$row->TieuDe?></a>
                      </h2>
                      <ul class="entry__meta">                       
                        <li class="entry__meta-date">
                          <?=date('d/m/Y',strtotime($row->Ngay))?>
                        </li>
                      </ul>
                    </div>
                    <a href="<?=URL::to("/tin/{$row->idTin}");?>" class="thumb-url"></a>
                  </div>
                </article>
              </div>
              <div class="col-lg-6">
                <ul class="post-list-small post-list-small--dividers post-list-small--arrows mb-24">
                  <?php 
                  $tin4 = DB::select("SELECT idTin,TieuDe FROM tin 
                  WHERE idLT = {$lt->idLT} AND AnHien=1 ORDER BY idTin DESC LIMIT 1,4");
                  ?>
                  <?php foreach ($tin4 as $row) { ?>
                  <li class="post-list-small__item">
                    <article class="post-list-small__entry">
                      <div class="post-list-small__body">
                        <h3 class="post-list-small__entry-title">
                          <a href="<?=URL::to("/tin/{$row->idTin}");?>"><?=$row->TieuDe?></a>
                        </h3>
                      </div>                  
                    </article>
                  </li>
                  <?php }?>
                </ul>
              </div>
            </div>            
          </div> <!-- end technology -->
          <?php }?>
        </div>                
      </section>