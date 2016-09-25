<?php
 	class Turma{
		private $nomeTurma;
		
		public function __construct($nomeTurma){
                $this->setNomeTurma($nomeTurma);
		}
		public function getNomeTurma(){
			return $this->nomeTurma;
		}
		public function setNomeTurma($nomeTurma){
			return $this->nomeTurma = $nomeTurma;
		}
	}
	
?>
