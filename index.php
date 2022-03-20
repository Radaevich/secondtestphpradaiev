<?php
//connect to mysql and select db
$conn = mysqli_connect('localhost', 'root', '','secondscriptradaiev');

if( !empty($conn->connect_errno)) die("Error " . mysqli_error($conn));

//call the recursive function to print category listing
category_tree(0);

//Recursive php function
function category_tree($catid){
global $conn;

$sql = "select * from categories where parent_id ='".$catid."'";
$result = $conn->query($sql);

while($row = mysqli_fetch_object($result)):
$i = 0;
if ($i == 0) echo '<ul>';
 echo '<li>' . $row->categories_id;
 category_tree($row->categories_id);
 echo '</li>';
$i++;
 if ($i > 0) echo '</ul>';
endwhile;
}
//close the connection
mysqli_close($conn);
?>