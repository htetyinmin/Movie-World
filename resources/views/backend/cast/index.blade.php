@extends('layouts.backend')
@section('content')

<!-- Sidebar Navigation end-->
<div class="page-content">
      <!-- Page Header-->
      <div class="page-header no-margin-bottom">
        <div class="container-fluid">
          <h2 class="h5 no-margin-bottom">Casts Table</h2>
        </div>
      </div>

      <div class="d-flex bd-highlight">
            <div class="container-fluid">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Casts</li>
              </ul>
            </div>
            <div class="p-4 flex-shrink-1 bd-highlight">
                  <a href="{{route('cast.create')}}" type="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>
            </div>
          </div>
      <!-- Breadcrumb-->
      <section class="no-padding-top">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="block">
                <div class="title"><strong>Casts Data Table</strong></div>
                <div class="table-responsive"> 
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Photo</th>
                        <th>Gender</th>
                        <th>Date Of Birth</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                          $i=1;
                      @endphp
                      @foreach ($casts as $cast)
                        <tr>
                          <th scope="row">{{$i++}}</th>
                          <td>{{$cast->name}}</td>
                          <td>
                                <img src="{{asset('storage/'.$cast->photo)}}" alt="Photo" width="70" height="100" class="mr-3">
                          </td>
                          <td>{{$cast->gender}}</td>
                          <td>{{Carbon\Carbon::parse($cast->dob)->format('d/m/Y')}}</td>
                          <td>{{$cast->status}}</td>
                          <td>
                                <a href="{{route('cast.edit', $cast->id)}}" type="button" class="btn btn-warning mr-3"><i class="fa fa-cog" aria-hidden="true"></i></a>
                                <a href="{{route('cast.show', $cast->id)}}" type="button" class="btn btn-success mr-3"><i class="fa fa-info p-1" aria-hidden="true"></i></a>
                                <a href="#deleteModal" data-id="{{route('cast.destroy', $cast->id)}}" type="button" class="btn btn-primary deletebtn"><i class="fa fa-trash" aria-hidden="true"></i></a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

    <div class="modal fade" id="deleteModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="post" action="" id="deleteModalForm">
            @csrf
            @method('DELETE')
            <div class="modal-header">
              <h5 class="modal-title">Delete!</h5>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete?</p>
            </div>
            <div class="modal-footer">
              <input type="submit" name="btnsubmit" class="btn btn-primary" value="Delete">
              <button class="btn btn-secondary" data-dismiss="modal">Cancle</button>
            </div>
          </form>
        </div>
      </div>
    </div>

@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $("#cast").addClass("active");
      
      $('.deletebtn').click(function(){
        var id = $(this).data('id');
        // console.log(id);
        $('#deleteModalForm').attr('action',id);
        $('#deleteModal').modal('show');
      })
    })
  </script>
@endsection