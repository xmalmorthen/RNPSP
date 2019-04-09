<?php

class HTTPRequest {
	public $Fp;        
	public $Url;      
	public $Host;     
	public $Protocol; 
	public $Uri;      
	public $Port;     
	
	public function __construct($Url) {
		$this->Url = $Url;
		$this->scanUrl();
	}
	
	public function scanUrl() {
		$Pos = strpos($this->Url, '://');
		$this->Protocol = strtolower(substr($this->Url, 0, $Pos));

		$Req = substr($this->Url, $Pos + 3);
		$Pos = strpos($Req, '/');
		
		if($Pos === false) $Pos = strlen($Req);
		
		$Host = substr($Req, 0, $Pos);

		if(strpos($Host, ':') !== false) {
			list($this->Host, $this->Port) = explode(':', $Host);
		} else {
			$this->Host = $Host;
			$this->Port = ($this->Protocol == 'https') ? 443 : 80;
		}

		$this->Uri = substr($Req, $Pos);
		
		if($this->Uri == '') $this->Uri = '/';
	}

	function downloadToString() {
		$Crlf = "\r\n";
		$Response = "";
				
		$Req = 'GET ' . $this->Uri . ' HTTP/1.0' . $Crlf . 'Host: ' . $this->Host . $Crlf . $Crlf;
		
		$this->Fp = fsockopen(($this->Protocol == 'https' ? 'ssl://' : '') . $this->Host, $this->Port, $Errno, $Errstr, 8);
		if($Errno != false or $Errstr != false) return true;
				
		fwrite($this->Fp, $Req);

		while(is_resource($this->Fp) and isset($this->Fp) and !feof($this->Fp)) {
			$Response .= @fread($this->Fp, 1024);
		}
		
		fclose($this->Fp);

		$Pos = strpos($Response, $Crlf . $Crlf);
		
		if($Pos === false) return($Response);
		
		$Header = substr($Response, 0, $Pos);
		$Body   = substr($Response, $Pos + 2 * strlen($Crlf));

		$Headers = array();
		$Lines = explode($Crlf, $Header);
		
		foreach($Lines as $Line) {
			if(($Pos = strpos($Line, ':')) !== false) {
				$Headers[strtolower(trim(substr($Line, 0, $Pos)))] = trim(substr($Line, $Pos + 1));
			}
		}
				
		if(isset($Headers['location'])) {
			$Http = new HTTPRequest($Headers['location']);
			return $http->downloadToString($http);
		} else {
			return $Body;
		}
	}
}

//End of file.
