<!DOCTYPE html>
<html lang="en">
    @include('layouts.head')
<body>
<!-- Section: Design Block -->
<div class="d-flex justify-content-center align-items-center" style="height: 100vh; background-color: #f5f5f5;
position: relative;
">
  
<section class=" text-center text-lg-start">
  
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>{{ $message }}</strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
  </button>
</div>
@endif
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
        <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" alt="Trendy Pants and Shoes"
          class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
        {{-- <div class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" style="
        background-color: blue;
        padding: 200px 120px;
        
        "></div> --}}
      </div>
      <div class="col-lg-8">
        <div class="card-body py-5 px-md-5">
          <h1 class="mb-4">Sistem Inventaris KDS</h1>
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

</div>
@include('layouts.footer')