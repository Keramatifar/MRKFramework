
2345wsaeef
<h1>dfvbdf</h1>

<?php
require 'db.php';
	$all = DB::GetOne("SELECT count(*) FROM products cnt");
	echo '0';
	define('COUNT_PER_PAGE',5);
	$pages = round($all / COUNT_PER_PAGE);
	
	$index = isset($_GET['page']) ? $_GET['page'] : 1;
	echo '1';
	for($i=0; $i<=$pages; $i++)
	{
		$pageNumber =$i+1;
		echo " <a href='?page=$pageNumber'>Page $pageNumber</a> ";
	}
	
	//$beginIndex = ($page * COUNT_PER_PAGE == COUNT_PER_PAGE) ? 0 : ($page * COUNT_PER_PAGE);
	$Index = $_GET['page'];
	echo $Index;
	if($Index == 5)
		$Index = 0;
	else
		$Index =$Index * 5;
		
	
	$c = COUNT_PER_PAGE;
	echo $q="CALL getProductrs($Index,$c)";
	$products = DB::GetAll($q);
	foreach($products as $row)
		echo "<hr />Row : $row[id] | $row[title] <hr />";
?>