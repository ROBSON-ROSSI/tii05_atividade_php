<?php
require_once './dao/AlunoDAO.php';
require_once 'entity/Aluno.php';
require_once 'entity/Disciplina.php';

$alunoDAO = new AlunoDAO();
$alunoID = $_GET['matricula'] ?? null;
$alunos = new Aluno($alunoID,"Robson");
$disciplina = new Disciplina(1,"Robson","8 horas");

if ($alunoID) {
    $aluno = $alunoDAO->getAlunoWithDisciplinas($alunoID);
} else {
    echo "Aluno não encontrado!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Aluno</title>
</head>
<body>
    <h1>Detalhes do Aluno</h1>

    <p><strong>Matrícula:</strong> <?= $alunos->getMatricula(); ?></p>
    <p><strong>Nome:</strong> <?= $alunos->getNome(); ?></p>

    <h2>Disciplinas Matriculadas</h2>
    <ul>
        <?php foreach ($alunos->getDisciplinas() as $disciplina): ?>
            <li><?= $disciplina->getNome(); ?> - <?= $disciplina->getCargaHoraria(); ?> horas</li>
        <?php endforeach; ?>
    </ul>

    <a href="index.php">Voltar</a>
</body>
</html>
