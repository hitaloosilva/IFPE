<?php
namespace IFPE\Monitoria\model;

class Curso
{

    private $name;

    private $coordenador;

    private $disciplinas;

    function __construct($name, Professor $coordenador, array $disciplinas = null)
    {
        $this->name = $name;
        $this->coordenador = $coordenador;
        $this->disciplinas = $disciplinas;
    }

    function addDisciplina(Disciplina $disciplina)
    {
        $this->disciplinas[] = $disciplina;
    }
    
    function getDisciplinas() {
        return $this->disciplinas;
    }
}

spl_autoload_register(function ($class_name) {
    include $class_name . '.class.php';
});


$coordenador = new Professor(['name'=>'nome', 'email'=>'email', 'matricula'=>'matricula']);

$curso = new Curso('informática', $coordenador);

$nomeDisc = 'disc';
for ($i = 0; $i < 2; $i++) {
    $dis = new Disciplina($nomeDisc .'-'.$i, $curso, 1);
    $curso->addDisciplina($dis);
}

var_dump($curso->getDisciplinas());
