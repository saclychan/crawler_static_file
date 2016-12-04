<?php 
	$dir = dirname(__FILE__);

	include_once 'lib/createFolder.php';
	//$path = 'AABC\DEF\GHI\KLM';
	
	//$i->setDS(DIRECTORY_SEPARATOR);
	
	$i = new createFolder($dir);
	

	$file_path = $dir.'/bill.html';
	$strcontent = file_get_contents($file_path);

	preg_match_all("/http(s?)\:\/\/([^\s]*)(\.png|\.jpg|\.gif|\.css|\.js)/mi", $strcontent, $output_array);
	$unique_path =array();
	if(isset($output_array[0]) && is_array($output_array[0]) && !empty($output_array[0])){

	    foreach ($output_array[0] as $key => $value) {
	    	$file_path_one = $value;
	    	$file_path_trim_protocol = preg_replace("/http(s?)\:\/\/([^\s\/]*)\//", "", $file_path_one);

	    	echo $file_path_one .'<br>';
	    	echo $file_path_trim_protocol .'<br>';
	        $last_slash = strrpos($file_path_trim_protocol,'/');
	    	$path_need_create =  substr($file_path_trim_protocol, 0, $last_slash);
	    	$_file_path_one = preg_replace("/\//", DIRECTORY_SEPARATOR, $path_need_create);
	    	echo $_file_path_one.'<br>';
	    	echo '===================================<br>';
	    	$i->setInputDir($_file_path_one);
	    	$i->create();
	    	file_put_contents($file_path_trim_protocol, file_get_contents($file_path_one));
	    	//echo '_file_path_one '.$_file_path_one;
	    	if (!in_array($_file_path_one, $unique_path)) {
	    		$unique_path[] = $_file_path_one;
	    	}	
	    		
	    	
	    }
	}//end if

	foreach ($unique_path as $kk => $vv) {
		$i->setInputDir($vv);
		$i->create();
	}
	
 ?>