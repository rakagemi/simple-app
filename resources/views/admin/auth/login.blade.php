<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; </title>

  <!-- Icon -->
  <link rel="icon" href="{{asset('favicon.ico')}}">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('admin/dataTables/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/segment.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/components.css')}}">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-3">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <br><br>
            <div class="login-brand">
              <img src="{{asset('img/aokiicon.png')}}" alt="logo" width="100" class="">
            </div>
            <div class="card card-primary">
              <div class="card-header">
                <h4>Login</h4>
              </div>
              <div class="card-body">
                <form class="form-login" method="post" action="{{route('signin')}}">
                {{csrf_field()}}
                @if(Session::has('success'))
                <div class="alert alert-success btn-block"> {{ Session::get('success') }}</div>
                @endif
                @if(Session::has('alert'))
                <div class="alert alert-danger btn-block"> {{ Session::get('alert') }}</div>
                @endif
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="{{asset('admin/js/jQuery/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('admin/js/popper.min.js')}}"></script>
  <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('admin/js/jQuery/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('admin/js/moment.min.js')}}"></script>
  <script src="{{asset('admin/js/stisla.js')}}"></script>

  <!-- JS Libraies -->
  <script src="{{asset('admin/js/jQuery/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('admin/dataTables/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('admin/js/segment.js')}}"></script>

  <!-- Template JS File -->
  <script src="{{asset('admin/js/scripts.js')}}"></script>
  <script src="{{asset('admin/js/custom.js')}}"></script>

  <!-- Page Specific JS File -->
</body>

</html>