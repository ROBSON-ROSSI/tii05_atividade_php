<?php
require_once 'dao/BaseDAO.php';
require_once 'entity/Aluno.php';
require_once 'entity/Disciplina.php';
require_once 'config/Database.php';

require_once 'config/Database.php';
//require_once('detalhes_disciplina.php');
class Disciplina {
    private $id;
    private $nome;
    private $cargaHoraria;
    // Implemente o array de alunos que será utilizado pela entidade Disciplina

    public function __construct($id, $nome, $cargaHoraria) {
        $this->id = $id;
        $this->nome = $nome;
        $this->cargaHoraria = $cargaHoraria;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getCargaHoraria() {
        return $this->cargaHoraria;
    }

    public function setCargaHoraria($cargaHoraria) {
        $this->cargaHoraria = $cargaHoraria;
    }

    public function setInserirAluno($id,$nome,$cargaHoraria){

    }

    public function getInserirAluno(){
     $sql =  "SELECT * FROM aluno
        JOIN disciplina_aluno ON aluno.matricula = disciplina_aluno.aluno_id
        JOIN disciplina ON disciplina_aluno.disciplina_id = disciplina.id
        WHERE aluno.matricula = $id";
    }

    // Implemente os getters e setters para as ler e inserir um array de alunos no objeto discplina
}
?>
