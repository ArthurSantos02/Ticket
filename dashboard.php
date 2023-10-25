<?php
	session_start();

	if(empty($_SESSION)){
		print "<script>location.href='index.php';</script>";
	}

  include('menu.php');

  switch(@$_REQUEST['pag']){
    //departamento
    case 'departamento-cadastrar':
      include('departamento-cadastrar.php');
      break;
    case 'departamento-editar':
      include('departamento-editar.php');
      break;
    case 'departamento-listar':
      include('departamento-listar.php');
      break;
    case 'departamento-salvar':
      include('departamento-salvar.php');
      break;
    //usuario
    case 'usuario-cadastrar':
      include('usuario-cadastrar.php');
      break;
    case 'usuario-editar':
      include('usuario-editar.php');
      break;
    case 'usuario-listar':
      include('usuario-listar.php');
      break;
    case 'usuario-salvar':
      include('usuario-salvar.php');
      break;
  }
?>