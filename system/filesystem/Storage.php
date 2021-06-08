<?php 
namespace MiniMVC\System;
/**
 * ===============================================================================================
 * STORAGE 
 * @author nagara 
 * ===============================================================================================
 *  
 * storage ada file uploaded system native build from zero
 */
class Storage
{
	private $directory;
	
	#file config
	private $file_name;
	private $file_type;
	private $file_tmp;
	private $file_error;
	private $size;
	private $ext = ["jpg", "jpeg", "png", "gif", "svg"];

	public function __construct()
	{
		$this->directory = __DIR__ . DIRECTORY_SEPARATOR;
	}

	public function Files($name = "")
	{
		try {
			if ($name == "") { 
				echo "file name belum di input";
				exit;
			} else {

				$data = [
					"file_name" => $_FILES[$name]["name"],
					"file_type" => $_FILES[$name]["type"],
					"file_tmp" => $_FILES[$name]["tmp_name"],
					"file_error" => $_FILES[$name]["error"],
					"file_size" => $_FILES[$name]["size"]
				];

				return (object) $data;
			};
		} catch (\Throwable $th) {
			//throw $th;
		}
	}

	public function Already($files)
	{
		try {
			if(file_exists($files)){
				# file sudah ada
				return false;
			}else{
				# file belum ada
				return true;
			}
		} catch (\Throwable $th) {
			//throw $th;
		}
	}

	public function ConvertImage($filename , $extention){
		# convert image tmp to base64
		$file_base64 = base64_encode(file_get_contents($filename));
		$files = 'data:image/' . $extention . ';base64,' . $file_base64;
	}

	public function Upload($filename, $target_directory)
	{
		$files = self::Files($filename);
		$name_of_file = random_file_name($files->file_name);
		$files_path = $target_directory. basename($files->file_name);
		$extention = strtolower(pathinfo($files_path, PATHINFO_EXTENSION));
		
		if (in_array($extention, $this->ext)) {
			# convert image tmp to base64
			self::ConvertImage($files->file_tmp, $extention);
			# check file already exits
			$already = self::Already($target_directory . $name_of_file);

			if ($already == false) echo "gagal";
			if ($already == true) { 
				if ( move_uploaded_file($files->file_tmp, $target_directory . $name_of_file)) {
					echo "gambar berhasil di upload ";
					return $files->file_error;
				} else{
					echo "Sorry, there was an error uploading your file.";
				}
			};

		}
	}

	public function RemoveFile($path_file_name = "")
	{
		# check jika file tidak ada.
		if ( !file_exists($path_file_name) ) {
			// echo "file tidak ada";
			return false;
		}else {
			unlink($path_file_name);
			// echo "success file berhasil di hapus";
			return true;
		}
	}

	public function UpdateFile($path_old_files, $path_new_files, $target_directory){
		#check file exist
		if (!file_exists($path_old_files)) {
			echo "maaf, filenya ". htmlspecialchars($path_old_files) ." tidak ada dalam direactory check nama filenya di controllernya";
			exit;
		};

		# remove file
		$success = self::RemoveFile($path_old_files);
		# move tmpt file ke dir temp
		if ($success == true) {
			self::Upload($path_new_files, $target_directory);
			echo "gambar berhasil di update";
			return true; 
		}
	}
}
