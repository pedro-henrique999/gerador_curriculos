<?php
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Coleta de dados do formulário
    $dados = [
        'nome' => $_POST['nome'],
        'endereco' => $_POST['endereco'],
        'email' => $_POST['email'],
        'telefone' => $_POST['telefone'],
        'data_nascimento' => $_POST['nascer'],
        'data_criacao' => date('d/m/Y H:i:s')
    ];
    
    // Experiências
    $dados['experiencias'] = [];
    if (isset($_POST['empresa'])) {
        for ($i = 0; $i < count($_POST['empresa']); $i++) { 
            if (!empty($_POST['empresa'][$i])) {
                $dados['experiencias'][] = [
                    'empresa' => $_POST['empresa'][$i],
                    'cargo' => $_POST['cargo'][$i],
                    'inicio' => $_POST['inicio'][$i],
                    'fim' => $_POST['fim'][$i],
                    'descricao' => $_POST['descricao'][$i] 
                ];
            }
        }
    }
    
    // Formações
    $dados['formacoes'] = [];
    if (isset($_POST['instituicao'])) {
        for($i = 0; $i < count($_POST['instituicao']); $i++) {
            if (!empty($_POST['instituicao'][$i])) { // CORRIGIDO: faltava [$i]
                $dados['formacoes'][] = [
                    'instituicao' => $_POST['instituicao'][$i],
                    'curso' => $_POST['curso'][$i],
                    'inicio' => $_POST['inicio_curso'][$i],
                    'fim' => $_POST['fim_curso'][$i]
                ];
            }
        }
    }
    
    // Habilidades
    $dados['habilidades'] = [];
    if (isset($_POST['habilidades'])) {
        foreach ($_POST['habilidades'] as $hab) { 
            if(!empty(trim($hab))) {
                $dados['habilidades'][] = trim($hab);
            }
        }
    }
    
    // Criar pasta se não existir
    if (!is_dir('curriculos')) {
        mkdir('curriculos', 0777, true);
    }
    
    // Salvar em arquivo
    $nome_arquivo = 'curriculos/curriculo_' . date('Y-m-d_H-i-s') . '.txt';
    $conteudo = "CURRÍCULO SALVO\n";
    $conteudo .= "================\n\n";
    $conteudo .= "Nome: " . $dados['nome'] . "\n";
    $conteudo .= "Endereço: " . $dados['endereco'] . "\n";
    $conteudo .= "Email: " . $dados['email'] . "\n";
    $conteudo .= "Telefone: " . $dados['telefone'] . "\n";
    $conteudo .= "Data Nascimento: " . $dados['data_nascimento'] . "\n";
    $conteudo .= "Data Criação: " . $dados['data_criacao'] . "\n\n";

    // Experiências
    if (!empty($dados['experiencias'])) {
        $conteudo .= "EXPERIÊNCIAS:\n";
        foreach($dados['experiencias'] as $exp) {
            $conteudo .= "- " . $exp['cargo'] . " na " . $exp['empresa'] . "\n";
            $conteudo .= "  Período: " . $exp['inicio'] . " a " . ($exp['fim'] ?: 'Atual') . "\n";
            $conteudo .= "  Descrição: " . $exp['descricao'] . "\n\n";
        }
    }
    
    // Formações
    if(!empty($dados['formacoes'])) {
        $conteudo .= "FORMAÇÃO:\n";
        foreach ($dados['formacoes'] as $form) {
            $conteudo .= "- " . $form['curso'] . " - " . $form['instituicao'] . "\n";
            $conteudo .= "  Período: " . $form['inicio'] . " a " . ($form['fim'] ?: 'Cursando') . "\n\n";
        }
    }
    
    // Habilidades
    if (!empty($dados['habilidades'])) {
        $conteudo .= "HABILIDADES:\n";
        foreach ($dados['habilidades'] as $hab) {
            $conteudo .= "- " . $hab . "\n";
        }
    }
    
    // Salvar arquivo
    file_put_contents($nome_arquivo, $conteudo);

    // Mostrar mensagem de sucesso
    $mensagem = "Currículo salvo em: " . $nome_arquivo;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Currículo Gerado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { padding: 20px; background: #f8f9fa; }
        .curriculo { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 10px #ccc; max-width: 800px; margin: 0 auto; }
        .secao { margin-bottom: 25px; }
        .secao h3 { color: #9a69bf; border-bottom: 2px solid #9a69bf; padding-bottom: 5px; } 
        .item { margin-bottom: 15px; padding: 10px; background: #f8f9fa; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="curriculo">
        <?php if (isset($mensagem)): ?>
            <div class="alert alert-success">
             <?php echo $mensagem; ?>
            </div>
        <?php endif; ?>

        <h1 class="text-center"><?php echo htmlspecialchars($dados['nome']); ?></h1>
        <p class="text-center">
            <?php echo htmlspecialchars($dados['endereco']); ?> | 
            <?php echo htmlspecialchars($dados['email']); ?> | 
            <?php echo htmlspecialchars($dados['telefone']); ?>
        </p>

        <?php if (!empty($dados['experiencias'])): ?>
        <div class="secao">
            <h3>Experiência Profissional</h3>
            <?php foreach ($dados['experiencias'] as $exp): ?>
                <div class="item">
                    <strong><?php echo htmlspecialchars($exp['cargo']); ?></strong><br>
                    <em><?php echo htmlspecialchars($exp['empresa']); ?></em><br>
                    <?php echo $exp['inicio']; ?> - <?php echo $exp['fim'] ?: 'Atual'; ?><br>
                    <?php echo nl2br(htmlspecialchars($exp['descricao'])); ?>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($dados['formacoes'])): ?> 
        <div class="secao">
            <h3>Formação Acadêmica</h3>
            <?php foreach ($dados['formacoes'] as $form): ?>
                <div class="item">
                    <strong><?php echo htmlspecialchars($form['curso']); ?></strong><br>
                    <em><?php echo htmlspecialchars($form['instituicao']); ?></em><br>
                    <?php echo $form['inicio']; ?> - <?php echo $form['fim'] ?: 'Cursando'; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if (!empty($dados['habilidades'])): ?>
        <div class="secao">
            <h3>Habilidades</h3>
            <?php foreach ($dados['habilidades'] as $hab): ?>
                <span style="background: #9a69bf; color: white; padding: 5px 10px; border-radius: 15px; display: inline-block; margin: 2px;">
                    <?php echo htmlspecialchars($hab); ?>
                </span>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <div class="text-center mt-4">
            <button onclick="window.print()" class="btn btn-success">Imprimir</button>
            <a href="index.php" class="btn btn-primary">Novo Currículo</a>
        </div>
    </div>
</body>
</html>