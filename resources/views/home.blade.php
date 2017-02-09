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

        

        
        <!-- services start-->

        <section id="services">
            <div class="container service_container">
                <div class="col-md-8 col-sm-12 col-xs-12  header_service">
                    <div class="row">
                        <h1>XİDMƏTLƏRİMİZ</h1>
                        <div class="divider"></div>
                    </div>
                </div>
                <div class="service_part">
                    <div class="col-md-6 col-sm-12 col-xs-12 left_service">
                        <div class="service_detailed_info service_info_1_detailed">
                          <h1>Məhsulların Daşınması</h1>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic voluptates iure aspernatur, voluptatibus aut, eos praesentium suscipit, illum ipsa porro officia odit ad aperiam error autem rem optio adipisci minus.</p>
                        </div>
                        <div class="service_detailed_info service_info_2_detailed">
                          <h1>Məhsul Yardımları</h1>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam alias consequatur unde qui officiis, voluptatibus quisquam necessitatibus autem esse exercitationem, dolore, iure nulla magnam? Tenetur nam, optio ducimus quae dolorum?</p>
                        </div>
                        <div class="service_detailed_info service_info_3_detailed">
                          <h1>Məhsulların və istehsalçıların dəyərləndirilməsi</h1>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora unde sunt necessitatibus modi deserunt illo labore expedita tenetur vero dolore odit facilis recusandae, ratione est quidem, praesentium nihil perferendis fugit.</p>
                        </div>
                        <div class="service_detailed_info service_info_4_detailed">
                          <h1>Məhsulların dünya və ölkə bazarındakı statistikaları</h1>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque dicta officiis ratione reprehenderit voluptates facilis quas vitae alias iusto, molestiae eligendi saepe. Deleniti provident ipsa nihil voluptates et maxime odit?</p>
                        </div>
                        <div class="service_detailed_info service_info_5_detailed">
                          <h1>İstehsalçı və istehlakçının bir araya gətirilməsi</h1>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At repellendus, non ratione, totam voluptatibus mollitia nihil praesentium reiciendis reprehenderit suscipit iste harum accusamus, impedit facere laborum aspernatur rerum quaerat minus.</p>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 right_service">
                        <ul>
                            <li class="service_info_1">Məhsulların Daşınması</li>
                            <li class="service_info_2">Məhsul Yardımları</li>
                            <li class="service_info_3">Məhsulların və istehsalçıların dəyərləndirilməsi</li>
                            <li class="service_info_4">Məhsulların dünya və ölkə bazarındakı statistikaları</li>
                            <li class="service_info_5">İstehsalçı və istehlakçının bir araya gətirilməsi</li>
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
        <div class="container">
          {{-- <div id="myCarousel" class="carousel slide" data-ride="carousel">
           
              
              
             
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <p>sdsd</p>
                @if(count($products))      
                  <div class="item active">
                      <img src="/uploads/{{ $products[1]->image }}" alt="{{ $products[1]->title }}">
                      <div class="carousel-caption">
                        <h3>{{ $products[1]->title }}</h3>
                        <p>{{ $products[1]->price }} AZN / {{ $products[1]->constant->title }}</p>
                      </div>
                  </div>
                  @for($i=0;$i<count($products);$i++)
                    <div class="item">
                      <img src="/uploads/{{ $products[$i]->image }}" alt="{{ $products[$i]->title }}">
                      <div class="carousel-caption">
                        <h3>{{ $products[$i]->title }}</h3>
                        <p>{{ $products[$i]->price }} AZN / {{ $products[$i]->constant->title }}</p>
                      </div>
                    </div>

                  @endfor
                 @endif 
                  <!-- Left and right controls -->
                  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              
          </div> --}}
        </div>
        

  




        <script src="js/vendor/jquery-1.11.2.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        
        </script>
        <script>


        function service_info(listOrder){
          $(".service_detailed_info").css("display","none");
          $("."+listOrder).mouseenter(function(){
              $("."+listOrder+"_detailed").fadeIn()
          });
          $("."+listOrder).mouseleave(function(){
              $("."+listOrder+"_detailed").fadeOut()
              $(".service_info_1_detailed").fadeIn()              
          });
          $(this).stop()                   
        }

         for(i=0;i<6;i++){
            service_info('service_info_' + i);
         }

       
        $(".service_info_1_detailed").fadeIn()


        


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
