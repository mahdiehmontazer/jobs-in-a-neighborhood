<div id="navigate_qom">
<ul>
<?php
if(isset($_GET['navy']) or isset($_GET['name']) or isset($_GET['navy2']) or  isset($_GET['cat']))
echo'<a href="index.php"><li>صفحه اصلی</li></a>';
else
echo "<li>تازه ترین آگهی ها</li>";
if(isset($_GET['name'])) echo'<li>'.$_GET['name'].'</li>';
if(isset($_GET['navy']))
{
echo '<a href="index.php?page=neighbor&zone='.$_GET['zone'].'&navy='.$_GET['navy'].'"><li>'.$_GET['navy'].'</li></a>';
if(isset($_GET['navy2']))
{
echo '<a href="index.php?page=show&zone='.$_GET['zone'].'&cat='.$_GET['cat'].'&navy='.$_GET['navy'].'&navy2='.$_GET['navy2'].'"><li>'.$_GET['navy2'].'</li></a>';
}
}
if(!isset($_GET['navy']) and !isset($_GET['name']) and isset($_GET['cat']))
{
echo '<a href="index.php?page=show&cat='.$_GET['cat'].'&navy2='.$_GET['navy2'].'"><li>'.$_GET['navy2'].'</li></a>';
}	

//echo'<a href="index.php?'.$_SESSION['navy'][1].'"><li>'.$_GET['navy'].'</li></a>';

/*
if(isset($_GET['navy2'])){
echo'<a href="index.php?"><li>'.$_GET['navy2'].'</li></a>';
}
if(isset($_GET['navy3'])){
echo'<a href="index.php?"><li>'.$_GET['navy2'].'</li></a>';
}
if(isset($_GET['navy4'])){
echo'<a href="index.php?"><li>'.$_GET['navy2'].'</li></a>';
}
*/
?>
</ul>
</div>

