<html><body>
<echo> "Hello, World!" </echo>

<?php

  echo '��������� �������:' . "<br />\n";

    echo "������������ �������: " . 
		$_SERVER["OS"] . "<br />\n";
    echo "Web-������: " . 
		$_SERVER["SERVER_SOFTWARE"] . "<br />\n";
    echo "��� �������: " . 
		$_SERVER["SERVER_NAME"] . "<br />\n";
    echo "����� �������: " . 
		$_SERVER["SERVER_ADDR"] . "<br />\n";
    echo "���� �������: " . 
		$_SERVER["SERVER_PORT"] . "<br />\n";
    echo "����� �������: " . 
		$_SERVER["REMOTE_ADDR"] . "<br />\n";
    echo "���� � ���������� �� �������: " . 
		$_SERVER["DOCUMENT_ROOT"] . "<br />\n";
    echo "������ ���� � �������� �������: " . 
		$_SERVER["SCRIPT_FILENAME"] . "<br />\n";
    echo "��� �������� �������: " . 
		$_SERVER["PHP_SELF"] . "<br />\n";

   $name = (isset($_GET['name']))?
		$_GET['name']:' �� ������� ';
   $fam = (isset($_GET['fam']))?
		$_GET['fam']:' �� ������� ';
   $jt = (isset($_GET['jt']))?
		$_GET['jt']:' �� ������� ';
   $country = (isset($_GET['country']))?
		$_GET['country']:' �� ������� ';

   echo "������: $country <br />\n";
   echo "�������: $fam <br />\n";
   echo "���: $name <br />\n";
   echo "���������: $jt <br />\n";
?>

</body></html>
