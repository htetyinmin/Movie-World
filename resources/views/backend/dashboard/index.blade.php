@extends('layouts.backend')
@section('content')

<div class="page-content">
      <!-- Page Header-->
      <div class="page-header no-margin-bottom">
        <div class="container-fluid">
          <h2 class="h5 no-margin-bottom">Charts</h2>
        </div>
      </div>
      <!-- Breadcrumb-->
      <div class="container-fluid">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ul>
      </div>
      <section>
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="line-chart block chart">
                <div class="title"><strong>Movie Download Count Chart</strong></div>
                <canvas id="lineChartCustom1"></canvas>
              </div>
            </div>
            {{-- <div class="col-lg-12">       
              <div class="lin-chart block chart">
                <div class="title"><strong>Movies Chart</strong></div>
                <div class="line-chart chart margin-bottom-sm">
                  <canvas id="lineChartCustom2"></canvas>
                </div>
                <div class="line-chart chart">
                  <canvas id="lineChartCustom3"></canvas>
                </div>
              </div>
            </div> --}}
            <div class="col-lg-4">
              <div class="chart block">
                <div class="title"> <strong>Genres Chart</strong></div>
                <div class="bar-chart chart margin-bottom-sm">
                  <canvas id="barChartCustom1"></canvas>
                </div>
                <div class="bar-chart chart">
                  <canvas id="barChartCustom2"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="bar-chart block chart">
                <div class="title"><strong>Casts Chart</strong></div>
                <div class="bar-chart chart">
                  <canvas id="barChartCustom3"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="pie-chart chart block">
                <div class="title"><strong>Users Chart</strong></div>
                <div class="pie-chart chart margin-bottom-sm">
                  <canvas id="pieChartCustom1"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="radar-chart chart block">
                <div class="title"><strong>Radar Chart</strong></div>
                <div class="radar-chart chart margin-bottom-sm">
                  <canvas id="radarChartCustom"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <footer class="footer">
        <div class="footer__block block no-margin-bottom">
          <div class="container-fluid text-center">
            <!-- Please do not remove the backlink to us unless you support us at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
             <p class="no-margin-bottom">2018 &copy; Your company. Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
          </div>
        </div>
      </footer>
    </div>

@endsection

@section('script')
  <script type="text/javascript">
    $(document).ready(function(){
      $("#dashboard").addClass("active");
    })
  </script>
@endsection
