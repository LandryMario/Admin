<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Listes des Utilisateurs</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset ('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
      <li class="nav-item d-none d-sm-inline-block">
      <span class="nav-link">Cour d'Appel:</span>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <span class="nav-link">{{Auth::user()->appel}}</span>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <span class="nav-link">Tribunal:</span>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <span class="nav-link">{{Auth::user()->tribunal}}</span>
      </li>
    </ul>

    <!-- navbar right -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar recherche -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- code pleine écran  -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

      <!-- code navbar pour changer des couleur   -->
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="image/logo.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">JSAN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="Info text-center">
        <div>
          <div class="card-body">
            <div class="text-center">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="image/mario.jpeg" class="img-circle elevation-2" alt="">
        </div>
        <div class="info">
          <a href="{{route('profile.edit')}}" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>
    </div> 
  </div>


        <form  method="Post" action="{{route('logout')}}">
          @csrf
          <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault(); 
                            this.closest('form').submit();" class="btn btn-primary btn-block text-white">
              <i class="zmdi zmdi-power"></i>
              {{__('Se Déconnecter')}}
          </x-dropdown-link>
        </form>
          </div>
        </div>
     
     
    

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- <li class="nav-item menu-open">
            <a href="dashboard" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Listes des utilisateurs
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Antananarivo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Atsiranana</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Fianarantsoa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mahajanga</p>
                </a>
              </li>
            </li>
            <li class="nav-item">
              <a href="./index3.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Toamasina</p>
              </a>
            <li class="nav-item">
              <a href="./index3.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Toliara</p>
              </a>
            </ul>
          </li> -->
          <br>
          <li class="nav-item">
            <a href="dashboard" class="nav-link active">
              <i class="fas fa-users "></i>
              <p>
                Listes des Utilisateurs
              </p>
            </a>
          </li>
          <br>
         
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> Tableau de bord</h1>
            <br>
    <a href="/nouveau" class="btn btn-info text-sm">Nouveau</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="pdf">Copier/Excel/PDF/...</a></li>
              <li class="breadcrumb-item active">Listes des Utilisateurs</li>
            </ol>
          </div>
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
     <div class="row">
     <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-bordered rounded-md">
                    <thead>
                        <tr>
                            <th class="text-sm">Immatriculation</th>
                            <th class="text-sm">Nom</th>
                            <th class="text-sm">Prénom</th>
                            <th class="text-sm">Adresse e-mail </th>
                            <th class="text-sm">Cour d'Appel </th>
                            <th class="text-sm">Tribunal</th>
                            <th class="text-sm">Status</th>
                            <th class="text-sm">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($listes as $user)
                        <tr>
                            <td class="text-sm">{{$user->immatriculation}}</td>
                            <td class="text-sm">{{$user->nom}}</td>
                            <td class="text-sm">{{$user->prenom}}</td>
                            <td class="text-sm">{{$user->email}}</td>
                            <td class="text-sm">{{$user->appel}}</td>
                            <td class="text-sm">{{$user->tribunal}}</td>
                            <td class="text-sm">{{$user->status}}</td>
                            
                            <td class="text-sm">
                                <a  href="affichagemodifications/{{$user->id}}" class="btn btn-success text-sm">Modifier</a>
                                <a href="{{route('suppression',['id'=>$user->id])}}" class="btn btn-danger text-sm">Supprimer</a>
                            </td>
                        </tr>
                        @endforeach
                        
                      
                    </tbody> 
                </table>
                <br>
                    </div>
                  </div>
                </div>
            </div>
        </div>
  

       
        </div>

      
          </ul>
        </div>
             
            

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->


<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset ('plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset ('plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset ('plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset ('plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset ('dist/js/pages/dashboard2.js')}}"></script>



</body>
</html>
