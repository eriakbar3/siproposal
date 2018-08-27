<?php 

class General_Default 
{
	
	public function die404() 
	{
		header('HTTP/1.1 404 Not Found');
		die('
			<h1>Unable to find requested file</h1>
			<p>
				You attempted to access '.htmlspecialchars($_SERVER['REQUEST_URI']).'
				Which does not exist on this server.
			</p><p>
				Please access the <a href="/">main page of this site</a> instead.
			</p>
		');
	}

	public function clean($dir_file)
	{
		$URL = str_replace(
			array( '\\', '../' ),
			array( '/',  '' ),
			$_SERVER['REQUEST_URI']
		);

		if ($offset = strpos($URL,'?')) {
			$URL = substr($URL,0,$offset);
		} else if ($offset = strpos($URL,'#')) {
			$URL = substr($URL,0,$offset);
		}
			
		$chop = -strlen(basename($_SERVER['SCRIPT_NAME']));
		define('DOC_ROOT',substr($_SERVER['SCRIPT_FILENAME'],0,$chop));
		define('URL_ROOT',substr($_SERVER['SCRIPT_NAME'],0,$chop));

		if (URL_ROOT != '/') $URL=substr($URL,strlen(URL_ROOT));

		$URL = trim($URL,'/');

		if (
			file_exists(DOC_ROOT.'/'.$URL) &&
			($_SERVER['SCRIPT_FILENAME'] != DOC_ROOT.$URL) &&
			 ($URL != '') &&
			 ($URL != 'index.php')
		) die404();

		$ACTION = (
			($URL == '') ||
			($URL == 'index.php') ||
			($URL == 'index.html')
		) ? array('home') : explode('/',html_entity_decode($URL));

		$includeFile = $dir_file.'/'.preg_replace('/[^\w]/','',$ACTION[0]).'.php';

		if (is_file($includeFile)) {
			include($dir_file.'/header.php');
			include($includeFile);
			include($dir_file.'/footer.php');
		} else {
			header("Location: 404");
		};
	}

	public function send_email()
	{

		require_once "vendor/autoload.php";

		$mail = new PHPMailer;

		//Enable SMTP debugging. 
		$mail->SMTPDebug = 3;                               
		//Set PHPMailer to use SMTP.
		$mail->isSMTP();            
		//Set SMTP host name                          
		$mail->Host = "smtp.gmail.com";
		//Set this to true if SMTP host requires authentication to send email
		$mail->SMTPAuth = true;                          
		//Provide username and password     
		$mail->Username = "name@gmail.com";                 
		$mail->Password = "super_secret_password";                           
		//If SMTP requires TLS encryption then set it
		$mail->SMTPSecure = "tls";                           
		//Set TCP port to connect to 
		$mail->Port = 587;                                   

		$mail->From = "name@gmail.com";
		$mail->FromName = "Full Name";

		$mail->addAddress("name@example.com", "Recepient Name");

		$mail->isHTML(true);

		$mail->Subject = "Subject Text";
		$mail->Body = "<i>Mail body in HTML</i>";
		$mail->AltBody = "This is the plain text version of the email content";

		if(!$mail->send()) 
		{
		    echo "Mailer Error: " . $mail->ErrorInfo;
		} 
		else 
		{
		    echo "Message has been sent successfully";
		}
	}

	public function to_rupiah($cost)
	{
		$script = "Rp.".number_format($cost, 0, ',', '.');
		return $script;
	}

	public function convert_rupiah($cost){
		$script = str_replace('Rp', '', str_replace('.', '', $cost));
		return $script;
	}

	public function generate_number_code($num){
		$val = '';
		for ($i=0; $i < $num; $i++) { 
			$val .= rand(1,9);
		}
		return $val;
	}

	public function upload_img_width_resize($newName,$file,$dir,$newWidth) {

		$file_temp 		= $_FILES[$file]["tmp_name"];
		$file_upload 	= $_FILES[$file]["name"];
		
		if (!empty($file_temp)) {

			move_uploaded_file($file_temp, $dir.$file_upload);

			$vdir_upload = $dir;
		    $originalFile = $vdir_upload . $file_upload;

			$info = getimagesize($originalFile);
		    $mime = $info['mime'];

		    switch ($mime) {
		            case 'image/jpeg':
		                    $image_create_func = 'imagecreatefromjpeg';
		                    $image_save_func = 'imagejpeg';
		                    $new_image_ext = 'jpg';
		                    $callback = true;
		                    break;

		            case 'image/png':
		                    $image_create_func = 'imagecreatefrompng';
		                    $image_save_func = 'imagepng';
		                    $new_image_ext = 'png';
		                    $callback = true;
		                    break;

		            case 'image/gif':
		                    $image_create_func = 'imagecreatefromgif';
		                    $image_save_func = 'imagegif';
		                    $new_image_ext = 'gif';
		                    $callback = true;
		                    break;

		            default: 
		                    $callback = false;
		    }

		    if ($callback == true) {
			    $img = $image_create_func($originalFile);
			    list($width, $height) = getimagesize($originalFile);

			    $newHeight = ($height / $width) * $newWidth;
			    $tmp = imagecreatetruecolor($newWidth, $newHeight);
			    imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

			    if (file_exists($originalFile)) {
			            unlink($originalFile);
			    }
			    $image_save_func($tmp, "$dir/$newName.$new_image_ext");
			    return $newName = $newName.$new_image_ext;
			}else {
			    if (file_exists($originalFile)) {
			        unlink($originalFile);
			        $actual_link = isset($_SERVER['HTTPS']) ? "https://" : "http://";
			        $url = $actual_link . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>
			        <script type="text/javascript">
			        	window.alert("File yang diupload tidak sesuai dengan ekstensi, pilih ekstensi (JPG,PNG,GIF)");
			        </script> <?php
			        exit();
			    }
		    }
		}else{
			?>
			<script type="text/javascript">
	        	window.alert("Lengkapi form upload data");
	        </script>
			<?php
			exit();
		}
	}

	static function upload_img_width_height_resize($newName,$file,$dir,$newWidth,$newHeight) {
		
		$file_temp 		= $_FILES[$file]["tmp_name"];
		$file_upload 	= $_FILES[$file]["name"];

		if (!empty($file_temp)) {

			move_uploaded_file($file_temp, $dir.$file_upload);

			$vdir_upload = $dir;
		    $originalFile = $vdir_upload . $file_upload;

			$info = getimagesize($originalFile);
		    $mime = $info['mime'];

		    switch ($mime) {
		            case 'image/jpeg':
		                    $image_create_func = 'imagecreatefromjpeg';
		                    $image_save_func = 'imagejpeg';
		                    $new_image_ext = 'jpg';
		                    $callback = true;
		                    break;

		            case 'image/png':
		                    $image_create_func = 'imagecreatefrompng';
		                    $image_save_func = 'imagepng';
		                    $new_image_ext = 'png';
		                    $callback = true;
		                    break;

		            case 'image/gif':
		                    $image_create_func = 'imagecreatefromgif';
		                    $image_save_func = 'imagegif';
		                    $new_image_ext = 'gif';
		                    $callback = true;
		                    break;

		            default: 
		                    
		                    $callback = false;
		    }

		    if ($callback == true) {
		    	$img = $image_create_func($originalFile);
			    list($width, $height) = getimagesize($originalFile);

			    $tmp = imagecreatetruecolor($newWidth, $newHeight);
			    imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

			    if (file_exists($originalFile)) {
			            unlink($originalFile);
			    }
			    $image_save_func($tmp, "$dir/$newName.$new_image_ext");
			    return $newName = $newName.$new_image_ext;
		    }else {
			    if (file_exists($originalFile)) {
			        unlink($originalFile);
			        $actual_link = isset($_SERVER['HTTPS']) ? "https://" : "http://";
			        $url = $actual_link . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>
			        <script type="text/javascript">
			        	window.alert("File yang diupload tidak sesuai dengan ekstensi, pilih ekstensi (JPG,PNG,GIF)");
			        </script> <?php
			        exit();
			    }
		    }    
		}else{
			?>
			<script type="text/javascript">
	        	window.alert("Lengkapi form upload data");
	        </script>
			<?php
			exit();
		}
	}


	public function upload_img($newName,$file,$dir)
	{
		$allowed_ext        = array('jpg','png','jpeg','gif');
        $file_name          = $_FILES[$file]['name'];
        $tmpfile_ext        = explode('.', $file_name);
        $file_ext           = end($tmpfile_ext);
        $file_size          = $_FILES[$file]['size'];
        $file_temp          = $_FILES[$file]['tmp_name'];
        $nama               = $newName;
        $file_upload        = $nama.'.'.$file_ext;

        if (in_array($file_ext, $allowed_ext) === true ) {
            if ($file_size < 10000000) { //size
                $lokasi = $dir.'/'.$nama.'.'.$file_ext;
                if(move_uploaded_file($file_temp, $lokasi)){
                	return $file_upload;
                }else{
                    print("Failed");
                }
            }
        }

	}

	public function upload_doc_docx($newName,$file,$dir)
	{
		$allowed_ext        = array('doc','docx');
        $file_name          = $_FILES[$file]['name'];
        $tmpfile_ext        = explode('.', $file_name);
        $file_ext           = end($tmpfile_ext);
        $file_size          = $_FILES[$file]['size'];
        $file_temp          = $_FILES[$file]['tmp_name'];
        $nama               = $newName;
        $file_upload        = $nama.'.'.$file_ext;

        if (in_array($file_ext, $allowed_ext) === true ) {
            if ($file_size < 20000000) { //size
                $lokasi = $dir.'/'.$nama.'.'.$file_ext;
                if(move_uploaded_file($file_temp, $lokasi)){
                	return $file_upload;
                }else{
                    print("Failed");
                }
            }
        }

	}

	

	public function redirect($url)
	{
		$script = '<script>window.location="'.$url.'";</script>';
		echo $script;
	}


}


class General_Bootstrap 
{

