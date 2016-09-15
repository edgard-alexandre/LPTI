<?php
    class Aluno{
        private $nomeAluno;
        private $matricula;
        private $frequencia;
		private $idTurmaAluno;
    
        public function __construct($nomeAluno, $matricula, $frequencia, $idTurmaAluno){
            $this->setNomeAluno($nomeAluno);
            $this->setMatricula($matricula);
            $this->setFrequencia($frequencia);
			$this->setIdTurmaAluno($idTurmaAluno);
        }
        
        public function getNomeAluno(){
            return $this->nomeAluno;
        }
        
        public function setNomeAluno($nomeAluno){
            $this->nomeAluno = $nomeAluno;
        }
        
        public function getMatricula(){
            return $this->matricula;
        }
        
        public function setMatricula($matricula){
            $this->matricula = $matricula;
        }
        
        public function getFrequencia(){
            return $this->frequencia;
        }
        
        public function setFrequencia($frequencia){
            $this->frequencia = $frequencia;
        }

		public function getIdTurmaAluno(){
            return $this->idTurmaAluno;
        }
        
        public function setIdTurmaAluno($idTurmaAluno){
            $this->idTurmaAluno = $idTurmaAluno;
        }
    }
?>
