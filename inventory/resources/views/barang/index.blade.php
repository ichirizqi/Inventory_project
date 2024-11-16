
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventory</title>

    <!-- Custom fonts for this template-->
    <link href="https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="https://startbootstrap.github.io/startbootstrap-sb-admin-2/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{ Auth::user()->name }}</div>
            </a>


            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('barang.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Daftar Barang</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('kategori.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Kategori Barang</span></a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('supplier.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Daftar Supplier</span></a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('barang.logout') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Logout</span></a>
            </li>
            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div class="container-fluid p-5">

<!-- Page Heading -->
<div class="d-flex flex-row justify-content-between">
    <h1 class="h3 mb-2 text-gray-800 mb-5">Daftar Barang</h1>
    <a href="{{ route('barang.create') }}" class="btn btn-add btn-primary mb-5 ">Tambah Barang</a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Barang</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kategori Barang</th>
                        <th>Supplier</th>
                        <th>Stok Barang</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $counter = 1; // Inisialisasi variabel counter
                @endphp

                @foreach ($barang as $bar)
                    <tr>
                        <td>{{ $counter }}</td>
                        <td>{{ $bar->nama }}</td>
                        <td>{{ $bar->kategori->nama }}</td>
                        <td>{{ $bar->supplier->nama }}</td>
                        <td>{{ $bar->qty }}</td>
                        <td>{{ $bar->harga }}</td>
                        
                        <td class="d-flex flex-row">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('barang.destroy', $bar->id) }}" method="POST">
                                <a href="{{ route('barang.edit', $bar->id) }}" class="btn btn-warning">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">HAPUS</button>
                            </form>
                        </td>
                    </tr>
                    @php
                    $counter++; // Tambahkan nilai counter setiap iterasi
                    @endphp

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
<div class="container my-auto">
<div class="copyright text-center my-auto">
    <span>Copyright &copy; Your Website 2020</span>
</div>
</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


   

    <!-- Bootstrap core JavaScript-->
    <script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/jquery/jquery.min.js"></script>
    <script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/js/sb-admin-2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>

</body>


</html>