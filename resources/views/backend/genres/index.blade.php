@extends('layouts.backend')
@section('content')

<!-- Sidebar Navigation end-->
<div class="page-content">
      <!-- Page Header-->
      <div class="page-header no-margin-bottom">
        <div class="container-fluid">
          <h2 class="h5 no-margin-bottom">Genres Table</h2>
        </div>
      </div>

      <div class="d-flex bd-highlight">
            <div class="container-fluid">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Genres            </li>
              </ul>
            </div>
            <div class="p-4 flex-shrink-1 bd-highlight">
                  <a href="{{url('/create')}}" type="button" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>
            </div>
          </div>
      <!-- Breadcrumb-->
      <section class="no-padding-top">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="block">
                <div class="title"><strong>Genres Data Table</strong></div>
                <div class="table-responsive"> 
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Cover</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Action</td>
                        <td>
                              <img src="{{asset('backend-assets/img/genres/01.jpg')}}" alt="Cover Photo" style="width: 60px; height:100px;" class="mr-3">
                        </td>
                        <td>
                              <a href="{{url('/edit')}}" type="button" class="btn btn-primary mr-3"><i class="fa fa-cog" aria-hidden="true"></i></a>
                              <a href="#" type="button" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Cartoon</td>
                        <td>
                              <img src="{{asset('backend-assets/img/genres/06.jpg')}}" alt="Cover Photo" style="width: 60px; height:100px;" class="mr-3">
                        </td>
                        <td>
                              <button type="button" class="btn btn-primary mr-3"><i class="fa fa-cog" aria-hidden="true"></i></button>
                              <button type="button" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Drama</td>
                        <td>
                              <img src="{{asset('backend-assets/img/genres/02.jpg')}}" alt="Cover Photo" style="width: 60px; height:100px;" class="mr-3">
                        </td>
                        <td>
                              <button type="button" class="btn btn-primary mr-3"><i class="fa fa-cog" aria-hidden="true"></i></button>
                              <button type="button" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">4</th>
                        <td>Horror</td>
                        <td>
                              <img src="{{asset('backend-assets/img/genres/03.jpg')}}" alt="Cover Photo" style="width: 60px; height:100px;" class="mr-3">
                        </td>
                        <td>
                              <button type="button" class="btn btn-primary mr-3"><i class="fa fa-cog" aria-hidden="true"></i></button>
                              <button type="button" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></button>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">5</th>
                        <td>Series</td>
                        <td>
                              <img src="{{asset('backend-assets/img/genres/04.jpg')}}" alt="Cover Photo" style="width: 60px; height:100px;" class="mr-3">
                        </td>
                        <td>
                              <button type="button" class="btn btn-primary mr-3"><i class="fa fa-cog" aria-hidden="true"></i></button>
                              <button type="button" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></button>
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