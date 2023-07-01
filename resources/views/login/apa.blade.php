<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500&display=swap" rel="stylesheet">
</head>
<body style="background-color: #0e1c36">
  <style>

  .btn-color{
  background-color: #0e1c36;
  color: #fff;
}

.profile-image-pic{
  height: 200px;
  width: 200px;
  object-fit: cover;
}

.card, .card-body {
  border-radius: 10px; !important
}

.cardbody-color{
  background-color: #2b317d;
}

a{
  text-decoration: none;
}
  </style>
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center text-dark mt-5">Sistem Inventaris Barang Kerja</h2>
        <div class="text-center mb-5 text-dark">PT Karunia Dinamik Sejahtera Jakarta</div>
        <div class="card my-5">

          <form class="card-body cardbody-color p-lg-5">
            
            @csrf
            <div class="text-center">
              <img src="{{ asset('assets/images/logoKDS.png') }}" class="img-fluid profile-image-pic my-3"
                width="200px" alt="profile">
            </div>
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
</body>
