@extends('layouts.main_layout')


@section('content')


    <section id="new_product">
        <div class="row">
          <div class="col-md-6 leftPart">
            <div>
              @if(Session::has('product_name'))
              <img src="uploads/{{Session::get('product_image')}}" alt="">
                @else
                  <img src="" alt="">
              @endif

            </div>
          </div>
          <div class="col-md-6 rightPart">
            @if(Session::has('product_name'))
            <p><span class="new_product_name" >{{Session::get('product_name')}}</span> baskete elave olundu</p>
              @else
              <p><span class="new_product_name" ></span> baskete elave olundu</p>
            @endif
          </div>
        </div>
    </section>

    <section id="singleItem">
        <div class="container">
          <div class="row">
                  <div class="productDirections" >
                    <a href="/product_single/{{  $product->id - 1 }}" class="fa fa-angle-left "></a>
                    <a href="/product_single/{{  $product->id + 1 }}" class="fa fa-angle-right "></a>
                  </div>

              <div class="col-md-12 itemPage">
                    <div class="vertical-Images-list col-md-2">
                      <ul class="vertical-Images">
                        <li class="itemImages"><img src="/uploads/{{ $product->image }}" alt=""></li>
                        <li class="itemImages"><img src="/uploads/{{ $product->image }}" alt=""></li>
                        <li class="itemImages"><img src="/uploads/{{ $product->image }}" alt=""></li>
                      </ul>
                    </div>
                    <div class="mainImage col-md-6">
                          <img src="/uploads/{{ $product->image }}" alt="">
                    </div>
                    <div class="mainInfo col-md-4">
                        <form action="/addingBasket" method="post">
                            {{csrf_field()}}
                            <h1>{{ $product->title }}</h1>
                            <span>${{ $product->price }}</span>
                            <p>{{$product->description}}</p>
                            <span class="product_id hidden" >{{ $product->id }}</span>
                            @if(Auth::user()->type != 1)
                              @if($product->user->id != Auth::user()->id)
                                  <input type="number" class="count" name="count" value="1" min="1">
                                  <button type="submit" class="addCart" name="button" >add to cart</button>
                                  <button class="viewCart hidden" name="button" ><a href="/basket">view cart</a></button>
                              @endif
                              @else
                                  <span>Siz sadece satici statusuna maliksiniz</span>
                            @endif

                        </form>
                    </div>
              </div>
          </div>
        </div>
    </section>
    <section id="socialNetworkList">
        <div class="container-fluid">
            <div class="row socialNetwork">
                  <div class="socialIcons">
                    <a href="" class="fa fa-facebook fa-2x" aria-hidden="true"></a>
                    <a href="" class="fa fa-pinterest fa-2x" aria-hidden="true"></a>
                    <a href="" class="fa fa-twitter fa-2x" aria-hidden="true"></a>
                    <a href="" class="fa fa-instagram fa-2x" aria-hidden="true"></a>
                    <a href="" class="fa fa-youtube fa-2x" aria-hidden="true"></a>
                  </div>
            </div>
        </div>
    </section>
    <section id="relatedProducts">
        <div class="container-fluid">
            <div class="row">
                <div class="heading">
                  <h1>Related Products</h1>
                </div>
                <hr>
            </div>
        </div>
    </section>
@endsection

@section('script')

<script>
    var _token = $('input[name=_token]')

    $('.addCart').click(function(event){
      event.preventDefault();
      product = $(this).parent().parent().parent().parent();
      product_id = product.find($('.product_id'))
      $this = $(this);
      count = product.find($('.count'))
      $.ajax({
        url:'/addingBasket',
        method:'POST',
        dataType:'JSON',
        data:{
          _token:_token.val(),
          product_id:product_id.text(),
          count:count.val()
        },
        success:function(data)
        {
          console.log(data[1]);
          $('#new_product').fadeIn();
          img = product.find($('img'));
          $('#new_product .leftPart img').attr('src',img.attr('src'))
          $('.new_product_name').text(data[1].title)
          setTimeout(function(){
            $('#new_product').fadeOut();
          },5000)
          $this.addClass('hidden');
          $this.siblings('.viewCart').removeClass('hidden');
          addCartIsClicked = true;
          basket_count = parseInt($('.fa-cart-plus span').text())
          basket_count += 1;
          $('.fa-cart-plus span').text(basket_count)
        }
      })
    })
</script>

@stop
