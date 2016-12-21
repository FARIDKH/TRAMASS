@extends('layouts.main_layout')


@section('content')

<div class="container-fluid change_pro">

            <div class="container">

            <!--title-->
              {{-- @foreach($user->products as $user_product) --}}
                <div class="row title">
                    <div class="col-md-12">

                        <h2 class="text-capitalize">Edit {{$product->title}}</h2>
                            <hr>
                    </div>


                </div>
                <!-- end title-->

                <!--start man info part-->
                <div class="row content">
                    <div class="col-md-3">
                        <div class="card">

                        <!--start all post part-->
                        <form method="POST" action="/profile/{{$user->id}}/product/{{$product->id}}/edit"  enctype="multipart/form-data">
                          <meta name="csrf_token" content="{{ csrf_token() }}" />

                          {{ csrf_field() }}
                          <div class="card-block"> Picture </div>
                          <br>
                          <div class="photo">
                              <img class="card-img-bottom img-responsive" src="/img/dummy.png" alt="Card image cap" id="list">
                              <div class="text-center caption">


                                  <i id="click_trigger" class="fa fa-camera fa-2x btn btn-default btn-file" aria-hidden="true">

                                  </i>
                                  <input  id="click_submit" type="file" name="image" class="image" value="select" style="display:none;" onchange="readURL(this)">


                                  <h3 class="text-center text-capitalize">change picture</h3>

                              </div>


                          </div>
                        </div>
                    </div>

                    <!--start another info inputs-->
                    <div class="col-md-9">

                      {{-- <input type="text" name="id" value="{{ $product->id }}"> --}}

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" value="{{ $product->title }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea type="text" name="description" class="form-control" id="description"  >{{$product->description}}</textarea>
                            </div>
                            <div class="form-group col-md-3">
                              <label for="">Category</label>
                                <select class="form-control" id="sayam" name="product_category_id" >
                                    @foreach($categories as $category)
                                      <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group col-md-3">
                              <label for="">Constant</label>
                                <select class="form-control" name="constant_id" >
                                    @foreach($constants as $constant)
                                      <option value="{{ $constant->id }}">{{ $constant->title }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group col-md-3">
                                <label for="price">Count</label>
                                <select class="form-control" name="count" >
                                    @for($i=0;$i<500;$i++)
                                      <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="price">Price for one in AZN</label>
                                <input type="number" class="form-control" name="price" id="price" value="{{$product->price}}" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date_limit">Date Limit</label>
                                <input type="date" name="date_limit" value="{{ Carbon\Carbon::now() }}">
                            </div>
                            <button type="submit" id="update_product" name="update_product"
                            class="btn btn-warning btn-lg text-capitalize pull-right">Update Product</button>
                        </form>

				<!--end -->


                    </div>


                </div>
              {{-- @endforeach --}}
            </div>
        </div>


@endsection


@section('script')
<script>

          if (window.FileReader) {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#list')
                            .attr('src', e.target.result)
                            .width(240)
                            .height(255);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
          }
           else {
            alert('This browser does not support FileReader');
          }

          //ajax update product
            var _token = $('input[name=_token]')
            var description = $("#description")
            var title = $("#title")
            var product_category_id = $("#sayam")
            var constant_id = $("#constant_id")
            var count = $("#count")
            var price = $("#price")
            var date_limit = $("#date_limit")
            var auth_id = $("#auth_id")
            var image= $('.image')
            var form = $('#form')

	      $('.photo').mouseenter(function(){
            $('.caption').fadeIn();
        })
        $('.photo').mouseleave(function(){
            $('.caption').fadeOut();
        })

        $("#click_trigger").click(function() {
            $("#click_submit").click();
        });
        // $('#update_product').click(function(event){
        //     event.preventDefault();
        //     //formData.append('file',image.files[0])
        //     $.ajax({
        //         url:'/update/{product_id}',
        //         type:'POST',
        //         dataType:'JSON',
        //         data:{
        //             '_token': $('input[name=_token]').val(),
        //             'title':  $('input[name=title]').val(),
        //         },
        //         success:function(data)
        //         {
        //             alert("alindi");
        //         },
        //         error:function()
        //         {
        //             return 'nayirrrr olmaz';
        //         }
        //     })
        // })
</script>

@endsection
