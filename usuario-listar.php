<h1>Listar Usuário</h1>
<?php
	$sql = "SELECT * FROM usuario";
	$res = $conn->query($sql);
	if($res->num_rows > 0){
		print "<table class='table table-bordered table-striped table-hover'>";
		print "<tr>";
		print "<th>#</th>";
		print "<th>Usuário</th>";
		print "<th>Tipo</th>";
		print "<th>Ações</th>";
		print "</tr>";
		while ($row = $res->fetch_object()) {
			switch($row->tipo_usuario){
				case '1':
					$tipo = "Administrador";
				break; 
				case '2':
					$tipo = "Atendente";
				break;
				case '3':
					$tipo = "Usuário";
				break;
			}
			print "<tr>";
			print "<td>".$row->id_usuario."</td>";
			print "<td>".$row->nome_usuario."</td>";
			print "<td>".$tipo."</td>";
			print "<td>
					  <button onclick=\"location.href='?page=dashboard&pag=usuario-editar&id_usuario=".$row->id_usuario."';\" class='btn btn-success'>Editar</button>
					  <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=dashboard&pag=usuario-salvar&acao=excluir&id_usuario=".$row->id_usuario."';}else{false;}\"  class='btn btn-danger'>Excluir</button>
				   </td>";
			print "</tr>";
		}
		print "</table>";
	}else{
		print "<p>Não foram encontrados usuários</p>";
	}
?>