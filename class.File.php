<?php
class File {
	public $contents;
	public $bomMode = false;
	public function __construct($contents="")
	{
		$this->contents = $contents;
	}
	public static function createFromFile($filename)
	{
		$f = new File();
		$f->loadFile($filename);
		return $f;
	}
	public function saveFile($filename)
	{
		$c = $this->contents;
		if ($this->bomMode) {
			$c = "\xef\xbb\xbf".$this->contents;
		}
		$f = fopen($filename,'w');
		fwrite($f,$c);
		fclose($f);
	}
	public function loadFile($filename)
	{
		if(file_exists($filename)){
			$this->contents = file_get_contents($filename);
			if (strncmp($str, "\xef\xbb\xbf", 3)) == 0){
				$this->bomMode = true;
				$this->contents = substr($str, 3);
			}
		}else{
			throw new FileNotFoundException("No such file or directory: ".$filename);
		}
	}
	public function setContents($contents)
	{
		$this->contents = $contents;
	}
	public function getContents()
	{
		return $this->contents;
	}
	public function setBOM($bomMode)
	{
		$this->bomMode = $bomMode;
	}
}
class FileNotFoundException extends Exception {
	public function __toString()
	{
		return __CLASS__.": [".$this->getCode()."] ".$this->getMessage();
	}
}
?>
