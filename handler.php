<HTML>
 <HEAD>
  <title>   ***   �����-����������   ***   Intech computers   ***   </title>
  <link rel="stylesheet" href="style.css" type="text/css">
 </HEAD>

 <BODY>
<?php include "top.php" ?> 
<tr> 
	<td><center><p>?</p></center></td>
		<td><center>
		<?php
		  if (array_key_exists("lgn", $_GET)){    
	    echo '<p> �� ����� '.$_GET['lgn'].' </p>';
		}
		  if (array_key_exists("psw", $_GET)){    
	    echo '<p> �� ����� '.$_GET['psw'].' </p>';
		}
					?> 
		</center></td>
	<td><center><p>?</p></center></td>
</tr> 
<?php include "bottom.php" ?> 

 </BODY>
</HTML>
