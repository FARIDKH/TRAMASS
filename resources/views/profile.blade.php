@extends('layouts.main_layout')


@section('content')

<div class="container-fluid" id="profile">
            <div class="container">
                <div class="row content">
                    <div class=" col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="/img/dummy.png" alt="..." class="img-circle img-responsive">
                            </div>
                            <div class="col-md-9">
                                <!--info about man-->
                                <h2 class="text-uppercase"> {{ $user->name }} {{  $user->surname }}
                                @if($user->id == Auth::user()->id)


              <!--change-profile link-->

                                  <a href="/cnprofile/{{ $user->id }}">
                                         <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                  </a>
                                  @if(Auth::user()->type || Auth::user()->type  == 2 && Auth::user()->id == $user->id)
                                    <a class="fa fa-plus" href="/create_product/{{ Auth::user()->id }}"></a>
                                    <a class="fa fa-bell" href="/request"></a>
                                    @endif
                                @endif
                                </h2>
                                <br>    

                                

                            </div>
                        </div>
                        <!--penting part-->
                        @if(count($user->products))
                            <h2 class="text-center text-capitalize">Əldə olan mallar</h2>
                         @else 
                            <h2 class="text-center text-capitalize">Sizin əlinizdə mal yoxdur</h2>
                        @endif
                        @foreach($user->products as $user_product)
                            <div class="row penting">
                                <hr>
                                <div class="col-md-6">
                                        <ul class="media-list">
                                            <li class="media">
                                              <a class="media-left" href="/product_single/{{ $user_product->id }}">
                                                 <img src="/uploads/{{ $user_product->image }}" alt="{{ $user_product->title }}">
                                             </a>
                                             <div class="media-body">
                                                 <h3 class="media-heading"><a href="/product_single/{{ $user_product->id }}">
                                                 {{ $user_product->title }}</a></h3>
                                                 <br>
                                            </li>

                                    </ul>
                                </div>

                                <!--pending payment right part-->
                                <div class="col-md-6">                                    
                                    <span>Price for one {{  $user_product->constant->title }} : {{  $user_product->price }} AZN</span>
                                </div>


                        </div>
                    @endforeach
                    <hr>
                    <!--seed part-->
                        
                    </div>
                </div>




                </div>
            </div>
        </div>
    </div>


@endsection


@section('script')

<script>

 $(document).ready(function(){

    $("#left").click(function(){
        $(".line").animate({
        "left":"0%"
    },500);
       /* .css("border-bottom","2px solid #417630");
         $("#right").css("border-bottom","");*/
    $(".seed")
    $(".rightInfo")
    .hide();
    $(".leftInfo")
    .show();



  })

    $("#right").click(function(){
        $(".line").animate({
        "left":"50%"
    },500);
         /*$(this)
        .css("border-bottom","2px solid gray");
        $("#left").css("border-bottom","#417630");*/
        $(".seed")
         $(".leftInfo").hide();
         $(".rightInfo").show();

    })
});
</script>
@endsection
