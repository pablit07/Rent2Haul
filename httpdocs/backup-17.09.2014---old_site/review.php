<?php 
include_once("configure.php");
$page_title = "Moving Reviews";
$q="select count(*) \"total\"  from ".TBL_USER_REVIEW;
$ros=mysql_query($q);
$row=(mysql_fetch_array($ros));
$total=$row['total'];
$dis=10;
$total_page=ceil($total/$dis);
$page_cur=(isset($_GET['page']))?$_GET['page']:1;
$k=($page_cur-1)*$dis;	
$display_review = mysql_query("SELECT * FROM ".TBL_USER_REVIEW." WHERE status = '1' ORDER BY review_date DESC limit $k,$dis");
$total_review = mysql_num_rows($display_review);
$rating_sql = mysql_query("SELECT count(*) AS total_rating, SUM(rating) AS sum_rate FROM ".TBL_USER_REVIEW." WHERE status = '1'");
$total_rating_review = mysql_fetch_array($rating_sql);
$tatal_rating = $total_rating_review['total_rating']*5;
if($tatal_rating > 0){
$percent_rating = ($total_rating_review['sum_rate']/$tatal_rating)*100;
$percent_rating_round = round($percent_rating);
$rating = ($percent_rating_round/100)*5;
$based_star = round($rating);
$rating_number = number_format($rating, 1, '.', '');
$explode_rating_no = explode(".",$rating_number);
}
include_once("includes/header.php");
?>
<body id="page2">
<div class="bg-1">
<!--==============================header=================================-->
<header>
   	<?php include_once("includes/menu.php");?>  
</header>
<!--==============================content================================-->
    <section id="content">
        <div class="container_24">
            <div class="main">
                <div class="padding1">
                    <div class="wrapper">
                        <article class="grid_16 prefix_1 omega">
                           <h2 class="indent-bot">Moving <span class="small-1">Reviews</span></h2>
                           <h6>Read unedited moving reviews from real ufirstmoving.com customers from all around the United States. No matter where you're moving, you can trust the professionals at your local ufirstmoving.com.</h6>
						   <div class="wrapper p6">
							   <p class="indent-bot">
									Like what you read? Request a Free Moving Quote or use the form to the right to get started. We'd love to make you just as happy.
							   </p>
							   <!--<a class="button-3" href="#" style="width:600px; height:150px;"></a>-->
							   <div class="review-star">
							   		<span class="review-track">Overall, ufirstmoving.com has a <?php echo $rating_number?> rating.</span>
									<div class="clear-both"></div>
									<div class="star-track">
									<?php if($explode_rating_no[0] > 0){?>
									<?php for($i=1;$i<=$explode_rating_no[0];$i++){?>
									<img src="images/big_star.png" />&nbsp;&nbsp;
									<?php }?>
									<?php if($explode_rating_no[1] >= 1 && $explode_rating_no[1] <= 4){?>
									<img src="images/25.png" />
									<?php }?>
									<?php if($explode_rating_no[1] == 5){?>
									<img src="images/50.png" />
									<?php }?>
									<?php if($explode_rating_no[1] >= 6 && $explode_rating_no[1] <= 9){?>
									<img src="images/75.png" />
									<?php }?>
									<?php }else{?>
									<?php for($i=1;$i<=5;$i++){?>
									<img src="images/1.png" />&nbsp;&nbsp;
									<?php }?>
									<?php }?>
									</div>
									<span class="based">Based on <?php echo ($total_review > 0) ? $total_review : "0";?> reviews</span>
							   </div>
						   </div>
						   <div class="float-left"><a class="writh-a-review" href="write-review.php">WRITE A REVIEW</a></div>
						   <div class="review-question">Have an opinion? Submit your own review.</div>
						   <div class="clear-both"></div>
						   <?php
						   if($total_review > 0){
						   while($fetch_row = mysql_fetch_array($display_review)){
						   ?>
						   <div class="extra-box spacing-bot">
								<div class="extra-box">
									<div class="float-left">
									<?php for($i=1;$i<=$fetch_row['rating'];$i++){?>
									<img src="images/rating.png" />&nbsp;
									<?php }?>
									</div>
									<span class="upload-by">By <?php echo ucfirst(stripslashes($fetch_row['first_name']))?> from <?php echo ucfirst(stripslashes($fetch_row['city']))?> on <?php echo date('j M Y', strtotime($fetch_row['review_date']))?></span>
									<div class="clear-both"></div>
									<span class="review-desc"><?php echo ucfirst(stripslashes($fetch_row['comment']))?></span>
								</div>
							</div>
							<?php
								}
							}
							if($page_cur>1)
							{
								echo '<a href="review.php?page='.($page_cur-1).'" style="cursor:pointer;color:green;"><input class="pagination-prev" type="button" value="Previous"></a>';
							}
							/*else
							{
							  echo '<input class="pagination-prev-two" type="button" value="Previous">';
							}*/
							for($i=1;$i<$total_page;$i++)
							{
								if($page_cur==$i)
								{
									echo ' <input class="number-inavtive" type="button" value="'.$i.'"> ';
								}
								else
								{
								echo '<a href="review.php?page='.$i.'"> <input class="number-active" type="button" value="'.$i.'"> </a>';
								}
							}
							if($page_cur<$total_page)
							{
								echo '<a href="review.php?page='.($page_cur+1).'"><input class="pagination-next" type="button" value="Next"></a>';
							}
							/*else
							{
							 echo '<input class="pagination-next-two" type="button" value="Next">';
							}*/
							?>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!--==============================footer=================================-->
<?php include_once("includes/footer.php");?>