<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url('dist/img/favicon.ico')?>">

    <title>Xvision - Histórico de Chamadas</title>

    <!-- Principal CSS do Bootstrap -->
    <link href="<?php echo base_url('vendor/twbs/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">

    <!-- Estilos customizados para esse template -->
    <link href="<?php echo base_url('dist/css/starter-template.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('dist/css/form-validation.css')?>" rel="stylesheet">
  </head>

  <body class="d-flex flex-column h-100">

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?php echo ($this->uri->segment(1) == '' ? 'active' : '')?>">
            <a class="nav-link" href="<?php echo base_url('index.php')?>">Home <?php echo ($this->uri->segment(1) == '' ? '<span class="sr-only">(atual)</span>' : '')?></a>
          </li>
          <li class="nav-item <?php echo ($this->uri->segment(1) == 'ligacoes' ? 'active' : '')?>">
            <a class="nav-link" href="<?php echo base_url('index.php/ligacoes')?>">Cadastro <?php echo ($this->uri->segment(1) == 'ligacoes' ? '<span class="sr-only">(atual)</span>' : '')?></a>
          </li>
          <li class="nav-item <?php echo ($this->uri->segment(1) == 'configuracoes' ? 'active' : '')?>">
            <a class="nav-link" href="<?php echo base_url('index.php/configuracoes')?>">Configurações <?php echo ($this->uri->segment(1) == 'configuracoes' ? '<span class="sr-only">(atual)</span>' : '')?></a>
          </li>
        </ul>
      </div>
    </nav>
    
    <!-- Começa o conteúdo da página -->
    <main role="main" class="flex-shrink-0">