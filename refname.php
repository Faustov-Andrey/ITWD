<!DOCTYPE HTML>
<HTML>
 <HEAD>
  <title>   refname   </title>
  <link rel="stylesheet" href="style.css" type="text/css">
 </HEAD>

 <BODY>

<?php

    $name = '����';
    $ref_name = $name;
    $ref_name = "���� ����� $ref_name";
    echo $ref_name;
    echo $name;

?>


<?php

    $name = '����';
    $ref_name = &$name;
    $ref_name = "���� ����� $ref_name";
    echo $ref_name;
    echo $name;
?>




 </BODY>
</HTML>
