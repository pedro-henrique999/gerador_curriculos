
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gerador de Currículo</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css
	" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="script.js"></script>
</head>
<body>
	<div class="logotipo">
		<img src="\img\img.png" alt="logotipo" >
		<h1>GERADOR DE CURRÍCULO</h1><br>
	</div>
	<div class="conteiner">
		<form action="gerar_curriculo.php" method="post">
			<div class=dadosPessoais></div>
			<h3> DADOS PESSOAIS</h3>

			<div class="form">
				<label for="nome">Nome Completo</label>
				<input type="text" id="nome" name="nome" required>
			</div>

			<div class="form">
				<label for="endereco">Endereço:</label>
				<input type="text" id="endereco" name="endereco" required>
			</div>

			<div class="form">
				<label for="email">E-mail:</label>
				<input type="email" id="email" name="email" required>
			</div>

			<div class="form">
				<label for="telefone">Telefone:</label>
				<input type="tel" id="telefone" name="telefone" required>
			</div>
			<div class="form">
				<label for="nascer">Data de Nascimento:</label>
				<input type="date" id="nascer" name="nascer" required>
			</div>
		</div>
		<br><br>
		<div class="dadosPessoais">
			<h3>Experiências Profissionais:</h3>
			<button type="button" class="botao" id="botaoExperiencias">Adicionar mais experiências</button>

			<div id="containerExperiencias">
				<div class="experiencia-item">
					<button type="button" class="btnremover" onclick="this.parentElement.remove()">Remover</button>
					<div class=row>
						<div class="cox">
							<div class="form">
								<label>Empresa:</label>
								<input type="text" name="empresa[]" placeholder="Nome da Empresa">
							</div>
						</div>
						<div class="colx">
							<div class="form">
								<label>Cargo:</label>
								<input type="text" name="cargo[]" placeholder="Seu Cargo:">
							</div>
						</div>
						<div class="colx">
							<div class="form">
								<label>Data de Início</label>
								<input type="month" name="inicio">
							</div>
						</div>
						<div class="colx">
							<div class="form">
								<label>Data de Término</label>
								<input type="month" name="fim[]">
							</div>
						</div>
					</div>
				</div>
				<div class="form">
					<label>Descrição das Atividades:</label>
					<textarea name="descricao[]" rows="3" placeholder="Descreva suas principais atividades:"></textarea>
				</div>
			</div>
		</div>

	</div>
	<div class="dadosPessoais">
		<div class="cabecalho">
			<h3>Formação Acadêmica</h3>
			<button type="button" class="btn-adicionar" id="btn-formacao">Adicionar Curso</button>
		</div>
		<div id="formacao-container">
			<div class="formacao-item">
				<button type="button" class="btnremover" onclick="this.parentElement.remove()">Remover</button>
				<div class="row">
					<div class="colx">
						<div class="form">
							<label>Instituição:</label>
							<input type="text" name="instituicao[]" placeholder="Nome da Instituição">
						</div>
					</div>
					<div class="colx">
						<div class="form">
							<label>Curso:</label>
							<input type="text" name="curso[]" placeholder="Nome do Curso">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="colx">
						<div class="form">
							<label>Data de Início:</label>
							<input type="month" name="inicio_curso[]">
						</div>
					</div>
					<div class="colx">
						<div class="form">
							<label>Data de Término:</label>
							<input type="month" name="fim_curso[]">
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="dadosPessoais">
			<div class="cabecalho">
				<h3>Habilidades</h3>
				<button type="button" class="btn-adicionar" id="btn-habilidade">Adicionar Habilidade</button>
			</div>
			<div id="habilidade-container">
				<div class="habilidade-item">
					<button type="button" class="btnremover" onclick="this.parentElement.remove()">Remover</button>
					<div class="habilidade-input">
						<input type="text" name="habilidades[]" placeholder="Javascript, PHP, Photoshop,etc...">
					</div>
				</div>
			</div>
		</div>
		<div style="text-align: center;">
			<button type="submit">GERAR CURRÍCULO</button>
		</div>
	</div>
</form>
</div>
</body>
</html>