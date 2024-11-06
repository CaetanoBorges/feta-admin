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
    
  </form>
  <ul class="navbar-nav navbar-right">
     <form class="form-inline mr-auto">
       
    <div class="search-element" >
      <button class="btn" type="reset" style="border-radius: 20px 0 0 20px;min-height: 30px;height: 30px;padding:0 10px;background: #F5F7FA;"><i class="fas fa-search" style="opacity: .4;"></i></button>
      <input class="form-control" type="search" placeholder="Pesquisar cliente" aria-label="Search" data-width="250" style="border-radius: 0 20px 20px 0;margin-left: -10px;min-height: 30px;height: 30px;background: #F5F7FA;">
      
    </div>
    
  </form>
    <li ><a href="#"  class="nav-link nav-link-lg nav-link-user">
        <button class="btn rounded-circle mr-1" type="reset" style="width: 30px;height: 30px;padding: 0px;background: #F5F7FA;"><i class="fas fa-cog" style="opacity: .4;margin-top:-1.5px"></i></button>
        <div class="d-sm-none d-lg-inline-block nome-header"></div>
      </a>
     
    </li>
  </ul>
</nav>
<!-- COMECA O MENU -->
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.php">FETA FÁCIL</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html"></a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header"></li>
      <li><a class="nav-link" href="index.php"><i class="fas fa-home"></i><span>Inicio</span></a></li>
      <li><a class="nav-link" href="levantamento.php"><i class="fas fa-file-invoice-dollar"></i><span>Levantamento</span></a></li>
      <li><a class="nav-link" href="deposito.php"><i class="fas fa-hand-holding-usd"></i> <span>Deposito</span></a></li>
      <li><a class="nav-link" href="ativos.php"><i class="fas fa-chart-line"></i><span>Ativos</span></a></li>
      <li><a class="nav-link" href="agentes.php"><i class="fas fa-user"></i><span>Agentes</span></a></li>
    </ul>

  </aside>
</div>