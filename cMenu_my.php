<?php
	
	// ����� ��� ������ � ����.
	class cMenu
	{
		// �����-����������
		var $name;
		var $mItem = array();
		var $mItems = array(); // ������ ��� ������� ����
		var $mChildrens = array(); // ������ ��� ������������ �������� ��������� �� ������������
		
		// �����-������:

		//************************************************************************************************
		/**
		* ����������� �� ���� ������ ����.
		*/
		function GetMenuItems() 
		{
			// �����������, �������� ���� ������
			$link = mysql_connect("localhost", "faust", "Ioan")	or die("Could not connect : " . mysql_error());
			mysql_select_db("iNDocsnet") or die("Could not select database");

			//$mysqli = new mysqli("localhost", "faust", "Ioan"); // ������������ � ��
			//$result_set = $mysqli->query("SELECT * FROM `Menu`"); // ������ ������� ���� ������� �� ������� � ����
		  
			// �������� ������������� ������ 
			$query = "SELECT * FROM `Menu`";
			$result = mysql_query($query) or die("Query failed : " . mysql_error());
			//$items = array(); // ������ ��� ������� ����
			
			while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) 
			{
				$mItems[$line["menu_id"]] = $line; // ��������� ������ �������� �� ��
				//echo $line["parent_menu_id"]."   ";echo $line["menu_id"]."   ";echo $line["title"]."   ";echo $line["native_lang_title"]."   ";echo $line["link"]."   ";
			}
			//$mChildrens = array(); // ������ ��� ������������ �������� ��������� �� ������������
			foreach ($mItems as $mItem) 
			{
				if ($mItem["parent_menu_id"] and !($mItem["parent_menu_id"] == 0)) $mChildrens[$mItem["menu_id"]] = $mItem["parent_menu_id"]; // ��������� ������
				//echo "Item".$mItem["parent_menu_id"]."   ".$mItem["menu_id"]."   ".$mItem["title"]."   ".$mItem["native_lang_title"]."   ".$mItem["link"]."   ";
				//echo $mItems[$mItem["parent_menu_id"]]."   ".$mItems[$mItem["menu_id"]]."   ".$mItems[$mItem["title"]]."   ".$mItems[$mItem["native_lang_title"]]."   ".$mItems[$mItem["link"]]."   ";
				//echo "Childrens".$mChildrens[$mItem["parent_menu_id"]]."   ".$mChildrens[$mItem["menu_id"]]."   ".$mChildrens[$mItem["title"]]."   ".$mChildrens[$mItem["native_lang_title"]]."   ".$mChildrens[$mItem["link"]]."   ";
				
			}	
			return $mItems;
		}
		
		
		//************************************************************************************************
		/**
		* ������� ����� ���� �� ��������.
		*/
		
		function printItems($pItem, $pItems, $pChildrens) 
		{	

			/* ������� ����� ���� */
			//echo "<li>";
			echo "<a href='".$pItem["link"]."'>".$pItem["native_lang_title"]."</a>";
			$ul = false; // ���������� �� �������� ��������?
			while (true) 
			{
				/* ����������� ����, � ������� �� ���� ��� �������� �������� */
				$key = array_search($pItem["menu_id"], $pChildrens); // ���� �������� �������
				if (!$key) 
				{
					/* �������� ��������� �� ������� */
					if ($ul) echo "</ul>"; // ���� ���������� �������� ��������, �� ��������� ������
					break; // ������� �� �����
				}
				unset($pChildrens[$key]); // ������� ��������� ������� (����� �� �� ��������� ��� ���)
				if (!$ul) 
				{
					echo "<ul>"; // �������� ���������� ������, ���� �������� ��������� ��� �� ����
					$ul = true; // ������������� ����
				}
				echo printItem($pItems[$key], $pItems, $pChildrens); // ���������� ������� ��� �������� ��������
			}
			//echo "</li>";
			
			foreach ($pItems as $pItem) 
			{
				echo "<td><center>";
				if (!$pItem["parent_menu_id"]) echo printItem($pItem, $pItems, $pChildrens); // ������� ��� �������� �������� ������
				echo "Item".$pItem["parent_menu_id"]."   ".$pItem["menu_id"]."   ".$pItem["title"]."   ".$pItem["native_lang_title"]."   ".$pItem["link"]."   ";
				echo $pItems[$pItem["parent_menu_id"]]."   ".$pItems[$pItem["menu_id"]]."   ".$pItems[$pItem["title"]]."   ".$pItems[$pItem["native_lang_title"]]."   ".$pItems[$pItem["link"]]."   ";
				echo "Childrens".$pChildrens[$pItem["parent_menu_id"]]."   ".$pChildrens[$pItem["menu_id"]]."   ".$pChildrens[$pItem["title"]]."   ".$pChildrens[$pItem["native_lang_title"]]."   ".$pChildrens[$pItem["link"]]."   ";
				
				echo "</center></td>";
			}
			
		}
	}
	
		//************************************************************************************************
		/**
		* ������� ������ ���� �� ��������.
		*/
		function ShowMenu() 
		{
			foreach ($mItems as $mItem) 
			{
				echo "<td><center>";
				if (!$mItem["parent_menu_id"]) echo printItem($mItem, $mItems, $mChildrens); // ������� ��� �������� �������� ������
				echo "</center></td>";
			}
		}
?>
