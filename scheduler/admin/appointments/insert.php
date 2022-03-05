
<?php
	


if(isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['comments'])){
$id = $_GET['id'];

$comments = $_GET['comments'];
require("db/db.php");

$qry2 = $con->query("SELECT name from `patient_list` where  id = '{$_GET['id']}' ");
foreach($qry2->fetch_all(MYSQLI_ASSOC) as $row){
   $name = $row['name'];
  
}

}
$dates = date("F d, Y h:i:s A");
mysqli_query($con, "INSERT INTO comments(comments_text, patient_id,date_time,name) VALUES('$comments', '$id','$dates','$name')");

$result = mysqli_query($con, "SELECT * FROM comments ORDER BY ID ASC");
while($row=mysqli_fetch_array($result)){
echo "<div class='comments_profile'>";
echo "<h4><a href='delete.php?id=" . $row['ID'] . "'> X</a></h4>";
echo "<h1>" . $row['name'] . "</h1>";
echo "</div>";

echo "<div class='comments_content'>";
echo "<h4><a href='delete.php?id=" . $row['ID'] . "'> X</a></h4>";
echo "<h1>" . $row['name'] . "</h1>";
echo "<h2>" . $row['date_time'] . "</h2></br></br>";
echo "<h3>" . $row['comments_text'] . "</h3>";
echo "</div>";
}
mysqli_close($con);
?>