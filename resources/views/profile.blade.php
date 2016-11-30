@extends('layouts.main_layout')


@section('content')

<div class="container-fluid" id="profile">
            <div class="container">
                <div class="row content">
                    <div class=" col-md-9">
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
                                         <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true" style="float: right;"></i>
                                  </a>
                                  <a href="/basket">
                                         <i class="fa fa-shopping-cart fa-2x" aria-hidden="true" style="float: right; "></i>
                                  </a>
                                @endif
                                </h2>
                                <br>    

                                <div class="text-left">
                                    @if(Auth::user()->type || Auth::user()->type  == 2 && Auth::user()->id == $user->id)
                                    <a type="button" class="btn btn-success btn-lg" href="/create_product/{{ Auth::user()->id }}">Create Product</a>
                                    <a type="button" class="btn btn-success btn-lg" href="/request">Request</a>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <!--penting part-->
                        <h2 class="text-center text-capitalize">
                        Əldə olan mallar
                        </h2>
                        @foreach($user->products as $user_product)
                            <div class="row penting">
                                <hr>
                                <div class="col-md-6">
                                        <ul class="media-list">
                                            <li class="media">
                                              <a class="media-left" href="#">
                                                 <img src="/uploads/{{ $user_product->image }}" alt="{{ $user_product->title }}">
                                             </a>
                                             <div class="media-body">
                                                 <h3 class="media-heading"><a href="/product_single/{{ $user_product->id }}">
                                                 {{ $user_product->title }}</a></h3>
                                                 <br>
                                             <i class="fa fa-bookmark" aria-hidden="true"></i> 
                                             {{-- {{ $user_product->product_category->title }} --}}
                                            </li>

                                    </ul>
                                </div>

                                <!--pending payment right part-->
                                <div class="col-md-6">
                                    <table class="table" style="border-top-style:hidden;">
                                        <tbody>
                                            <tr>
                                                <td class="pull-right" style="border-top-style:hidden;">

                                                    Price for one {{  $user_product->constant->title }}
                                                </td>
                                                <td>
                                                    :
                                                </td>
                                                <td> {{  $user_product->price }} AZN</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>


                        </div>
                    @endforeach
                    <hr>
                    <!--seed part-->
                        <div class="row seed text-center">                    
                                <h2 class="text-center text-capitalize">
                                Alqı-satqılarım
                                </h2>
                                <hr>
                                
                                <div class="col-md-12 col-xs-12 text-uppercase text-left" id="left">
                                    @foreach($baskets as $basket)
                                        @if($basket->id == Auth::user()->id)                
                                            <h4>{{ $basket->user->name }} adli usere verdiyiniz sifaris qebul olmadi</h4>
                                        @endif
                                    @endforeach
                                </div>
                       
                        
                        </div>
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
