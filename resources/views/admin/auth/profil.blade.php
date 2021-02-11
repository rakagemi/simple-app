@extends('admin/main')

@section('title', 'Profile')

@section('main-content')


<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Profile</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item">Dashboard</div>
        <div class="breadcrumb-item active">Profile</div>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Hi, {{ Session::get('name_admin') }}</h2>
      <p class="section-lead">
        Change information about yourself on this page.
      </p>
      <div class="col">
        <div class="card">
          <form method="post" class="needs-validation" action="profil/update/{{ Session::get('id') }}">
            @csrf
            <div class="card-header">
              <h4>Edit Profile</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="form-group col">
                  <label>Nama</label>
                  <input type="text" name="name" class="form-control" value="{{ Session::get('name_admin') }}" required="">
                  <div class="invalid-feedback">
                    Please fill in the first name
                  </div>
                </div>
                <div class="form-group col-md-5 col-12">
                  <label>Phone</label>
                  <input type="tel" class="form-control" name="no_hp" value="{{ Session::get('no_hp_admin') }}">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-7 col-12">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" value="{{ Session::get('email_admin') }}" required="">
                  <div class="invalid-feedback">
                    Please fill in the email
                  </div>
                </div>
                <div class="form-group col-md-5 col-12">
                  <label>Password</label>
                  <input type="tel" class="form-control" name="password" value="">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-12">
                  <label>Address</label>
                  <textarea class="form-control summernote-simple" name="alamat" rows="5">{{ Session::get('alamat_admin') }}</textarea>
                </div>
              </div>
            </div>
            <div class="card-footer text-right">
              <button class="btn btn-primary">Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endsection
  @section('specificJS')
  <script src="{{asset('admin/js/sweetalert.min.js')}}"></script>
  <!-- <script src="{{asset('assets/js/Banner.js')}}"></script> -->
  <script src="{{asset('admin/js/Banner.js')}}"></script>
  @endsection

