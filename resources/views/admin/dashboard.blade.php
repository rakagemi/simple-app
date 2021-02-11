@extends('admin.themes.main')

@section('title', 'Dashboard')

@section('main-content')
<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item">Dashboard</div>
      </div>
    </div>

    <div class="row">
      <div class="col col-lg-6 col-md-12 col-12">
        <div class="row">
          <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Users</h4>
                </div>
                <div class="card-body" id="countUser">
                </div>
              </div>
            </div>
          </div>
          <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-danger">
                <i class="fas fa-chart-line"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Usaha</h4>
                </div>
                <div class="card-body" id="countUsaha">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-warning">
                <i class="fas fa-box"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Barang</h4>
                </div>
                <div class="card-body" id="countBarang">
                </div>
              </div>
            </div>
          </div>
          <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-success">
                <i class="fas fa-dolly"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Suplier</h4>
                </div>
                <div class="card-body" id="countSuplier">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col col-lg-6 col-md-12 col-12">
        <div class="row">
          <div class="col col-12">
            <div class="card">
              <div class="card-header">
                <h4>Users statistics</h4>
              </div>
              <div class="card-body">
                <div id="userChartDiv">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section-body">
    </div>
  </section>
</div>
@endsection

@section('specificJS')

@endsection