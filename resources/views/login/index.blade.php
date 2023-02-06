<!DOCTYPE html>
<html lang="en">
  <head>   
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('assets/css/all.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    
    <title>Sistem Inventaris KDS || {{$title}}</title>
  </head> 
<body style="background-color: #3742a6; font-family:Roboto,sans-serif;">
{{-- <!-- Section: Design Block -->
<div class="d-flex justify-content-center align-items-center" style="height: 100vh; background-color: #d6d0d0;
position: relative;
">
  
<section class=" text-center text-lg-start">
  

  <style>
    .rounded-t-5 {
      border-top-left-radius: 0.5rem;
      border-top-right-radius: 0.5rem;
    }

    @media (min-width: 992px) {
      .rounded-tr-lg-0 {
        border-top-right-radius: 0;
      }

      .rounded-bl-lg-5 {
        border-bottom-left-radius: 0.5rem;
      }
    }
  </style>

  <div class="card mb-3">
    <div class="row g-0 d-flex align-items-center">
      <div class="col-lg-4 d-none d-lg-flex">
        <img src="{{ asset('assets/images/004.jpg') }}" alt="Trendy Pants and Shoes"
          class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
        {{-- <div class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" style="
        background-color: blue;
        padding: 200px 120px;
        
        "></div> --}}
      {{-- </div>
      <div class="col-lg-8">
        <div class="card-body py-5 px-md-5">
          <h1 class="mb-4">Sistem Inventaris Barang Kantor</h1>
          <form method="POST" action="{{ route('login.authenticate') }}">
            @csrf
            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="" required>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>

            <!-- Submit button -->
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary" name="login">Login</button>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->

</div> --}}
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>{{ $message }}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
  </button>
</div>
@endif
<div class="d-flex justify-content-center align-items-center" style="height: 100vh">
  <div class="card col-sm-4 rounded shadow p-3 bg-dark rounded" style="
  background-color: #131a58 !important; 
  color:white;
  ">
      <div class="card-body">
          <div class="text-center"><h2 class="fw-bold mb-4">KDS Jakarta</h2></div>
          <div class=" text-center"><h3 class="fw-bold mb-4">Sistem Inventaris Barang Kantor</h3></div>
          <img class="mx-auto d-block" src="{{ asset('assets/images/logoKDS.png') }}" alt="">
          <form method="POST" action="{{ route('login.authenticate') }}">
            @csrf
            <div class="form-floating my-3">
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="" required>
              <label class="text-dark" for="username">Username</label>
            </div>
            <div class="form-floating mt-3">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
              <label class="text-dark" class="form-label" for="password">Password</label>
            </div>
            <div class="d-grid mx-auto mt-3">
                <button type="submit" class="btn btn-success" name="login">Login</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
@include('layouts.footer')

