<?php
	class database{

		public $host = DB_HOST;
		public $user = DB_USER;
		public $pass = DB_PASS;
		public $db_name = DB_NAME;


		public $link;
		public $error;

		public function __construct(){ 

		
			$this->connectDB();

		}

		public function connectDB(){
			
			$this->link = new mysqli($this->host, $this->user, $this->pass,  $this->db_name);
			
			if(!$this->link){

					$this->error = "Connection error".$this->link->connect_error;
					return false;
					}
		} /*End of connectdb*/

		

		// /*Read Data*/

		public function select($query){

			$result = $this->link->query($query) or die($this->link->error._LINE_);

			if($result->num_rows>0){

				return $result;
			}else
				{
					return false;
				}

		} /*End of Select*/

		public function insert($query){

			$insert_row = $this->link->query($query) or die($this->link->error._LINE_);

			if($insert_row){

				header("Location:index.php?msg=".urlencode('Data Inserted Succesfully.'));
			}

			else

			{
				
				$this->error = die("Error:(".$this->link->errorno.")").$this->link->error;
			}

		}//End of Insert

	} /*end of class*/
