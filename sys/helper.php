<?php
	
	function is_base(){if (APP_W!='/'){return false;}else{return true;}}

	spl_autoload_register(null, false);

	spl_autoload_register('KAutoloader::SysLoader');
	spl_autoload_register('KAutoloader::AppContLoader');
	spl_autoload_register('KAutoloader::AppModLoader');
	spl_autoload_register('KAutoloader::AppVieLoader');

	class KAutoloader{
		static function SysLoader($class){
			$filename = strtolower($class) . '.php';
        	$file =ROOT.'sys'.DS.$filename;
        	if (!file_exists($file))
        	{
            	return false;
        	}
        	include $file;
		}

		static function AppContLoader($class){
			$filename = strtolower($class) . '.php';
        	$file =APP.'controllers'.DS.$filename;
        	
        	if (!file_exists($file))
        	{
            	return false;
        	}
        	require $file;
		}

		static function AppModLoader($class){
			$filename = strtolower($class) . '.php';
        	$file =APP.'models'.DS.$filename;
        	
        	if (!file_exists($file))
        	{
            	return false;
        	}
        	include $file;
		}

		static function AppVieLoader($class){
			$filename = strtolower($class) . '.php';
        	$file =APP.'views'.DS.$filename;
        	
        	if (!file_exists($file))
        	{
            	return false;
        	}
        	require $file;
		}
	}

    class Coder{
	 	static function code($var){
	 		echo '<pre>'.$var.'</pre>';
	 	}
	 	static function code_var($var){
	 		echo '<pre>'.var_dump($var).'</pre>';
	 	}
	}
    class SQLParser{
        
        static function outComments($query){
            $sqlComments = '@(([\'"]).*?[^\\\]\2)|((?:\#|--).*?$|/\*(?:[^/*]|/(?!\*)|\*(?!/)|(?R))*\*\/)\s*|(?<=;)\s+@ms';
            $query = trim( preg_replace( $sqlComments, '$1', $query ) );
            
            if(strrpos($query, ";") === strlen($query) - 1) {
                $query = substr($query, 0, strlen($query) - 1);
            }
            
            return $query;

        }
        public static function parse($content) {

            $sqlList = array();
            
            // Processing the SQL file content 
            $lines = explode("\n", $content);

            $query = "";
            
            // Parsing the SQL file content 
            foreach ($lines as $sql_line):
                $sql_line = trim($sql_line);
                if($sql_line === "") continue;
                else if(strpos($sql_line, "--") === 0) continue;
                else if(strpos($sql_line, "#") === 0) continue;
                    
                $query .= $sql_line;
                if (preg_match("/(.*);/", $sql_line)) {
                    $query = trim($query);
                    $query = substr($query, 0, strlen($query) - 1);
                    $query = SQLParser::outComments($query);
                    $sqlList[] = $query;
                    $query = "";
                }
                
            endforeach;

            return $sqlList;
        }
     
    }
	