<?php
    class Atividade{
        private $nomeAtividade;
        private $valorAtividade;
        private $bimestreAtividade;
		private $tipoAtividade;
        private $idTurmaAtividade;
    
        public function __construct($nomeAtividade, $valorAtividade, $bimestreAtividade, $tipoAtividade, $idTurmaAtividade){
            $this->setNomeAtividade($nomeAtividade);
            $this->setValorAtividade($valorAtividade);
            $this->setBimestreAtividade($bimestreAtividade);
			$this->setTipoAtividade($tipoAtividade);
            $this->setIdTurmaAtividade($idTurmaAtividade);
        }
        
        public function getNomeAtividade(){
            return $this->nomeAtividade;
        }
        
        public function setNomeAtividade($nomeAtividade){
            $this->nomeAtividade = $nomeAtividade;
        }
        
        public function getValorAtividade(){
            return $this->valorAtividade;
        }
        
        public function setValorAtividade($valorAtividade){
            $this->valorAtividade = $valorAtividade;
        }
        
        public function getBimestreAtividade(){
          return $this->bimestreAtividade;
        }
        
       	public function setBimestreAtividade($bimestreAtividade){
          $this->bimestreAtividade = $bimestreAtividade;
        }

		public function getTipoAtividade(){
            return $this->tipoAtividade;
        }
        
        public function setTipoAtividade($tipoAtividade){
            $this->tipoAtividade = $tipoAtividade;
        }
        
        public function getIdTurmaAtividade(){
            return $this->idTurmaAtividade;
        }
        
        public function setIdTurmaAtividade($idTurmaAtividade){
            $this->idTurmaAtividade = $idTurmaAtividade;
        }
    }
?>