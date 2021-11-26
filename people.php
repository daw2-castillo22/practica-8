<?php
$db = mysqli_connect('localhost', 'root', 'root') or 
    die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'moviesite') or die(mysqli_error($db));

if ($_GET['action'] == 'edit') {
    //retrieve the record's information 
    $query = 'SELECT
            people_id, people_fullname, people_isactor, people_isdirector
        FROM
            people
        WHERE
            people_id = ' . $_GET['id'];
    $result = mysqli_query($db, $query) or die(mysqli_error($db));
    extract(mysqli_fetch_assoc($result));
} else {
    //set values to blank
    $people_fullname = '';
    $is_actor = 0;
    $is_director = 0;
	$people_email='';
}
?>
<html>
 <head>
  <title><?php echo ucfirst($_GET['action']); ?> People</title>
 </head>
 <body>
  <form action="commitpeople.php?action=<?php echo $_GET['action']; ?>&type=people"
   method="post">
   <table>
    <tr>
     <td>People name</td>
     <td><input type="text" name="people_name"
      value="<?php echo $people_fullname; ?>"/></td>
    </tr>

      </select></td>
    </tr><tr>
	
     <td>Actor?</td>
     <td><select name="is_actor">
			<option value="0">0</option>
			<option value="1">1</option>
     </select></td>
	  
    </tr><tr>
     <td>Director?</td>
     <td><select name="is_director">
			<option value="0">0</option>
			<option value="1">1</option>
      </select></td>
    </tr><tr>
	
	<tr>
     <td>e-mail</td>
     <td><input type="text" name="people_email"
      value="<?php echo $people_email; ?>"/></td>
    </tr>

      </select></td>
    </tr><tr>
	
     <td colspan="2" style="text-align: center;">
<?php
if ($_GET['action'] == 'edit') {
    echo '<input type="hidden" value="' . $_GET['id'] . '" name="people_id" />';
}
?>
      <input type="submit" name="submit"
       value="<?php echo ucfirst($_GET['action']); ?>" />
     </td>
    </tr>
   </table>
  </form>
 </body>
</html>