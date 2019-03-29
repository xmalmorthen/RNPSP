<?php

include "adodb/adodb.inc.php";

class Database {

	private $Connection;
	private $Sql;
	
	public function __construct() {		
		$this->Db = ADONewConnection(_DBController);
	}
	
	public function doConnection($Host = _DBHost, $User = _DBUser, $Pwd = _DBPwd, $Name = _DBName) {		
		if(_DBController == "odbc_mssql") {
			$this->Connection = $this->Db->Connect("Driver={SQL Server}; Server="._DBHost."; Database="._DBName.";", _DBUser, _DBPwd);			
		} elseif(_DBController == "mysql" or _DBController == "mysqli") {
			$this->Connection = $this->Db->Connect($Host, $User, $Pwd, $Name);						
		}
		
		if(!$this->Connection) die("Database Error");
	}
	
	public function Query($Sql) {
		$this->Db->SetFetchMode(ADODB_FETCH_ASSOC);
		if(isset($Sql)) $this->Rs = $this->Db->Execute($Sql);
		return ($this->Rs) ? $this->Rs : false;
	}
			
	public function doInsert($Table, $Fields, $Values) {
		if(!$Table or !$Fields or !$Values) return false;
		$this->Query = "INSERT INTO ".$Table." (".$Fields.") Values (".$Values.")";
		
		return ($this->Db->Execute($this->Query)) ? true : false;
	}

	public function doDelete($Table, $ID) {
		if(!$Table or !$ID)  return false;		
		$this->Query = "DELETE FROM ".$Table." WHERE ID = ".$ID."";
		return ($this->Db->Execute($this->Query)) ? true : false;	
	}
	
	public function deleteBy($Table, $Field, $Value, $Limit = "LIMIT 1") {	
		if(!$Table or !$Field or !$Value) return false;
		if($Limit > 1) $Limit = "LIMIT ".$Limit."";
		$this->Query = "DELETE FROM ".$Table." WHERE ".$Field." = ".$Value." ".$Limit."";
		return ($this->Db->Execute($this->Query)) ? true : false;
	}
		
	public function deleteBySQL($Table, $Sql) {
		if(!$Table or !$Sql)  return false;
		$this->Query = "DELETE FROM ".$Table." WHERE ".$Sql."";
		return ($this->Db->Execute($this->Query)) ? true : false;
	}	
	
	public function doUpdate($Table, $Values, $ID) {
		if(!$Table or !$Values or !$ID)  return false;
		$this->Query = "UPDATE ".$Table." SET ".$Values." WHERE ID = ".$ID." LIMIT 1";
		die($this->Query);
		return ($this->Db->Execute($this->Query)) ? true : false;
	}

	public function updateBySQL($Table, $Values) {
		if(!$Table or !$Values)  return false;		
		$this->Query = "UPDATE ".$Table." SET ".$Values.""; 
		$this->Sql = $this->Db->Execute($this->Query);
		return ($this->Sql) ? true : false;
	}	
	
	public function getFetch() {			
		return (!$this->Rs) ? false : $this->Rs->GetArray();	
	}
		
	public function getRows() {
		return (!$this->Rs) ? false : $this->Rs->RecordCount();	
	}

	public function getLastID() {
		return ($this->Connection) ? $this->Db->Insert_ID() : false; 
	}
		
	public function doEscape($Sql) {
		return addslashes($Sql);	
	}
	
	public function doClean() {
	 	return ($this->Sql) ? $this->Db->Free($this->Sql) : false;
	}
	
	public function Free() {
		return ($this->Rs) ? $this->Rs->Free() : false; 	
	}	

	public function Close() {
		return ($this->Connection) ? $this->Db->Close($this->Connection) : false; 	
	}	
}
?>
