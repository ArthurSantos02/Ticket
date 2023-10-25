<h1>Cadastrar Usuário</h1>
<form action="?page=dashboard&pag=usuario-salvar" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	<div class="mb-3">
		<label>Departamento</label>
		<?php
			$sql = "SELECT * FROM departamento ORDER BY nome_departamento";
			$res = $conn->query($sql);
			if($res->num_rows > 0){
				print "<select name='departamento_id_departamento' class='form-control' required>";
				print "<option></option>";
				while($row = $res->fetch_object()){
					print "<option value='".$row->id_departamento."'>".$row->nome_departamento."</option>";
				}
				print "</select>";
			}else{
				print "<p>Não há departamento cadastrado</p>";
			}
		?>
	</div>
	<div class="mb-3">
		<label>Usuário</label>
		<input type="text" name="nome_usuario" class="form-control" required>
	</div>
	<div class="mb-3">
		<label>email</label>
		<input type="email" name="email" class="form-control" required>
	</div>
	<div class="mb-3">
		<label>Senha</label>
		<input type="password" name="senha_usuario" class="form-control" required>
	</div>
	<div class="mb-3">
		<label>Tipo</label>
		<select name="tipo_usuario" class="form-control" required>
			<option></option>
			<option value="1">Administrador</option>
			<option value="2">Atendente</option>
			<option value="3">Usuário</option>
		</select>
	</div>
	<div class="mb-3">
		<button class="btn btn-success">Enviar</button>	
	</div>
</form>
