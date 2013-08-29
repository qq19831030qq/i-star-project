<?
defined('API_CACHE') || define('API_CACHE', false);
defined('API_CACHE_EXPIRES') || define('API_CACHE_EXPIRES', 60 * 60);
defined('API_CACHE_DIR') || define('API_CACHE_DIR', MONK_ROOT.'views_c/api_cache');

defined('API_Url') || define('API_Url', 'http://api.monk.com/1');
defined('API_AppKey') || define('API_AppKey', '');
defined('API_UserAgent') || define('API_UserAgent', 'MonkClient');
defined('API_Format') || define('API_Format', 'json');

class api{
	private static $curl = null;
	private static $accessToken = null;
	public static function cache_key($method, $params){
		$key = $method . '?' . http_build_query($params);
		return md5($key);
	}
	public static function get_cache($key){
		$f = API_CACHE_DIR . '/' . $key;
		if(is_file($f) == false) return null;
		if(isset($CACHE) == false){
			$CACHE = array();
		}
		include_once($f);
		if(isset($CACHE[$key]) == false) return null;
		$v = unserialize($CACHE[$key]);
		if( $v['expires'] < microtime(true) ) return null;
		$pb_file = API_CACHE_DIR . '/' . $key . '.pb';
		return file_get_contents($pb_file);
	}
	public static function set_cache($key, $value){
		$f = API_CACHE_DIR . '/' . $key;
		$expires = microtime(true) + API_CACHE_EXPIRES;
		$v = serialize(array('expires'=>$expires, 'value'=>''));
		$fh = fopen($f, 'w');
		fwrite($fh, '<?php $CACHE["' . $key . '"] = \'' . $v . "'; ?>");
		fclose($fh);

		$pb = API_CACHE_DIR . '/' . $key . '.pb';
		$fh1 = fopen($pb, 'w');
		fwrite($fh1, $value);
		fclose($fh1);
	}

	private static function _HttpGet($method, $param = array(), $options = array(), & $httpcode = 200){
		$param['appkey'] = API_AppKey;
		$param['format'] = API_Format;
		$url = API_Url . $method;
		$defaults = array(
			CURLOPT_HTTPHEADER => array('Connection: keep-alive','Keep-Alive: 300','REQUEST_MESSAGE_METHOD: API'),
			CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($param), 
			CURLOPT_HEADER => 0, 
			CURLOPT_AUTOREFERER => true,
			CURLOPT_RETURNTRANSFER => TRUE, 
			CURLOPT_TIMEOUT => 10, 
			CURLOPT_USERAGENT => API_UserAgent
		); 
		
		if(self::$curl == null){
			self::$curl = curl_init();
		}
		$opts = ($options + $defaults);
		if(self::$accessToken != null){
			$opts[CURLOPT_COOKIE] = 'access_token=' . self::$accessToken;
		}
		foreach($opts as $key => $val){
			curl_setopt(self::$curl, $key, $val );
		}
		//curl_setopt_array($ch, $opts);
		if( !$result = curl_exec(self::$curl) ) 
		{ 
			$httpcode = curl_getinfo(self::$curl);
			$err = curl_error(self::$curl);
			return null;
			//return self::HttpGet($url, $param, $options);
		}
		$httpcode = curl_getinfo(self::$curl, CURLINFO_HTTP_CODE);
		if($httpcode == 200){
			return $result;
		}else{
			return NULL;
		}
	}
	private static function _HttpPost($method, $param = array(), $options = array()){
        //var_dump($param);
		$param['appkey'] = API_AppKey;
		$param['format'] = API_Format;
		$url = API_Url . $method;
		$defaults = array(
			CURLOPT_HTTPHEADER => array('Connection: keep-alive','Keep-Alive: 300','REQUEST_MESSAGE_METHOD: API'),
			CURLOPT_POST => 1,
			CURLOPT_HEADER => 0,
			CURLOPT_URL => $url,
			CURLOPT_FRESH_CONNECT => 1,
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_FORBID_REUSE => 1,
			CURLOPT_TIMEOUT => 10,
			CURLOPT_AUTOREFERER => true,
			CURLOPT_POSTFIELDS => $param,
			CURLOPT_USERAGENT => API_UserAgent
		);
		if(self::$curl == null){
			self::$curl = curl_init();
		}
		$opts = ($options + $defaults);
		if(self::$accessToken != null){
			$opts[CURLOPT_COOKIE] = 'access_token=' . self::$accessToken;
		}
		curl_setopt_array(self::$curl, $opts);
		if( !$result = curl_exec(self::$curl) )
		{ 
			$err = curl_error(self::$curl);
			throw new Exception($err);
		}
		$httpcode = curl_getinfo(self::$curl, CURLINFO_HTTP_CODE);
		return array('httpcode'=>$httpcode, 'result'=>$result);
		
	}
	public static function HttpGet($method, $param = array(), $options = array(), & $httpcode = 200){
		if( API_CACHE ){
			$key = self::cache_key($method, $param, $options);
			$return = APIBase::get_cache($key);
			if($return == null){
				$return = self::_HttpGet($method, $param, $options, $httpcode);
				self::set_cache($key, $return);
			}
		}else{
			$return = self::_HttpGet($method, $param, $options, $httpcode);
		}
		return $return;
	}
	public static function HttpPost($method, $param=array(), $options=array()) {
		$result = self::_HttpPost($method, $param, $options);
		if ($result['httpcode'] == 200) {
			return $result['result'];
		}
		return null;
	}

	public static function setAccessToken($_accesstoken){
		self::$accessToken = $_accesstoken;
	}

    public static function parseObject($value, $type){
        if(API_Format == 'pb'){
            $m = new $type();
            $m->ParseFromString($value);
            return $m;
        }else{
            $m = json_decode($value, true);
            return $m;
        }
    }
}


