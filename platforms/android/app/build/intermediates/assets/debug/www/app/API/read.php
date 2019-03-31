<?php

//fetch.php

include("conn.php");

$query = "SELECT * FROM tbl_sample ORDER BY id DESC";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$total_row = $statement->rowCount();
$output = '';
if($total_row > 0)
{
	foreach($result as $row)
	{
		$output .= '<li class="swipeout">
            <div class="item-content swipeout-content">
              <div class="item-media">
                <i class="f7-icons">person_round_fill</i>
              </div>
              <div class="item-inner">
                <div class="item-title">'.$row["first_name"].' '.$row["last_name"].'</div>
              </div>
            </div>
            <div class="swipeout-actions-left">
              <a href="#" class="swipeout-delete delete" id="'.$row["id"].'">Hapus</a>
              <a href="#" class="color-blue edit" id="'.$row["id"].'">Edit</a>
            </div>
          </li>
		';
	}
}
echo $output;
?>