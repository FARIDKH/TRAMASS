@extends('layouts.main_layout')


@section('content')

<div class="container-fluid change_pro">

            <div class="container">

            <!--title-->
                <div class="row title">
                    <div class="col-md-12">

                        <h2 class="text-capitalize">Edit Profile</h2>
                            <hr>
                    </div>


                </div>
                <!-- end title-->

                <!--start man info part-->
                <div class="row content">
                    <div class="col-md-3">
                        <form method="post" action="/profile/{{$user->id}}  " >
                        <div class="card">

                        <!--start all post part-->

                          {{ csrf_field() }}
                        <!--picure post part-->
                            <div class="card-block"> Picture </div>
                            <br>
                            <div class="photo">
                                <img class="card-img-bottom img-responsive" src="/img/dummy.png" alt="Card image cap">
                                <div class="text-center caption">


                                    <i id="click_trigger" class="fa fa-camera fa-2x btn btn-default btn-file" aria-hidden="true">

                                    </i>
                                    <input  id="click_submit" type="file" name="..." value="select" style="display:none;">


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
                            <div class="row">
                              <div class="form-group">
                              <label for="exampleInputPassword1">First Name</label>
                              <input type="text" name="name" class="form-control" id="exampleInputPassword1" value="{{$user->name}}">
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Last Name</label>
                              <input type="text"  name="surname"class="form-control" id="exampleInputEmail1" value="{{$user->surname}}">
                          </div>

                          <div class="form-group">
                              <label for="province">Email</label>
                              <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{$user->email}}">
                          </div>

                                <div class="col-md-3">
                                    <select name="type" class="form-control" id="type">
                                        <option value="0">Alıcı</option>
                                        <option value="1">Satıcı</option>
                                        <option value="2">Alıcı və Satıcı</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                    <button type="submit" name="change_profile" formnovalidate="" class="btn btn-success btn-lg text-capitalize pull-right" id="update">Update profile</button>
                            </div>



                            <!--end -->


                        </div>

                    </form>
                </div>
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

        var _token = $('input[name=csrf_token]');
        var names = $('input[name = name]');
        var surname = $('input[name = surname]');
        var email = $('input[name = email]');
        var select = $('select[name = type]');

        // $('#update').click(function(event){
        //     event.preventDefault();
        //     //formData.append('file',image.files[0])
        //     $.ajax({
        //         async: true,
        //         url:'/profile/{id}/',
        //         type:'POST',
        //         dataType:'JSON',
        //         contentType: false,
        //         data:{
        //             _token:_token.val(),
        //             names:names.val(),
        //         },
        //         success:function(data)
        //         {
        //             console.log(data)
        //         },
        //         error:function()
        //         {
        //             return 'nayirrrr olmaz';
        //         }
        //     })
        // })
</script>

@endsection
