<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

switch ($_GET['action']) {
case 'add':
    switch ($_GET['type']) {
    case 'people':
        $error = array();
        $people_fullname = isset($_POST['people_fullname']) ?
            trim($_POST['people_fullname']) : '';
        if (empty($people_fullname)) {
            $error[] = urlencode('Please enter an actor full name.');
        }
        $is_actor = isset($_POST['is_actor']) ?
            trim($_POST['is_actor']) : '';
        if (empty($is_actor)) {
            $error[] = urlencode('Please select one of the options.');
        }
        $is_director = isset($_POST['is_director']) ?
            trim($_POST['is_director']) : '';
        if (empty($is_director)) {
            $error[] = urlencode('Please select one of the options.');
        }else {
          header('Location:people.php?action=add' .
              '&error=' . join($error, urlencode('<br/>')));
        }
		$people_email = isset($_POST['people_email']) ?
            trim($_POST['people_email']) : '';
        if (empty($people_email)) {
            $error[] = urlencode('Please enter an email adress.');
			
        }else if (filter_var($people_email, FILTER_VALIDATE_EMAIL)){
			echo("$people_email is a valid email address");
		}
		else if (!filter_var($people_email, FILTER_VALIDATE_EMAIL)){
			echo("$people_email is not a valid email address");
		}
        break;
	}
		
case 'edit':
    switch ($_GET['type']) {
    case 'people':
        $error = array();
        $people_fullname = isset($_POST['people_fullname']) ?
            trim($_POST['people_fullname']) : '';
        if (empty($people_fullname)) {
            $error[] = urlencode('Please enter an actor full name.');
        }
        $is_actor = isset($_POST['is_actor']) ?
            trim($_POST['is_actor']) : '';
        if (empty($is_actor)) {
            $error[] = urlencode('Please select one of the options.');
        }
        $is_director = isset($_POST['is_director']) ?
            trim($_POST['is_director']) : '';
        if (empty($is_director)) {
            $error[] = urlencode('Please select one of the options.');
        }else {
          header('Location:people.php?action=edit&id=' . $_POST['movie_id'] .
              '&error=' . join($error, urlencode('<br/>')));
        }
		$people_email = isset($_POST['people_email']) ?
            trim($_POST['people_email']) : '';
        if (empty($people_email)) {
            $error[] = urlencode('Please enter an email adress.');
			
        }else if (filter_var($people_email, FILTER_VALIDATE_EMAIL)){
			echo("$people_email is a valid email address");
		}
		else if (!filter_var($people_email, FILTER_VALIDATE_EMAIL)){
			echo("$people_email is not a valid email address");
		}
        break;
    }
    break;
}

if (isset($query)) {
    $result = mysqli_query($query, $db) or die(mysqli_error($db));
}
?>
?>
<html>
 <head>
  <title>Commit</title>
 </head>
 <body>
  <p>Done!</p>
 </body>
</html>