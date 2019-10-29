<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('title')</title>
  <base href="<?=URL::to('/');?>/"/>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="">

  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,600,700%7CSource+Sans+Pro:400,600,700' rel='stylesheet'>

  <!-- Css -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/font-icons.css" />
  <link rel="stylesheet" href="css/style.css" />

  <!-- Favicons -->
  <link rel="shortcut icon" href="img/favicon.ico">
  <!-- <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png"> -->

  <!-- Lazyload (must be placed in head in order to work) -->
  <script src="js/lazysizes.min.js"></script>

</head>

<body class="bg-light style-default style-rounded">

  <!-- Preloader -->
  <div class="loader-mask">
    <div class="loader">
      <div></div>
    </div>
  </div>

  <!-- Bg Overlay -->
  <div class="content-overlay"></div>

  <!-- Sidenav -->    
  <header class="sidenav" id="sidenav">

    <!-- close -->
    <div class="sidenav__close">
      <button class="sidenav__close-button" id="sidenav__close-button" aria-label="close sidenav">
        <i class="ui-close sidenav__close-icon"></i>
      </button>
    </div>
    
    <!-- Nav -->
    <nav class="sidenav__menu-container">
      <?= View::make('sidemenu',['lang'=>$lang]) ?>
    </nav>

    <div class="socials sidenav__socials"> 
      <a class="social social-facebook" href="#" target="_blank" aria-label="facebook">
        <i class="ui-facebook"></i>
      </a>
      <a class="social social-twitter" href="#" target="_blank" aria-label="twitter">
        <i class="ui-twitter"></i>
      </a>
      <a class="social social-google-plus" href="#" target="_blank" aria-label="google">
        <i class="ui-google"></i>
      </a>
      <a class="social social-youtube" href="#" target="_blank" aria-label="youtube">
        <i class="ui-youtube"></i>
      </a>
      <a class="social social-instagram" href="#" target="_blank" aria-label="instagram">
        <i class="ui-instagram"></i>
      </a>
    </div>
  </header> <!-- end sidenav -->

  <main class="main oh" id="main">

    <!-- Top Bar -->
    <div class="top-bar">
      <div class="container">
        <div class="row">

          <!-- Top menu -->
          <div class="col-sm-6">
            <ul class="top-menu">
              <li><a href="{!! route('change-lang', ['en']) !!}">English</a></li>
              <li><a href="{!! route('change-lang', ['vi']) !!}">Vietnam</a></li>              
            </ul>
          </div>
          
          <!-- Socials -->
          <div class="col-sm-6">
            <div class="socials nav__socials socials--nobase socials--white justify-content-end"> 
              <a class="social social-facebook" href="#" target="_blank" aria-label="facebook">
                <i class="ui-facebook"></i>
              </a>
              <a class="social social-twitter" href="#" target="_blank" aria-label="twitter">
                <i class="ui-twitter"></i>
              </a>
              <a class="social social-google-plus" href="#" target="_blank" aria-label="google">
                <i class="ui-google"></i>
              </a>
              <a class="social social-youtube" href="#" target="_blank" aria-label="youtube">
                <i class="ui-youtube"></i>
              </a>
              <a class="social social-instagram" href="#" target="_blank" aria-label="instagram">
                <i class="ui-instagram"></i>
              </a>
            </div>
          </div>

        </div>
      </div>
    </div> <!-- end top bar -->        

    <!-- Navigation -->
    <header class="nav">

      <div class="nav__holder nav--sticky">
        <div class="container relative">
          <div class="flex-parent">

            <!-- Side Menu Button -->
            <button class="nav-icon-toggle" id="nav-icon-toggle" aria-label="Open side menu">
              <span class="nav-icon-toggle__box">
                <span class="nav-icon-toggle__inner"></span>
              </span>
            </button> 

            <!-- Logo -->
            <!--<a href="index.html" class="logo">
              <img class="logo__img" src="img/logo_default.png" srcset="img/logo_default.png 1x, img/logo_default@2x.png 2x" alt="logo">
            </a> -->

            <!-- Nav-wrap -->
            <nav class="flex-child nav__wrap d-none d-lg-block">              
                <?=View::make('menu',['lang'=>$lang]);?>
                <!-- end menu -->
            </nav> <!-- end nav-wrap -->

            <!-- Nav Right -->
            <div class="nav__right">

              <!-- Search -->
            <?=View::make('formsearch',['lang'=>$lang]);?>               

            </div> <!-- end nav right -->            
        
          </div> <!-- end flex-parent -->
        </div> <!-- end container -->

      </div>
    </header> <!-- end navigation -->
  

    <!-- Trending Now -->
    <div class="container">
        <?=View::make('tinmoinhan',['lang'=>$lang]);?>
    </div>

    <!-- Featured Posts Grid -->   
    @yield('tinnoibat')   
     <!-- end featured posts grid -->

    <div class="main-container container pt-24" id="main-container">         

      <!-- Content -->
      <div class="row">

        <!-- Posts -->
        <div class="col-lg-8 blog__content">
          
          <!-- Latest News -->
          @yield('content')
           <!-- end latest news -->
        </div> <!-- end posts -->

        <!-- Sidebar -->
        <aside class="col-lg-4 sidebar sidebar--right">

          <!-- Widget Popular Posts -->
          @yield('sidebar')
          <!-- end widget popular posts -->

          <!-- Widget Newsletter -->
          <!-- end widget newsletter -->

          <!-- Widget Socials -->
          <!-- end widget socials -->

        </aside> <!-- end sidebar -->
  
      </div> <!-- end content -->

      <!-- Ad Banner 728 -->
      <!--<div class="text-center pb-48">
        <a href="#">
          <img src="img/content/placeholder_728.jpg" alt="">
        </a>
      </div> -->

      <!-- Carousel posts -->
      @yield('carousel')
      <!-- end carousel posts -->


      <!-- Posts from categories -->
      @yield('2columns')
      <!-- end posts from categories -->

      <!-- Video posts -->
      <!-- end video posts -->
      

      <!-- Content Secondary -->

      <!-- content secondary -->      
      

    </div> <!-- end main container -->

    <!-- Footer -->
    <?= View::make('footer',['lang'=>$lang]); ?>
    <!-- end footer -->

    <div id="back-to-top">
      <a href="#top" aria-label="Go to top"><i class="ui-arrow-up"></i></a>
    </div>

  </main> <!-- end main-wrapper -->

  
  <!-- jQuery Scripts -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/easing.min.js"></script>
  <script src="js/owl-carousel.min.js"></script>
  <script src="js/flickity.pkgd.min.js"></script>
  <script src="js/twitterFetcher_min.js"></script>
  <script src="js/jquery.newsTicker.min.js"></script>  
  <script src="js/modernizr.min.js"></script>
  <script src="js/scripts.js"></script>

</body>
</html>