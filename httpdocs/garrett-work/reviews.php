<?php include('includes/top.php'); ?>
<?php
$limit = 10; 
$adjacents = 3;
/* Get Count. */
$query = "SELECT * FROM ".TBL_REVIEW."";
$total_pages = mysql_query($query);
$total_pagesc = mysql_num_rows($total_pages);
$total_pages = $total_pagesc;
/* Get Count. */

$targetpage = "reviews.php"; 	             
							
$page = $_GET['page'];
if($page) 
$start = ($page - 1) * $limit; 			
else
$start = 0;								
/* Get data. */
$sql = "SELECT * FROM ".TBL_REVIEW." WHERE status=0 ORDER BY id DESC LIMIT $start, $limit";
/* Setup page vars for display. */
if ($page == 0) $page = 1;					//if no page var is given, default to 1.
$prev = $page - 1;							//previous page is page - 1
$next = $page + 1;							//next page is page + 1
$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
$lpm1 = $lastpage - 1;						//last page minus 1
/* 
Now we apply our rules and draw the pagination object. 
We're actually saving the code to a variable in case we want to draw it more than once.
*/
$pagination = "";
if($lastpage > 1)
{	
$pagination .= "<div class=\"pagination\">";
//previous button
if ($page > 1) 
$pagination.= "<a href=\"$targetpage?page=$prev\">Previous</a>";
else
$pagination.= "";	
//pages	
if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
{	
for ($counter = 1; $counter <= $lastpage; $counter++)
{
if ($counter == $page)
$pagination.= "<span class=\"current\">$counter</span>";
else
$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
}
}
elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
{
//close to beginning; only hide later pages
if($page < 1 + ($adjacents * 2))		
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
if ($counter == $page)
$pagination.= "<span class=\"current\">$counter</span>";
else
$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
}
$pagination.= "...";
$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
}
//in middle; hide some front and some back
elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
$pagination.= "...";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
if ($counter == $page)
$pagination.= "<span class=\"current\">$counter</span>";
else
$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
}
$pagination.= "...";
$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
}
//close to end; only hide early pages
else
{
$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
$pagination.= "...";
for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
{
if ($counter == $page)
$pagination.= "<span class=\"current\">$counter</span>";
else
$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
}
}
}
//next button
if ($page < $counter - 1) 
$pagination.= "<a href=\"$targetpage?page=$next\">Next</a>";
else
$pagination.= "";
$pagination.= "</div>\n";		
}
?>
<body>
<?php include('includes/header.php'); ?>
<div class="stepSec">
<div class="topMain">
<div class="continueArea">
<div class="customersquotLft">
<h2>CUSTOMERS'<span>REVIEW</span></h2>
<ul id="ticker_02" style="height:600px;">
<?php
$sqlReview = "SELECT * FROM ".TBL_REVIEW." WHERE status=0";
$getExe = $db->selectData($sqlReview);
while($getRows = $db->getRow($getExe)){
?>
<li>
<div class="customersFeedSec">
<p><?php echo $getRows['comments']; ?></p>
<span>By <?php echo $getRows['name']; ?> from <?php echo $getRows['city']; ?> On <?php echo date('d-M-Y',strtotime($getRows['date'])); ?></span>
</div>
</li>
<?php
}
?>
</ul>
</div>
<div id="aboutRight">
<div id="movingReviewLftSec">
<div class="movingReviewLft">
<h4>Moving Reviews</h4>
<p>Read unedited moving reviews from real ufirstmoving.com customers from all around the United States. No matter where you're moving, you can trust the professionals at your local ufirstmoving.com.</p>
<p><span>Like what you read? Request a Free Moving Quote or use the form to the right to get started. We'd love to make you just as happy.</span></p>
<div class="overAllRev">
<h2> Overall, ufirstmoving.com has a 4.9 rating.</h2>
<div class="ratingiconsec">
<ul>
<li><img src="image/rating.png" width="23" height="23" alt="rating" /></li>
<li><img src="image/rating.png" width="23" height="23" alt="rating" /></li>
<li><img src="image/rating.png" width="23" height="23" alt="rating" /></li>
<li><img src="image/rating.png" width="23" height="23" alt="rating" /></li>
<li><img src="image/rating.png" width="23" height="23" alt="rating" /></li>
<p>Based on 10 reviews</p>
</ul>
</div>
</div>
<div class="writeRevSec">
<a href="write-rewiew.php">Write a Review</a>
<p>Have an opinion? Submit your own review.</p>
</div>
<div class="mainRevPnl">
<?php
$getExe = $db->selectData($sql);
while($getRows = $db->getRow($getExe)){
?>      
<div class="fstrev">
<h3>By <?php echo $getRows['name']; ?> from <?php echo $getRows['city']; ?> on <?php echo date('d-M-Y',strtotime($getRows['date'])); ?></h3>
<ul>
<?php
for($i=1;$i<=$getRows['rating'];$i++){
?>	
<li><img src="image/rating2.png" width="17" height="17" alt="rating" /></li>
<?php
}
?>
</ul>
<p><?php echo $getRows['comments']; ?></p>
</div>
<?php
}
?>      
<div class="paginationSec">
<?php echo $pagination; ?>
<!--<div class="nextBtn"><a href="#">Next</a></div>-->
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>