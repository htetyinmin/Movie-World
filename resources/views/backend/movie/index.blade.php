@extends('layouts.backend')
@section('content')

<!-- Sidebar Navigation end-->
<div class="page-content">
      <!-- Page Header-->
      <div class="page-header no-margin-bottom">
        <div class="container-fluid">
          <h2 class="h5 no-margin-bottom">Movies Table</h2>
        </div>
      </div>

      <div class="d-flex bd-highlight">
            <div class="container-fluid">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Movie      </li>
              </ul>
            </div>
            <div class="p-4 flex-shrink-1 bd-highlight">
                  <a href="{{route('movie.create')}}" type="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>
            </div>
          </div>
      <!-- Breadcrumb-->
      <section class="no-padding-top">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="block">
                <div class="title"><strong>Movies Data Table</strong></div>
                <div class="table-responsive"> 
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Cover</th>
                        <th>Year</th>
                        <th>Language</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @php
                          $i=1;
                      @endphp
                      @foreach ($movies as $movie)
                        <tr>
                          <th scope="row">{{$i++}}</th>
                          <td>{{$movie->name}}</td>
                          <td>
                                <img src="{{asset('storage/'.$movie->photo)}}" alt="Photo" width="70" height="100" class="mr-3">
                          </td>
                          <td>{{$movie->year}}</td>
                          <td>{{$movie->language}}</td>
                          <td>{{$movie->duration}}</td>
                          <td>{{$movie->status}}</td>
                          <td>
                                <a href="{{route('movie.edit', $movie->id)}}" type="button" class="btn btn-warning mr-3"><i class="fa fa-cog" aria-hidden="true"></i></a>
                                <a href="{{route('movie.show', $movie->id)}}" type="button" class="btn btn-success mr-3"><i class="fa fa-info p-1" aria-hidden="true"></i></a>
                                <a href="#deleteModal" data-id="{{route('movie.destroy', $movie->id)}}" type="button" class="btn btn-primary deletebtn"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
      $("#movie").addClass("active");
      
      $('.deletebtn').click(function(){
        var id = $(this).data('id');
        // console.log(id);
        $('#deleteModalForm').attr('action',id);
        $('#deleteModal').modal('show');
      })
    })
  </script>
@endsection