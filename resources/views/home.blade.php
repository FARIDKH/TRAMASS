@extends('layouts.main_layout')


@section('header')

<div class="row header_heading">
                           <h1>MƏHSULLARINIZI ONLİNE BAZARDA SATMAQ İSTƏYİRSİNİZ?</h1>
                           <div class="hidden-sm hidden-xs divider"></div>
                       </div>
                       <div class="row">
                           <h3>TRAMASS İLƏ MALLARINIZI DÜNYA VƏ ÖLKƏ BAZARINDAKI ALICILARA ÇATDIRIN</h3>
                       </div>
                       <div class="row button_part_header">
                           <button class="btn defaultButton">DAHA ÇOX
                               <div></div>
                           </button>
                           @if(Auth::guest())
                           <a class="btn successButton" href="/register">QEYDİYYATDAN KEÇ
                           </a>

                            @else

                            <a class="btn successButton" href="/profile/{{ Auth::user()->id }}">PROFILE
                            </a>

                            @endif
                      </div>
                  <div class="row">
                      <div id="header_carousel" class="slide_carousel carousel slide" data-ride="carousel">

                              <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                  <img src="img/header/page-1_slide01.jpg" alt="">
                                </div>

                                <div class="item">
                                  <img src="img/header/page-1_slide02.jpg" alt="">
                                </div>

                                <div class="item">
                                  <img src="img/header/page-1_slide03.jpg" alt="">
                                </div>
                            </div>
                      </div>
                  </div>

@endsection


@section('content')

        <!-- welcome start -->

        <section id="welcome">
            <div class="container first_container">
              <div class="row col-lg-12  col-md-12  col-sm-12">
                <p class="starting_prgph"> İmkanlarımızın inkişafı davam edir. Hər gün minlərlə insan bizə inanıb məhsullarının alqı-satısını bizimlə gerçəkləşdirir.</p>
                <div class="line"> </div>
              </div>
                   <h1 class="col-md-4 col-sm-6 col-xs-6">XOŞ GƏLMİSİNİZ</h1>
            </div>
               <div class="row">
                 <div class="col-lg-6 col-md-12 col-xs-12 first_img">
                   <img src="img/page-1_img01.jpg" alt="" />
                   <div class=" col-lg-12 col-md-12 col-sm-12  first_prgph">
                     <p>
                       Minlərlə satıcı öz malını müvafiq qiymətə satmaq istəsə belə , plansız şəkildə istehsal proseslərinə başladığı üçün nəticə gözlənildiyi kimi olmur. TRAMASS - ın yaradılış səbəbi istehsalçı və istehlakçı arasında online əlaqə qurmaq və onların bazar fəaliyyətinin keyfiyyətini maksimum dərəcəyə çıxarmaqdır.
                     </p>
                   </div>
                 </div>
                 <div class="col-lg-6 col-md-12 col-md-12 second_img">
                   <img src="img/page-1_img02.jpg" alt="" />
                   <div class=" col-lg-12 col-md-12  col-sm-12 second_prgph">
                     <p>
                       Minlərlə satıcı öz malını müvafiq qiymətə satmaq istəsə belə , plansız şəkildə istehsal proseslərinə başladığı üçün nəticə gözlənildiyi kimi olmur. TRAMASS - ın yaradılış səbəbi istehsalçı və istehlakçı arasında online əlaqə qurmaq və onların bazar fəaliyyətinin keyfiyyətini maksimum dərəcəyə çıxarmaqdır.
                     </p>
                   </div>
                 </div>
                 <div class="row">
                   <button>OXU</button>
                 </div>
                </div>

        </section>
        <!-- welcome ending -->

        <!-- services start-->

        <section id="services">
            <div class="container">
                <div class="col-md-8 col-sm-12 col-xs-12  header_service">
                    <div class="row">
                        <h1>Əsas xidmətimiz - ticarət zamanı yaşanan problemləri aradan qaldırmaq</h1>
                        <div class="divider"></div>
                    </div>
                </div>
                <div class="service_part">
                    <div class="col-md-6 col-sm-12 col-xs-12 left_service">
                        <div class="row">
                            <h1>XİDMƏTLƏRİMİZ</h1>
                        </div>
                        <div class="row">
                            <p>
                              TRAMASS-ın ekspert qrupu kənd təsərrüfatının zənciri vasitəsilə məhsulların araşdırılması , test olunması və risk menecment servislərini təklif edir. Biz öz aqronomik biliklərimizə əsaslanaraq sizə ən yaxşı məsləhətləri <br> təklif edirik. 
                            </p>                            
                        </div>
                        <div class="row">
                            <button class="btn">
                              
                               OXU

                            </button>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 right_service">
                        <ul>
                            <li>Məhsulların Daşınması</li>
                            <li>Məhsul Yardımları</li>
                            <li>Məhsulların və istehsalçıların dəyərləndirilməsi</li>
                            <li>Məhsulların dünya və ölkə bazarındakı statistikaları</li>
                            <li>İstehsalçı və istehlakçının bir araya gətirilməsi</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- services ending-->

        <!-- sep1 start-->
        <section id="sep1">
           <div class="row">
                <div class="col-md-3 col-sm-6  sep_fruit_1">
                   <div class="fruit_slide_effect_01"></div>
                   <div class="content_sep_fruit_01">
                        <h1>QARĞIDALI</h1>
                        <div class="divider"></div>
                   </div>
                </div>
                <div class="col-md-3 col-sm-6 sep_fruit_2">
                  <div class="fruit_slide_effect_02"></div>
                   <div class="content_sep_fruit_02">
                        <h1>XİYAR</h1>
                        <div class="divider"></div>
                   </div>

                </div>
                <div class="col-md-3 col-sm-6 sep_fruit_3">
                    <div class="fruit_slide_effect_03"></div>
                    <div class="content_sep_fruit_03">
                        <h1>POMİDOR</h1>
                        <div class="divider"></div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 sep_fruit_4">
                    <div class="fruit_slide_effect_04"></div>
                    <div class="content_sep_fruit_04">
                        <h1>LOBYA</h1>
                        <div class="divider"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- sep1 ending-->

        <section id="coreValues">
            <div class="container">
                <div class="col-md-8 col-sm-12 col-xs-12  header_core">
                    <div class="row">
                        <h1>Bizim məqsədimiz sizə doğru təkliflər verərək ticarət zamanı  yüksək səviyyədə rahatlıq yaratmaqdır</h1>
                        <div class="divider"></div>
                    </div>
                </div>
                <div class="content_core">
                    <div class="col-md-6 col-sm-12 col-xs-12 left_core">
                        <div class="row">
                            <h1>ƏSAS DƏYƏRLƏR</h1>
                        </div>
                        <div class="row">
                            <p>Daimi dəyişikliklərə məruz qalan kənd təsərrüfatı iqtisadiyyatında , əsas dəyərlərimiz sabit qalır. Əsas dəyərlərimiz işimiz, bir-birimiz ilə necə ünsiyyət qurduğumuz və məqsədimizi gerçəkləşdirmək üçün hansı strategiyaları istifadə etməyimizdir.</p>
                        </div>
                        <div class="row">
                            <button class="btn">OXU</button>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 right_core">
                        <img src="img/services/page-1_img08.jpg" alt="">
                    </div>
                </div>
            </div>
        </section>


        <section id="gallery_header">

            <h1>GALLERY</h1>
            <div class="divider"></div>
        </section>

        <section id="gallery">

            <div class="grid">
              <div class="grid-item">
                  <img src="img/gallery/page-1_img09_original.jpg" alt="">
                  <i class="fa fa-plus fa-3x"></i>
              </div>
              <div class="grid-item grid-item--width2">
                  <img src="img/gallery/page-1_img10_original.jpg" alt="">
                  <i class="fa fa-plus fa-3x"></i>
              </div>
              <div class="grid-item">
                  <img src="img/gallery/page-1_img11_original.jpg" alt="">
                  <i class="fa fa-plus fa-3x"></i>
              </div>
              <div class="grid-item grid-item--width2">
                  <img src="img/gallery/page-1_img12_original.jpg" alt="">
                  <i class="fa fa-plus fa-3x"></i>
              </div>
              <div class="grid-item">
                  <img src="img/gallery/page-1_img14_original.jpg" alt="">
                  <i class="fa fa-plus fa-3x"></i>
              </div>
              <div class="grid-item">
                  <img src="img/gallery/page-1_img16_original.jpg" alt="">
                  <i class="fa fa-plus fa-3x"></i>
              </div>
              <div class="grid-item grid-item--width2">
                  <img src="img/gallery/page-1_img13_original.jpg" alt="">
                  <i class="fa fa-plus fa-3x"></i>
              </div>
              <div class="grid-item grid-item--width2">
                  <img src="img/gallery/page-1_img15_original.jpg" alt="">
                  <i class="fa fa-plus fa-3x"></i>
              </div>


            </div>

        </section>


       <section id="gallery_header">

            <button class="btn defaultButton">
                VIEW ALL
            </button>

        </section>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/vendor/jquery-1.11.2.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>




        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/vendor/jquery-1.11.2.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <script src="https://unpkg.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>
               <script>
        $('.grid').masonry({
        // options
        itemSelector: '.grid-item',
//        fitWidth: true
        });
        </script>
        <script>






