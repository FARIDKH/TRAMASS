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
                        <form method="POST" action="/profile/{{$product->id}}"  enctype="multipart/form-data">
                          {{method_field('PATCH')}}
                          {{ csrf_field() }}
                        </div>
                    </div>

                    <!--start another info inputs-->
                    <div class="col-md-12">


                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" value="{{ $product->title }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea type="text" name="description" class="form-control" id="description"  >{{$product->description}}</textarea>
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
                            <button type="submit" name="change_profile"
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
	      $('.photo').mouseenter(function(){
            $('.caption').fadeIn();
        })
        $('.photo').mouseleave(function(){
            $('.caption').fadeOut();
        })

        $("#click_trigger").click(function() {
            $("#click_submit").click();
        });
</script>

@endsection
