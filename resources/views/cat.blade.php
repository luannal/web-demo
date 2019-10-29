<style>
h2.entry__title {height:45px}
div.entry__excerpt p {font-size:17px; text-align:justify; }
div.entry__excerpt {height:110px; overflow:hidden; }
</style>

<div class="col-lg-12 blog__content mb-72">
          <h1 class="page-title"><?=$TenLT?></h1>

          <div class="row card-row">
            <?php foreach ($listtin as $row) { ?>
            <div class="col-md-6">
              <article class="entry card">
                <div class="entry__img-holder card__img-holder">
                  <a href="<?=URL::to("/tin/{$row->idTin}");?>">
                    <div class="thumb-container thumb-70">
                      <img data-src="<?=$row->urlHinh?>" onerror="this.src='img/defaultimg.jpg'"  src="img/defaultimg.jpg" class="entry__img lazyload" alt="" />
                    </div>
                  </a>
                  <a href="<?=URL::to("/tin/{$row->idTin}");?>" class="entry__meta-category entry__meta-category--label entry__meta-category--align-in-corner entry__meta-category--violet"><?=$TenLT?></a>
                </div>

                <div class="entry__body card__body">
                  <div class="entry__header">
                    
                    <h2 class="entry__title">
                      <a href="<?=URL::to("/tin/{$row->idTin}");?>"><?=$row->TieuDe?></a>
                    </h2>
                    <ul class="entry__meta">
                      <li class="entry__meta-date">
                      <?=date('d/m/Y',strtotime($row->Ngay))?>
                      </li>
                    </ul>
                  </div>
                  <div class="entry__excerpt">
                    <p><?=$row->TomTat?></p>
                  </div>
                </div>
              </article>
            </div>
            <?php } ?>
          </div>

          <!-- Pagination -->
          <?php echo $listtin->links(); ?>
        </div> 