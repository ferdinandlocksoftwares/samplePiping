<?php

final class Curl
{
	private $url = null;
	private $curl_handle = null;
	
	
    public function initCurl($url)
    {
        $this->url = $url;
        
        $this->curl_handle = curl_init();
        $this->_set_options();
        $this->_set_headers();
    }
    
  	public function doPost()
  	{
  		$result = curl_exec($this->curl_handle);
		
        curl_close($this->curl_handle);
        
		return $result;
  	}
  
	private function _set_headers()
	{
		
		$headers = array(
					    "Content-type: x-www-form-urlencoded",
					    "UserAgent" => "PHP Client Library/2015-06-18 (Language=PHP5)"
						);
		curl_setopt($this->curl_handle, CURLOPT_HTTPHEADER, $headers);
	}
	
	private function _set_options()
	{
		curl_setopt($this->curl_handle,CURLOPT_URL, $this->url);			
		curl_setopt($this->curl_handle,CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($this->curl_handle,CURLOPT_SSL_VERIFYPEER, FALSE); 
		curl_setopt($this->curl_handle,CURLOPT_CUSTOMREQUEST, "GET"); 
		
		    
	}
	
}
?>