<?php
	if (!isset($_SESSION)) {
		session_start();

		$id_user = $_SESSION["id_user"];

		require '../processos/config.php';
		require '../processos/connection.php';
		require '../processos/database.php';
		
		$link = DBConnect();
	}
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>.::Site Trio Bagunça::.</title>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/menu.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="js/script.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script> 
	<script type="text/javascript" src="js/script_conteudo.js"></script>
</head>
<body onload="startTime()">
<div id="cabecalho">
	<img src="../img/logo-trio.png" class="logo"/>
	<?php
		$cod = $_SESSION["id_user"];

		if ($_SERVER['HTTP_HOST'] == 'dev.triobagunca.com.br') {
			echo "<h3 style='color: #CD0000; padding: 15px; float: right;'>AMBIENTE DE TESTE</h3>";
		}

		//LÊ DADOS DO BANCO
		$letrio = DBRead ("usuario", "WHERE id_usuario = '$cod'", "*");

		foreach ($letrio as $tr){
			if ($tr['cpf_usuario'] == '000.000.000-00') {
				echo "<script> alert('SEUS DADOS ESTÃO INCOMPLETOS, VERIFIQUE SEU DADOS EM SEU PERFIL E ATUALIZE!') </script>";
			}
		}
	?>
	<nav class="menu_usuario">
      	<ul>
      		<li><a href="#"><?php require "valida_login.php"; ?></a>
            	<ul>
                	<li> <a href="perfil_usuario.php" target="frame"> <i class="fa fa-user-o" aria-hidden="true"></i> Meus Dados </a> </li>
                 	<li> <a href="../processos/logout.php"> <i class="fa fa-sign-out" aria-hidden="true"></i> Sair </a> </li>
            	</ul>
            </li>
        </ul>
    </nav>
