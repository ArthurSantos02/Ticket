<h1>Listar Usuário</h1>
<?php
	$sql = "SELECT * FROM usuario u
			INNER JOIN departamento d
			ON u.departamento_id_departamento = d.id_departamento";
	$res = $conn->query($sql);
	/*Acionamento das condições somente se existir retorno do banco*/
	if($res->num_rows > 0){ 
		/*Título da tabela*/
		print "<table class='table table-bordered table-striped table-hover'>";
		print "<tr>";
		print "<th>#</th>";
		print "<th>Departamento</th>";
		print "<th>Usuário</th>";
		print "<th>email</th>";
		print "<th>Tipo</th>";
		print "<th>Ações</th>";
		print "</tr>";
		/*Condicional para imprimir uma linha para cada usuário adicionado*/ 
		while ($row = $res->fetch_object()) { 
			/* Máscara para as opções */
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
			/*Associação dos valores retornados*/
			print "<tr>";
			print "<td>".$row->id_usuario."</td>";
			print "<td>".$row->nome_departamento."</td>";
			print "<td>".$row->nome_usuario."</td>";	
			print "<td>".$row->email."</td>";	
			print "<td>".$tipo."</td>";
			/*Botões de editar e excluir*/
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