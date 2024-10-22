<?php
require_once 'dao/DisciplinaDAO.php';
require_once 'entity/Disciplina.php';
require_once 'dao/AlunoDAO.php';

$disciplinaDAO = new DisciplinaDAO();

$alunos = new AlunoDAO();

$disciplinaID = $_GET['id'] ?? null;
$disciplinas = new Disciplina($disciplinaID,"Programação em PHP","8 horas");
$aluno = new Aluno($disciplinaID,'Robson');

if ($disciplinaID) {
    $disciplina = $disciplinaDAO->getDisciplinaWithAlunos($disciplinaID);
    $professores = $disciplinaDAO->getProfessoresForDisciplina($disciplinaID);
} else {
    echo "Disciplina não encontrada!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Disciplina</title>
</head>
<body>
    <h1>Detalhes da Disciplina</h1>

    <p><strong>ID:</strong> <?= $disciplinas->getId(); ?></p>
    <p><strong>Nome:</strong> <?= $disciplinas->getNome(); ?></p>
    <p><strong>Carga Horária:</strong> <?= $disciplinas->getCargaHoraria(); ?> horas</p>

    <h2>Alunos Matriculados</h2>
    <ul>
        <?php foreach ($disciplinas->getAlunos() as $aluno): ?>
            <li><?= $aluno->getNome(); ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Professores que Lecionam Esta Disciplina</h2>
    <ul>
        <?php foreach ($professores as $professor): ?>
            <li><?= $professor->getNome(); ?></li>
        <?php endforeach; ?>
    </ul>

    <a href="index.php">Voltar</a>
</body>
</html>
