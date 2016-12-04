<?php 
		
	class createFolder{
		var $path = '';
		var $DS = DIRECTORY_SEPARATOR;
		var $input_string = '';
		var $pwd = '';

	
		public function __construct($pwd = '',$input_string = '')
		{
			$this->input_string =  $input_string;
			$this->pwd =  $pwd;
		}

		public function setInputDir($input_string) {
			$this->input_string =  $input_string;
		}

		public function setDS($ds) {
			$this->DS = $ds;
		}

		public function getDS() {
			return $this->DS;
		}
		  

		public function create(){
			$this->nDir = explode($this->getDS(), $this->input_string);
			foreach ($this->nDir as $key => $value) {
				if (!isset($tmp_)) {
					$tmp_ = $this->getDS().$value;
				}else{
					$tmp_ .= $this->getDS().$value;
				}
				
				$real_path = $this->pwd.$tmp_ ;
				
				$this->createDir(trim($real_path), false);
			}
		}
		    
		public  function createDir($dir, $chdir = false){
			if( !file_exists($dir)) {
				mkdir($dir);
			}else{
				if ($chdir == true) {
					chdir($dir);
				}
			}
		}//end createDir
	}
 ?>