</div>
<div id="menu" style="color:#000000;">
<!-- <p class="titulo_menu"> Menu </p> -->
<div id='cssmenu'>
	<ul>
		   <li class='active has-sub'><a href='#'><span>Banners</span></a>
		      <ul>
		         <li><a href="sis_banner.php" target="frame"><i class="fa fa-user-plus" aria-hidden="true"></i> Inserir Banner</a></li>
		         <li><a href="visualizar_banner.php" target="frame"><i class="fa fa-eye" aria-hidden="true"></i>Visualizar Banner</a></li>
		      </ul>
		   </li>
		   <li class='active has-sub'><a href='#'><span>Serviços</span></a>
		      <ul>
		        <li><a href="sis_servicos.php" target="frame"><i class="fa fa-user-plus" aria-hidden="true"></i> Cadastrar Serviços</a></li>
				<li><a href="visualizar_animacao.php" target="frame"><i class="fa fa-eye" aria-hidden="true"></i>Animação Infantil</a></li>
				<li><a href="visualizar_animacoes_online.php" target="frame"><i class="fa fa-eye" aria-hidden="true"></i>Animação Online</a></li>
				<li><a href="visualizar_camarim.php" target="frame"><i class="fa fa-eye" aria-hidden="true"></i>Camarim Fashion</a></li>
				<li><a href="visualizar_historia.php" target="frame"><i class="fa fa-eye" aria-hidden="true"></i>Contação de História</a></li>
		         <li><a href="visualizar_oficina.php" target="frame"><i class="fa fa-eye" aria-hidden="true"></i>Oficina de Slime</a></li>
				<li><a href="visualizar_personagens.php" target="frame"><i class="fa fa-eye" aria-hidden="true"></i>Personagens Vivos</a></li>
				<li><a href="visualizar_pintura.php" target="frame"><i class="fa fa-eye" aria-hidden="true"></i>Pintura de Rosto</a></li>
				<li><a href="visualizar_video_chamada_magica.php" target="frame"><i class="fa fa-eye" aria-hidden="true"></i>Vídeo Chamada Mágica</a></li>
				<li><a href="visualizar_video_personalizado_magico.php" target="frame"><i class="fa fa-eye" aria-hidden="true"></i>Vídeo Personalizado Mágico</a></li>
		      </ul>
		   </li>
		   <li class='active has-sub'><a href='#'><span>Eventos</span></a>
		      <ul>
		         <li><a href="sis_evento.php" target="frame"><i class="fa fa-user-plus" aria-hidden="true"></i>Cadastrar Evento</a></li>
				 <li><a href="visualizar_eventos.php" target="frame"><i class="fa fa-eye" aria-hidden="true"></i>Visualizar Eventos</a></li>
		      </ul>
		   </li>
		   <li class='active has-sub'><a href='#'><span>Clientes</span></a>
		   	  <ul>
		         <li><a href="sis_cliente.php" target="frame"><i class="fa fa-user-plus" aria-hidden="true"></i>Cadastrar Cliente</a></li>
		         <li><a href="visualizar_clientes.php" target="frame"><i class="fa fa-eye" aria-hidden="true"></i>Visualizar Clientes</a></li>
		      </ul>
		   </li>
		   <li class='active has-sub'><a href='#'><span>Indicações</span></a>
		      <ul>
		         <li><a href="sis_parceiro.php" target="frame"><i class="fa fa-user-plus" aria-hidden="true"></i>Cadastrar Indicações</a></li>
		         <li><a href="visualizar_parceiros.php" target="frame"><i class="fa fa-eye" aria-hidden="true"></i>Visualizar Indicações</a></li>
		      </ul>
		   </li>
		   <li class='active has-sub'><a href='#'><span>Galeria de Fotos</span></a>
		      <ul>
		         <li><a href="sis_galeria.php" target="frame"><i class="fa fa-camera" aria-hidden="true"></i> Cadastrar Fotos</a></li>
		         <li><a href="visualizar_galeria.php" target="frame"><i class="fa fa-picture-o" aria-hidden="true"></i> Visualizar Fotos</a></li>
		      </ul>
		   </li>
		   <li class='active has-sub'><a href='#'><span>Recados</span></a>
		      <ul>
		         <li><a href="sis_recados.php" target="frame"><i class="fa fa-envelope" aria-hidden="true"></i>Recados Recebidos</a></li>
		         <li><a href="visualizar_recados.php" target="frame"><i class="fa fa-envelope-open" aria-hidden="true"></i> Recados Aprovados</a></li>
		      </ul>
		   </li>
		   <li class="active has-sub"><a href="#"><span>Usuários do Sistema</span></a>
			  <ul>
				 <li><a href="sis_usuarios.php" target="frame"><i class="fa fa-user-plus" aria-hidden="true"></i>Cadastrar Usuários</a></li>
				  <li><a href="visualizar_usuarios.php" target="frame"><i class="fa fa-eye" aria-hidden="true"></i>Visualizar Usuários</a></li>
				  <?php
						if ($_SERVER['HTTP_HOST'] == 'dev.triobagunca.com.br') {
							echo '<li><a href="../processos/sis_importar_bd.php" target="frame"><i class="fa fa-download" aria-hidden="true"></i> Importar BD Produção</a></li>';
						}
					?>
			  </ul>
		   </li>
	</ul>
</div>
</div>
<iframe id="principal" name="frame">

</iframe>
<div id="rodape">
	<p>Copyright © 2016-<?php date_default_timezone_set('America/Sao_Paulo'); echo date(Y);?>. Todos os direitos reservado </p>
</div>
</body>

<script type="text/javascript" charset="utf-8" async defer>
  function startTime() {
     var today=new Date();
     var h=today.getHours();
     var m=today.getMinutes();
     var s=today.getSeconds();
     // add a zero in front of numbers<10
     m=checkTime(m);
     s=checkTime(s);
     document.getElementById('txt').innerHTML=h+":"+m+":"+s;
     t=setTimeout('startTime()',500);
  }
  function checkTime(i) {
    if (i<10) {
      i="0" + i;
    }
    return i;
  }
</script> 
</html>