<?php
#CodeIgniter Generate
#	@author Cairo Noleto at Add4 Comunicação
#	@site http://www.caironoleto.com/
#	@email caironoleto@gmail.com
class Generate {
	private $basepath;
	function Generate() {
		print "cake by Cairo Noleto - http://www.caironoleto.com/\n\n";
	}
	function setPath($path) {
		$this->basepath = $path ."/";
	}
	function getPath() {
		return $this->basepath;
	}
	function create($what, $name, $methods = null) {
		$what = strtolower($what);
		$name = strtolower($name);
		if (!file_exists($this->basepath .'system/')) {
			mkdir($this->basepath .'system/');
			chmod($this->basepath .'system/', 0775);
			print "\t\tCreate system/\n";
		} else {
			print "\t\tsystem/ exists\n";
		}
		if (!file_exists($this->basepath .'system/application/')) {
			mkdir($this->basepath .'system/application/');
			chmod($this->basepath .'system/application/', 0775);
			print "\t\tCreate system/application/\n";
		} else {
			print "\t\tsystem/application/ exists\n";
		}
		switch($what) {
			case 'controller':
				$path = $this->basepath .'system/application/controllers/';
				if (!file_exists($path)) {
					mkdir($path);
					chmod($path, 0775);
					print "\t\tCreate system/application/controllers/\n";
				} else {
					print "\t\tsystem/application/controllers/ exists\n";
				}
				$class = ucfirst($name);
				$file = $class .'Controller.php';
				if (!file_exists($path .$file)) {
					$resource = fopen($path .$file, 'w');
					fwrite($resource, "<?php\n");
					fwrite($resource, "class $class" ."Controller extends Controller {\n");
					fwrite($resource, "\tfunction $class" ."Controller() {\n");
					fwrite($resource, "\t\tparent::Controller();\n");
					fwrite($resource, "\t}\n");
					if (is_array($methods)) {
						foreach ($methods as $method) {
							fwrite($resource, "\tfunction $method() {\n");
							fwrite($resource, "\t}\n");
							print "\t\tAdd $method in " .$class ."Controller\n";
							$viewpath = $this->basepath .'system/application/views/';
							if (!file_exists($viewpath)) {
								mkdir($viewpath);
								chmod($viewpath, 0775);
								print "\t\tCreate system/application/views/\n";
							} else {
								print "\t\tsystem/application/views/ exists\n";
							}
							$viewpath .= $name ."_controller/";
							if (!file_exists($viewpath)) {
								mkdir($viewpath);
								chmod($viewpath, 0775);
								print "\t\tCreate system/application/views/$name" ."_controller/\n";
							} else {
								print "\t\tsystem/application/views/$name" ."_controller/ exists\n" ;
							}
							$viewfile = $method ."_view.php";
							$viewresource = fopen($viewpath .$viewfile, 'w');
							fclose($viewresource);
							chmod($viewpath .$viewfile, 0775);
							print "\t\tCreate system/application/views/$name" ."_controller/$viewfile\n";
						}
					}
					fwrite($resource, "}\n");
					fwrite($resource, "?>");
					fclose($resource);
					chmod($path .$file, 0775);
					print "\t\tCreate system/application/controllers/$file\n";
				} else {
					print "\t\tsystem/application/controllers/$file exists\n";
				}
			break;
			case 'model':
				$path = $this->basepath .'system/application/models/';
				if (!file_exists($path)) {
					mkdir($path);
					chmod($path, 0775);
					print "\t\tCreate system/application/models/\n";
				} else {
					print "\t\tsystem/application/models/ exists\n";
				}
				$class = ucfirst($name);
				$file = $class .'.php';
				if (!file_exists($path .$file)) {
					$resource = fopen($path .$file, 'w');
					fwrite($resource, "<?php\n");
					fwrite($resource, "class $class extends Model {\n");
					fwrite($resource, "\tfunction $class() {\n");
					fwrite($resource, "\t\tparent::Model();\n");
					fwrite($resource, "\t}\n");
					if (is_array($methods)) {
						foreach ($methods as $method) {
							fwrite($resource, "\tfunction $method() {\n");
							fwrite($resource, "\t}\n");
							print "\t\tAdd $method in $class\n";
						}
					}
					fwrite($resource, "}\n");
					fwrite($resource, "?>");
					fclose($resource);
					chmod($path .$file, 0775);
					print "\t\tCreate system/application/models/$file\n";
				} else {
					print "\t\tsystem/application/models/$file exists\n";
				}
			break;
		}
		print "\n";
	}
}
?>
