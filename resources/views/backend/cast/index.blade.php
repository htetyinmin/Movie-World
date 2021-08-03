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
                <li class="breadcrumb-item active">Casts            </li>
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
                        <th>Place Of Birth</th>
                        <td>Bio</td>
                        {{-- <th>Gallery</th> --}}
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Nay Toe</td>
                        <td>
                              <img src="{{asset('backend-assets/img/avatar-2.jpg')}}" alt="Cover Photo" style="width: 60px; height:100px;" class="mr-3">
                        </td>
                        <td>Male</td>
                        <td>10/02/1897</td>
                        <td>Houng Koung</td>
                        <td>action and funny actor......</td>
                        <td>Actor</td>
                        <td>
                              <a href="#" type="button" class="btn btn-primary mr-3"><i class="fa fa-cog" aria-hidden="true"></i></a>
                              <a href="#" type="button" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Nay Toe</td>
                        <td>
                              <img src="{{asset('backend-assets/img/avatar-2.jpg')}}" alt="Cover Photo" style="width: 60px; height:100px;" class="mr-3">
                        </td>
                        <td>Male</td>
                        <td>10/02/1897</td>
                        <td>Houng Koung</td>
                        <td>action and funny actor......</td>
                        <td>Actor</td>
                        <td>
                              <a href="#" type="button" class="btn btn-primary mr-3"><i class="fa fa-cog" aria-hidden="true"></i></a>
                              <a href="#" type="button" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Myint Myat</td>
                        <td>
                              <img src="{{asset('backend-assets/img/avatar-2.jpg')}}" alt="Cover Photo" style="width: 60px; height:100px;" class="mr-3">
                        </td>
                        <td>Male</td>
                        <td>10/02/1897</td>
                        <td>Houng Koung</td>
                        <td>action and funny actor......</td>
                        <td>Actor</td>
                        <td>
                              <a href="#" type="button" class="btn btn-primary mr-3"><i class="fa fa-cog" aria-hidden="true"></i></a>
                              <a href="#" type="button" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">4</th>
                        <td>Phway Phway</td>
                        <td>
                              <img src="{{asset('backend-assets/img/avatar-0.jpg')}}" alt="Cover Photo" style="width: 60px; height:100px;" class="mr-3">
                        </td>
                        <td>Female</td>
                        <td>10/02/1897</td>
                        <td>Houng Koung</td>
                        <td>action and funny actor......</td>
                        <td>Actress</td>
                        <td>
                              <a href="#" type="button" class="btn btn-primary mr-3"><i class="fa fa-cog" aria-hidden="true"></i></a>
                              <a href="#" type="button" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

@endsection