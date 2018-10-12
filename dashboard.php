<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="css/footer.css">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-success flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"> <img src="img/logoPP.jpg" alt="gambarPP" class="image-responsive" height="30px"> PRESTASI PRIMA MART</a>
      <marquee class="text-light w-100">SELAMAT DATANG ADMIN </marquee>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <div class="container-fluid" style="padding-top:7px;">
              <p><i>Biagy Roosevelt</i> - <span class="text-muted">ADMIN</span> </p>
            </div>

                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
  <span>Admin Menu</span>
</h6>
<ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link" href="dashboard.php">
      <span data-feather="home">Dashboard</span>
      Dashboard
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="index.php">
      <span data-feather="shopping-cart" class=""></span>
      Produk
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="customer.php">
      <span data-feather="users"></span>
      Customers
    </a>
  </li>
</ul>
                        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
  <span>User Menu</span>
</h6>
<ul class="nav flex-column mb-2">

  <li class="nav-item">
    <a class="nav-link" href="belanja.php">
      <span data-feather="shopping-cart"></span>
      Belanja
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">
      <span data-feather="file-text"></span>
      Catatan Pembayaran
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">
      <span data-feather="users"></span>
      Profile
    </a>
  </li>
</ul>

<ul class="nav flex-column">
  <li class="nav-item">
    <a class="nav-link text-danger" href="keluar.php">
      <span data-feather="home" class="text-danger"></span>
      Keluar
    </a>
  </li>
</ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h1">Dashboard Admin</h1>
          </div>

            <div class="row">
              <div class="col-md-4">
                <h3 class="text-muted text-center">Barang</h3>
                <h3 class='text-muted text-center'>3</h3>              </div>
              <div class="col-md-4">
                <h3 class="text-muted text-center">Jenis Barang</h3>
                <h3 class='text-muted text-center'>2</h3>              </div>
              <div class="col-md-4">
                <h3 class="text-muted text-center">Stok Barang</h3>
                <h3 class='text-muted text-center'>14</h3>              </div>
            </div>

            <div style="padding-top:10%;">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom" style="padding-top: 5%;">
                <h1 class="h1">Pendapatan</h1>
              </div>

              <table class="table table-hover table-bordered">
                <thead>
                  <tr class="text-center">
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Detail</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="text-center">
                    <td>SENIN</td>
                    <td>200.000</td>
                    <td>
                      <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">
                        Lihat
                      </button>
                    </td>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            ...
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </tr>
                </tbody>
              </table>
            </div>
        </main>
      </div>
    </div>

    <div class="footer bg-success">
      <div class="container">
        <p class="text-light">&copy; Biagy Roosevelt</p>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="js/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

  </body>
</html>
