<?php
	// Create connection
	$link = new mysqli('localhost', 'root', '', 'schoolportal');
	
	// Check connection
	if ($link->connect_error) {
	    die("Connection failed: " . $link->connect_error);
	}

    if ($stmt = mysqli_prepare($link, "SELECT staffid, title, surname, othername, email, designation  FROM staff")) {
    
 
    /* execute query */
    mysqli_stmt_execute($stmt);

    /* bind result variables */
    mysqli_stmt_bind_result($stmt, $id, $title, $surname, $othername, $email, $designation);

    /* fetch value */
   echo '<table>';
    while (mysqli_stmt_fetch($stmt)) {
      
        echo '
        
        <tr>
	        <td>'.$id.'</td>
	        <td>'.$title.' '.$surname.' '.$othername.'</td>
	        <td>'.$email.'</td>
	        <td>'.$designation.'</td>
        </tr>
        
        ';

    }   
    echo '</table>';
   
    
    /* close statement */
    mysqli_stmt_close($stmt);
}
?>