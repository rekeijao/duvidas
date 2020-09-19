<?php
session_start();
require "sessao_time.php"; 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sem título</title>
<link href="../css/style.css" type="text/css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<style>
body {
	background-color: transparent;
}
</style>
</head>

<body>
<div id="container" style="padding-left: 8%;">
<center>
<h3>CLIENTES CADASTRADOS</h3>
<?php
require '../processos/config.php';
require '../processos/connection.php';
require '../processos/database.php';

  $numreg = 20; // Quantos registros por página vai ser mostrado

  $pg = isset($_GET["pg"]) ? $_GET["pg"] : 1;
  $inicial = ($pg * $numreg) - $numreg; 
  
  // Serve para contar quantos registros você tem na seua tabela para fazer a paginação
  $sql = DBRead ("clientes_vips");
  $countTotal = count($sql);  // Quantidade de registros pra paginação

     //LÊ DADOS DO BANCO
  $lojas = DBRead ("clientes_vips", "ORDER BY id_cliente_vip DESC LIMIT $inicial, $numreg", "*");

  foreach ($lojas as $lj) {
?>
<center>
<table width="20%" border="0" cellpadding="0" cellspacing="0" class="tablesis">
<tr onmouseover="ChangeColor(this, true);" onmouseout="ChangeColor(this, false);" onclick="DoNav('altera_linhas.php?id=<?php echo $lj['id_cliente_vip'];?>');">
    <td class="linha" align="center" valign="middle">
      <?php echo "<img src='../img/clientes_vips/".$lj['img_cliente_vip']."' class='imgserv' width=\"200\" height=\"200\">";?>
        <a href="javascript:aviso('<?=$lj['id_cliente_vip'];?>');" id="excluir">
          <i class="fa fa-trash fa-2x" aria-hidden="true" title="Exluir"></i>
        </a>
    </td>
</tr>
</table>
</center>
<script language= 'javascript'>
<!--
function aviso(id) {
  if (confirm ("Deseja realmente excluir?")) {
      window.location.href = "../processos/bd_delet_clientes_vips.php?id="+id;
  }
  else {
    location.href=('visualizar_clientes.php')
  }
}
//-->
</script>
<?php
  }
?>
</center>
<div id="paginacao">
<?php
    if ($countTotal > $numreg) {
       include("../paginacao.php"); // chamada do arquivo. ex: << Anterior 1 2 3 4 5 Próxima >>
    }
  ?>
</div>
</center>
</div>
</body>
</html>
