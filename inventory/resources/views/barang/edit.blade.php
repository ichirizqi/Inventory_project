
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
    <h1 class="h3 mb-2 text-gray-800 mb-5">Edit Barang</h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Barang</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('barang.update', $barang->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <div class="form-group">
                  <label class="font-weight-bold">Nama Barang</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $barang->nama) }}" placeholder="Masukkan Nama Barang">
                       
                  <!-- error message untuk title -->
                  @error('nama')
                  <div class="alert alert-danger mt-2">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="id_kategori" class="form-control">
                        <option value=" ">--Pilih--</option>
                        @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" 
                            {{ old('id_kategori', $barang->id_kategori) == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Supplier</label>
                    <select name="id_supplier" class="form-control">
                        <option value=" ">--Pilih--</option>
                        @foreach ($supplier as $sup)
                        <option value="{{ $sup->id }}" 
                                {{ old('id_supplier', $barang->id_supplier) == $sup->id ? 'selected' : '' }}>
                            {{ $sup->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                  <label class="font-weight-bold">Harga</label>
                  <input type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga', $barang->harga) }}" placeholder="Masukkan Harga Barang">
                       
                  <!-- error message untuk title -->
                  @error('harga')
                  <div class="alert alert-danger mt-2">
                    {{ $message }}
                  </div>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="font-weight-bold">Stok</label>
                  <input type="text" class="form-control @error('qty') is-invalid @enderror" name="qty" value="{{ old('qty', $barang->qty) }}" placeholder="Masukkan Stok Barang">
                       
                  <!-- error message untuk title -->
                  @error('qty')
                  <div class="alert alert-danger mt-2">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
        </form> 
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