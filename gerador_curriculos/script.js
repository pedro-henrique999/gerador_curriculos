function addExperiencia(){
	const container = document.getElementById('containerExperiencias');
	container.innerHTML += `
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
	`;
}

function addFormacao(){
	const container = document.getElementById('formacao-container');
	container.innerHTML +=`
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
	`;
}
function addHabilidade(){
	const container = document.getElementById('habilidade-container');
	container.innerHTML +=`
		<div class="habilidade-item">
					<button type="button" class="btnremover" onclick="this.parentElement.remove()">Remover</button>
					<div class="habilidade-input">
						<input type="text" name="habilidades[]" placeholder="Javascript, PHP, Photoshop,etc...">
					</div>
		</div>
	`;
}
document.addEventListener('DOMContentLoaded',function(){
	document.getElementById('botaoExperiencias').onclick = addExperiencia;
	document.getElementById('btn-formacao').onclick = addFormacao;
	document.getElementById('btn-habilidade').onclick = addHabilidade;
});