	public function alert_js($alert)
	{
		$script = "<script>alert('$alert');</script>";
		return $script;
	}

	public function alert_css($alert,$text)
	{
		$script = '<div class="alert alert-'.$alert.'">'.$text.'</div>';
		return $script;
	}

	public function label_css($label,$text)
	{
		$script = '<span class="label label-'.$label.'">'.$text.'</span>';
		return $script;
	}

	public function label_css_link($label,$text,$url)
	{
		$script = '<a href="'.$url.'"><span class="label label-'.$label.'">'.$text.'</span></a>';
		return $script;
	}

	public function label_css_link_confirm($label,$text,$url)
	{
		$script = '<a href="'.$url.'" onclick="return confirm('."'".'Apakah anda yakin?'."'".')"><span class="label label-'.$label.'">'.$text.'</span></a>';
		return $script;
	}

	public function label_css_link_newtab($label,$text,$url)
	{
		$script = '<a href="'.$url.'" target="_blank"><span class="label label-'.$label.'">'.$text.'</span></a>';
		return $script;
	}

	public function button($label,$text,$url)
	{
		$script = '<a href="'.$url.'"><button class="btn btn-'.$label.'">'.$text.'</button></a>';
		return $script;
	}

	public function button_newtab($label,$text,$url)
	{
		$script = '<a href="'.$url.'" target="_blank"><button class="btn btn-'.$label.'">'.$text.'</button></a>';
		return $script;
	}

	public function button_confirm($label,$text,$url)
	{
		$script = '<a href="'.$url.'"  onclick="return confirm('."'".'Apakah anda yakin?'."'".')"><button class="btn btn-'.$label.'">'.$text.'</button></a>';
		return $script;
	}

	
}

 ?>