//        var windowWidth = $(window).width();
//        function masonryLayout() {
//            var blocks = document.querySelector("#gallery .row div")
//            var cols = 4, newleft, newtop;
//            for(var i = 1; i < blocks.length; i++){
//                if (i % cols == 0) {
//                    newtop = (blocks[i-cols].offsetTop + blocks[i-cols].offsetHeight);
//                    blocks[i].style.top = newtop+"px";
//                } else {
//                    if(blocks[i-cols]){
//                        newleft = (blocks[i-cols].offsetTop + blocks[i-cols].offsetHeight);
//                        blocks[i].style.top = newleft+"px";
//                    }
//                    newleft = (blocks[i-1].offsetLeft + blocks[i-1].offsetWidth);
//                    blocks[i].style.left = newleft+"px";
//                }
//            }
//        }
//        window.addEventListener("load", masonryLayout, false);
//        window.addEventListener("resize", masonryLayout, false);
//




       function fruitSlide(hoverContent,slideeffect){
           $(hoverContent).mouseenter(function(){
               $(slideeffect).slideDown('300', function() {
                   $(this).fadeIn();
               });
           })

           $(hoverContent).mouseleave(function(){
               $(slideeffect).slideUp('300', function() {
                   $(this).fadeOut();
               });
           })
       }

       fruitSlide('.sep_fruit_1','.fruit_slide_effect_01')
       fruitSlide('.sep_fruit_2','.fruit_slide_effect_02')
       fruitSlide('.sep_fruit_3','.fruit_slide_effect_03')
       fruitSlide('.sep_fruit_4','.fruit_slide_effect_04')
        console.log('.....no...error..:)')
        </script>
    </body>


@endsection
