<?php
if (isset($_SESSION['REST-admin'])) {

    $metadata = $_SESSION['metadata'];

    // Converte os dados para JSON
    $dados_json = json_encode($metadata);

    // Imprime o valor diretamente no script JavaScript
    echo "<script>var dadosUsuario = $dados_json;</script>";
}

?>
<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
      <!-- <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li> -->
    </ul>
    <!--
    <div class="search-element">
      <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
      <button class="btn" type="submit"><i class="fas fa-search"></i></button>
      <div class="search-backdrop"></div>
      <div class="search-result">
        <div class="search-header">
          Histories
        </div>
        <div class="search-item">
          <a href="#">How to hack NASA using CSS</a>
          <a href="#" class="search-close"><i class="fas fa-times"></i></a>
        </div>
        <div class="search-item">
          <a href="#">Kodinger.com</a>
          <a href="#" class="search-close"><i class="fas fa-times"></i></a>
        </div>
        <div class="search-item">
          <a href="#">#Stisla</a>
          <a href="#" class="search-close"><i class="fas fa-times"></i></a>
        </div>
        <div class="search-header">
          Result
        </div>
        <div class="search-item">
          <a href="#">
            <img class="mr-3 rounded" width="30" src="assets/img/products/product-3-50.png" alt="product">
            oPhone S9 Limited Edition
          </a>
        </div>
        <div class="search-item">
          <a href="#">
            <img class="mr-3 rounded" width="30" src="assets/img/products/product-2-50.png" alt="product">
            Drone X2 New Gen-7
          </a>
        </div>
        <div class="search-item">
          <a href="#">
            <img class="mr-3 rounded" width="30" src="assets/img/products/product-1-50.png" alt="product">
            Headphone Blitz
          </a>
        </div>
        <div class="search-header">
          Projects
        </div>
        <div class="search-item">
          <a href="#">
            <div class="search-icon bg-danger text-white mr-3">
              <i class="fas fa-code"></i>
            </div>
            Stisla Admin Template
          </a>
        </div>
        <div class="search-item">
          <a href="#">
            <div class="search-icon bg-primary text-white mr-3">
              <i class="fas fa-laptop"></i>
            </div>
            Create a new Homepage Design
          </a>
        </div>
      </div>
    </div>
    -->
  </form>
  <ul class="navbar-nav navbar-right">
    <!--<li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
      <div class="dropdown-menu dropdown-list dropdown-menu-right">
        <div class="dropdown-header">Mensagens
          <div class="float-right">
            <a href="#">Marcar todas como lidas</a>
          </div>
        </div>
        <div class="dropdown-list-content dropdown-list-message">
         
        </div>
      </div>
    </li>
    -->
    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg" id="beep"><i class="far fa-bell"></i></a>
      <div class="dropdown-menu dropdown-list dropdown-menu-right">
        <div class="dropdown-header">Pedidos
        </div>
        <div class="dropdown-list-content dropdown-list-icons">
          <style>
            .pedido-alert{width:100%;display:block;border:1px solid red;padding:10px;border-radius:5px;margin-bottom:10px;}
            .pedido-alert h2{float:right;color:red;}
            .pedido-alert h1{font-weight:lighter;margin:0}

            .res-pedidos a{text-decoration: none;}
          </style>
          <div class="res-pedidos" style="padding:10px">
          </div>
        </div>

      </div>
    </li>
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block nome-header"></div>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <!-- <div class="dropdown-title">Logged in 5 min ago</div>-->
        <a href="perfil.php" class="dropdown-item has-icon">
          <i class="far fa-user"></i> Perfil
        </a>
        <a href="definicoes.php" class="dropdown-item has-icon">
          <i class="fas fa-cog"></i> Definições
        </a>
        <div class="dropdown-divider"></div>
        <a href="sair.php" class="dropdown-item has-icon text-danger">
          <i class="fas fa-sign-out-alt"></i> Sair
        </a>
      </div>
    </li>
  </ul>
</nav>
<!-- COMECA O MENU -->
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">REST</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">Rs</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">The Best</li>
      <li><a class="nav-link" href="index.php"><i class="fas fa-home"></i><span>Inicio</span></a></li>
      <li><a class="nav-link" href="mesas.php"><i class="fas fa-dice-d6"></i></i><span>Mesas</span></a></li>
      <li><a class="nav-link" href="produtos.php"><i class="fab fa-product-hunt"></i> <span>Produtos</span></a></li>
      <li><a class="nav-link" href="reclamacoes.php"><i class="fas fa-file-invoice"></i><span>Reclamações</span></a></li>
      <li><a class="nav-link" href="notificar.php"><i class="fas fa-bell"></i><span>Notificar</span></a></li>
    </ul>

  </aside>
</div>