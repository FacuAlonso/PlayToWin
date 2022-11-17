<?php
function recibirArchivo(){
	// almacena en el directorio $target_dir el archivo que se encuentra
	// en la variable global $_FILES
	//
	// $target_dir Es el nombre del directorio donde se almacena el archivo subido
	//
	$target_dir = "../../portadas/"; 
    $nomArch = preg_replace('/\s+/', '_', basename($_FILES["fileToUpload"]["name"]));
	$target_file = $target_dir . $nomArch;
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$result=null;
	$msj="";

	// Check if file name is empty
	if ($target_file==$target_dir) {
		$msj= ", file name empty.";
		$uploadOk = 0;
	}

	// Check if file already exists
	if (file_exists($target_file)) {
		$msj= ", file already exists.";
		$uploadOk = 0;
	}

	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000 && $uploadOk ) {
		$msj= ", your file is too large.";
		$uploadOk = 0;
	}

	// Allow certain file formats
	
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" && $uploadOk ) {
			$msj= ", only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
	
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$msj= "Sorry, your file was not uploaded".$msj;
		$uploadOk = 0;
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			   $msj= "The file ".$nomArch. " has been uploaded.";
			} else {
			   $msj= "Sorry, there was an error uploading your file.";
			   $uploadOk = 0;
			}
	}
	
	$result=['filename'=>$nomArch,'message'=>$msj,'uploadOk'=>$uploadOk];
	return $result;
}



?>