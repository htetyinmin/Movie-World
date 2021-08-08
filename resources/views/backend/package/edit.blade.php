@extends('layouts.backend')
@section('content')
   @php
        $descriptions = json_decode($package->description,true);
        $description_count = count($descriptions);


    @endphp
<div class="page-content">
      <!-- Page Header-->
      <div class="page-header no-margin-bottom">
        <div class="container-fluid">
          <h2 class="h5 no-margin-bottom">Packages Edit Table</h2>
        </div>
      </div>

      <div class="d-flex bd-highlight">
            <div class="container-fluid">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Packages Data</li>
              </ul>
            </div>
            <div class="p-4 flex-shrink-1 bd-highlight">
                  <a href="{{route('package.index')}}" type="button" class="btn btn-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            </div>
      </div>

      <!-- Form Elements -->
      <div class="col-lg-12">
            <div class="block">
            <div class="title">
                  <strong>Edit Package Data</strong>
            </div>
            <div class="block-body">
                  <form class="form-horizontal" action="{{route('package.update', $package->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Plan Name</label>
                              <div class="col-sm-9">
                              <input type="text" name="title" class="form-control" value="{{$package->title}}" >
                              </div>
                          </div>

                        <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Fees</label>
                              <div class="col-sm-9">
                                    <input type="text" name="fees" value="{{$package->fees}}" class="form-control">
                              </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Period</label>
                              <div class="col-sm-9">
                              <input type="text" name="period" value="{{$package->period}}" class="form-control">
                              </div>
                        </div>
                        <div class="form-group row">

                              <div class="col-sm-3">
                                    <label class=" form-control-label d-block">Description</label>
                                    <button type="button" class="btn btn-light float-end btn-sm btn_add_size">
                                          <i class="fa fa-plus"></i>  More 
                                    </button>
                              </div>

                              <div class="col-sm-9 more_size">
                                    <input type="text" name="description[]" class="form-control" value="{{ $descriptions[0] }}">

                                    @for ($i=1; $i < $description_count; $i++)
                                    <div class="form-group input-group my-3">
                                          <input type="text" name="description[]" placeholder="More Description" class="form-control" value="{{ $descriptions[$i] }}"/>
                                          <button class="btn btn-danger btn_remove_size" type="button"><i class="fa fa-close"></i></button>
                                    </div>
                                    @endfor
                              </div>
                        </div>
                        <div class="form-group row">
                              <div class="col-sm-9 ml-auto">
                              <button type="submit" class="btn btn-primary"> <i class="fa fa-floppy-o" aria-hidden="true"></i> Update </button>
                              </div>
                        </div>
                  </form>
              </div>
            </div>
          </div>

</div>
@endsection

@section('script')
      <script>
            $(document).ready(function(){
                $("#package").addClass("active");

                  var x = {!! $description_count !!}; //Initial input field is set to 1


                  var max_fields = 10; //Maximum allowed input fields 
                  var wrapper    = $(".more_size"); //Input fields wrapper
                  var add_button = $(".btn_add_size"); //Add button class or ID

                  $(add_button).click(function(e){
                        e.preventDefault();
                        if(x < max_fields){ 
                              x++; //input field increment
                              $(wrapper).append(`<div class="form-group input-group my-3">
                                                <input type="text" name="description[]" placeholder="More Description" class="form-control"/>
                                                <button class="btn btn-danger btn_remove_size" type="button"><i class="fa fa-close"></i></button>
                                                </div>`);
                    }
                  });


                  $(wrapper).on("click",".btn_remove_size", function(e){ 
                      e.preventDefault();
                        $(this).parent('div').remove(); //remove inout field
                        x--; //inout field decrement
                  });

                  // append_description_wrapper(x);

                  // function append_description_wrapper(x){
                  
                  //       $.each(descriptions,function(i,v){
                  //         if(i > 0){
                  //             $(wrapper).append(`<div class="form-group input-group mb-3">
                  //                       <input type="text" class="form-control" name="description[]" value="${v}">
                  //                       <button class="btn btn-danger btn_remove_size" type="button">
                  //                         <i class="fa fa-close"></i>
                  //                       </button>
                  //                   </div>`);
                  //         }
                  //       })

                      
                  // }

            })
      </script>
@endsection