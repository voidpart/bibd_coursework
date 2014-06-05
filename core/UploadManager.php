<?php 

class UploadManager
{
	public $upload_dir;
	public $upload_url;

	function __construct($dir, $url) {
		$this->upload_url = $url;
		$this->upload_dir = $dir;
	}

	public function saveFile($file)
	{
		$prefix = time();
		$upload_name = $prefix.'_'.$file['name'];
		$upload_path = $this->getFilePath($upload_name);
		var_dump($upload_path);
		move_uploaded_file($file['tmp_name'], $upload_path);

		return $upload_name;
	}

	public function getFilePath($filename)
	{
		return $this->upload_dir.$filename;
	}

	public function getFileUrl($filename)
	{
		if($filename === NULL)
			return NULL;
		return $this->upload_url.$filename;
	}
}

?>