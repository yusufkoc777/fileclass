<?php
class File {
	public $contents;
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
		$f = fopen($filename,'w');
		fwrite($f,$this->contents);
		fclose($f);
	}
	public function loadFile($filename)
	{
		if(file_exists($filename)){
			$this->contents = file_get_contents($filename);
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
}
class FileNotFoundException extends Exception {
	public function __toString()
	{
		return __CLASS__.": [".$this->getCode()."] ".$this->getMessage();
	}
}
?>
