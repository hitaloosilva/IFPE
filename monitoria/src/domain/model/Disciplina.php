<?php
namespace IFPE\Monitoria\model;

/**
 * 
 * @author Hitalo Silva
 *
 */
class Disciplina
{
    
    private $nome;
    private $curso;
    private $periodo;
    private $cargaHoraria;
    private $ementa;
    
    function __construct($nome, Curso $curso, int $periodo){
        $this->nome = $nome;
        $this->curso = $curso;
        $this->periodo = $periodo;
    }
    
    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return Curso
     */
    public function getCurso()
    {
        return $this->curso;
    }

    /**
     * @return int
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @param Curso $curso
     */
    public function setCurso($curso)
    {
        $this->curso = $curso;
    }

    /**
     * @param int $periodo
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;
    }
    /**
     * @return mixed
     */
    public function getCargaHoraria()
    {
        return $this->cargaHoraria;
    }

    /**
     * @return mixed
     */
    public function getEmenta()
    {
        return $this->ementa;
    }

    /**
     * @param mixed $cargaHoraria
     */
    public function setCargaHoraria($cargaHoraria)
    {
        $this->cargaHoraria = $cargaHoraria;
    }

    /**
     * @param mixed $ementa
     */
    public function setEmenta($ementa)
    {
        $this->ementa = $ementa;
    }

   
}


