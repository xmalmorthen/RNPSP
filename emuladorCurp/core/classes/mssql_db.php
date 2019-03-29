<?php

class MsSQL_Db {
	
	public function connect() {		
		$this->Connection = mssql_connect(_DBHost, _DBUser, _DBPwd);		
							mssql_select_db(_DBName);
		
		if(!$this->Connection) die("Error al intentar conectar a SQL Server");
	}
	
	public function execute($Sql) {
		if(is_null($Sql)) return false;
		$this->Sql = mssql_query($Sql);
		____($this->Sql);
	}
}

//End of file.
