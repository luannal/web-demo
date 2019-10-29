<?php
$kq=DB::select("SELECT Ten FROM loaitin WHERE idLT=$idLT");
$TenLT=$kq[0]->Ten;
$idTin=$ctTin->idTin;
?>
<div class="content-box">           

            <!-- standard post -->
            <article class="entry mb-0">
              
              <div class="single-post__entry-header entry__header">
                <a href="categories.html" class="entry__meta-category entry__meta-category--label entry__meta-category--green"><?=$TenLT?></a>
                <h1 class="single-post__entry-title">
                  <?=$ctTin->TieuDe?>
                </h1>

                <div class="entry__meta-holder">
                  <ul class="entry__meta">
                    <li class="entry__meta-date">
                      <?=date('d/m/Y',strtotime($ctTin->Ngay))?>
                    </li>
                  </ul>           
                </div>
              </div> <!-- end entry header -->

              <div class="entry__img-holder">
                <img src="<?=$ctTin->urlHinh?>" onerror="this.src='img/defaultimg.jpg'" alt="" class="entry__img">
              </div>

              <div class="entry__article-wrap">

                <!-- Share -->
                <div class="entry__share">
                  <div class="sticky-col">
                    <div class="socials socials--rounded socials--large">
                      <a class="social social-facebook" href="#" title="facebook" target="_blank" aria-label="facebook">
                        <i class="ui-facebook"></i>
                      </a>
                      <a class="social social-twitter" href="#" title="twitter" target="_blank" aria-label="twitter">
                        <i class="ui-twitter"></i>
                      </a>
                      <a class="social social-google-plus" href="#" title="google" target="_blank" aria-label="google">
                        <i class="ui-google"></i>
                      </a>
                      <a class="social social-pinterest" href="#" title="pinterest" target="_blank" aria-label="pinterest">
                        <i class="ui-pinterest"></i>
                      </a>
                    </div>
                  </div>                  
                </div> <!-- share -->

                <div class="entry__article">
                  
                  <!-- Final Review -->
                  <?=$ctTin->Content?>
                  <!-- end final review -->

                  <!-- tags -->
                  <div class="entry__tags">
                    <i class="ui-tags"></i>
                    <span class="entry__tags-label">Tags:</span>
                    <a href="#" rel="tag"><?=$ctTin->tags?></a>
                  </div> <!-- end tags -->

                </div> <!-- end entry article -->
              </div> <!-- end entry article wrap -->
              

              <!-- Newsletter Wide -->
              <!-- end newsletter wide -->

              <!-- Prev / Next Post -->              

              <!-- Author -->                            

              <!-- Related Posts -->
              <section class="section related-posts mt-40 mb-0">
                <div class="title-wrap title-wrap--line title-wrap--pr">
                  <h3 class="section-title">Tin Liên Quan</h3>
                </div>

                <?php 
                $relates=DB::select("SELECT * FROM tin WHERE idLT=$idLT AND idTin!=$idTin ORDER BY idTin Desc LIMIT 4");
                ?>
                <!-- Slider -->                
                <div id="owl-posts-3-items" class="owl-carousel owl-theme owl-carousel--arrows-outside">
                  <?php foreach ($relates as $relate) { ?>
                  <article class="entry thumb thumb--size-1">
                    <div class="entry__img-holder thumb__img-holder" style="background-image: url('<?= $relate->urlHinh ?>');">
                      <div class="bottom-gradient"></div>
                      <div class="thumb-text-holder">   
                        <h2 class="thumb-entry-title">
                          <a href="<?=URL::to("/tin/{$relate->idTin}");?>"><?= $relate->TieuDe ?></a>
                        </h2>
                      </div>
                      <a href="<?=URL::to("/tin/{$relate->idTin}");?>" class="thumb-url"></a>
                    </div>
                  </article>
                <?php }?>
                </div> <!-- end slider -->

              </section> <!-- end related posts -->            

            </article> <!-- end standard post -->

            <!-- Comments -->
            <div class="entry-comments">
              <div class="title-wrap title-wrap--line">
                <h3 class="section-title">{{ trans('mes.comment') }}</h3>
              </div>
              <ul class="comment-list">
                
                <?php 
                $comments=DB::select("SELECT * FROM ykien WHERE idTin=$idTin ");
                ?>
                <?php foreach ($comments as $comment) { ?>
                <li>
                  <div class="comment-body">                   
                    <div class="comment-text">
                      <h6 class="comment-author"><?= $comment->HoTen ?></h6>
                      <div class="comment-metadata">
                        <a href="#" class="comment-date"><?= date('d/m/Y',strtotime($comment->Ngay)) ?></a>  
                      </div>                      
                      <p><?= $comment->NoiDung ?></p>             
                    </div>
                  </div>
                </li> <!-- end 3 comment -->
                <?php }?>
              </ul>         
            </div> <!-- end comments -->

            <!-- Comment Form -->
            <div id="respond" class="comment-respond">
              <form id="form" class="comment-form" method="post" action="comment/{{ $idTin }}">
                {{ csrf_field()}}
                <p class="comment-form-comment">
                  <label for="noidung">{{ trans('mes.mess') }}</label>
                  <textarea id="noidung" name="noidung" rows="5" required="required"></textarea>
                </p>

                <div class="row row-20">
                  <div class="col-lg-6">
                    <label for="name">{{ trans('mes.name') }} *</label>
                    <input name="name" id="name" type="text" required="required">
                  </div>
                  <div class="col-lg-6">
                    <label for="email">Email: *</label>
                    <input name="email" id="email" type="email" required="required">
                  </div>
                </div>

                <p class="comment-form-submit">
                  <input type="submit" class="btn btn-lg btn-color btn-button" value="{{ trans('mes.submit') }}" id="submit-message">
                </p>
                
              </form>
            </div> <!-- end comment form -->
</div> 