@extends('layouts.main_layout')


@section('content')

<div class="container-fluid change_pro">

            <div class="container">

            <!--title-->
                <div class="row title">
                    <div class="col-md-12">

                        <h2 class="text-capitalize">Create Product</h2>
                            <hr>
                    </div>


                </div>
                <!-- end title-->

                <!--start man info part-->
                <div class="row content">
                    <div class="col-md-3">
                        <div class="card">

                        <!--start all post part-->
                        <form method="post" action="/create_product/{{Auth::user()->id}}" id="form" enctype="multipart/form-data">
                          {{ csrf_field() }}
                            <input type="hidden" name="auth_id" id="auth_id" value="{{Auth::user()->id}}">

                        <!--picure post part-->

                            <div class="card-block"> Picture </div>
                            <br>
                            <div class="photo">
                                <img class="card-img-bottom img-responsive" src="/img/dummy.png" alt="Card image cap">
                                <div class="text-center caption">


                                    <i id="click_trigger" class="fa fa-camera fa-2x btn btn-default btn-file" aria-hidden="true">

                                    </i>
                                    <input  id="click_submit" type="file" name="image" class="image" value="select" style="display:none;">


                                    <h3 class="text-center text-capitalize">change picture</h3>

                                </div>


                            </div>

<!--end img post part-->

                         <!--    <div class="fileinput fileinput-new" data-provides="fileinput">
                             <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 248px; height: 248px;"></div>
                             <div>
                                 <span class="btn btn-default btn-file"><i class="fileinput-new">Select image</i><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
                                 <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                             </div>
                         </div> -->
                        </div>
                    </div>

                    <!--start another info inputs-->
                    <div class="col-md-9">


                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Product title">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea type="text" name="description" class="form-control" id="description" placeholder="description" ></textarea>
                            </div>
                            <!-- <div class="form-group">
                                <label for="count">Count</label>
                                <textarea name="count" id="count" cols="30" class="form-control" rows="2" placeholder="Hectar Count"></textarea>
                            </div> -->
                            
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
                                <select class="form-control" id="constant_id" name="constant_id" >
                                    @foreach($constants as $constant)
                                      <option value="{{ $constant->id }}">{{ $constant->title }}</option>
                                    @endforeach
                                </select>

                            </div>
                            
                            <div class="form-group col-md-3">
                                <label for="price">Count</label>
                                <select class="form-control" id="count" name="count" >
                                    @for($i=0;$i<500;$i++)
                                      <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="price">Price for one in AZN</label>
                                <input type="number" class="form-control" name="price" id="price" >
                            </div>
                            <div class="form-group col-md-6">
                                <label for="date_limit">Date Limit</label>
                                <input type="date" id="date_limit" name="date_limit">
                            </div>
                            <button type="submit" id="create_product" name="create_product"
                            class="btn btn-success btn-lg text-capitalize pull-right">Create Product</button>
                        </form>

                        <!--end -->


                    </div>


                </div>
            </div>
        </div>


@endsection


@section('script')
<script>
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

       
        

        // $('#create_product').click(function(event){
        //     event.preventDefault();  
        //     formData.append('file',image.files[0])          
        //     $.ajax({
        //         async: true,
        //         url:'/creating_product',
        //         method:'POST',
        //         dataType:'JSON',
        //         contentType: false,
        //         data:{
        //             _token:_token.val(),
        //             title:title.val(),                    
        //             image:image.val().substring(12),
        //             description:description.val(),
        //             product_category_id:product_category_id.val(),
        //             constant_id:constant_id.val(),
        //             count:count.val(),
        //             price:price.val(),
        //             date_limit:date_limit.val(),
        //             auth_id:auth_id.val(),
        //         },
        //         success:function(data)
        //         {
        //             console.log(data)
        //         },
        //         error:function()
        //         {
        //             return 'nooo';
        //         }
        //     })
        // })
</script>

@endsection
