<?php 
include_once("configure.php");
$page_title = "News &amp; Articles";
if(isset($_GET['id']) && $_GET['id']!=""){
$record_sql = "SELECT * FROM ".TBL_NEWS_ARTICLES." WHERE status = '1' AND category_id = '".$_GET['id']."'";
$record_sql .= " ORDER BY id DESC";
$news_sql = mysql_query($record_sql);
$total_news = mysql_num_rows($news_sql);
}else{
header("location:news-articles.php");	
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
                        
                        
                        
                        
                        
                        <div id="mainArtArea">
                          <div class="mainartAreaSub">
                          <h1>News &amp; Articles</h1>
                          
                          
                          <div class="mainContentArea">
                          
                          
                            <div class="leftContentArea">
                              <?php 
                              if($total_news > 0){
                              while($row_news = mysql_fetch_array($news_sql)){?>
                              <div class="singlePageTitle">
                                <div class="articlePic">
                                  <img src="images/logo.png" width="71" height="66" alt="images" /> 
                                  </div>
                                  <a href="news-articles-details.php?id=<?php echo $row_news['id']?>"><h2><?php echo ucfirst(stripslashes($row_news['title']))?></h2></a>
                                  <span><?php echo date('d M Y',strtotime($row_news['news_date']));?> by <?php echo ucfirst(stripslashes($row_news['username']))?></span>
                              </div>
                              <div class="pageContentSec">
                              <p><?php echo ucfirst(stripslashes(html_entity_decode(substr($row_news['news'],0,555))))?></p>
                              </div>
                              <div class="new-border"></div>
                              <?php 
                                    }
                                }else{
                              ?>
                              <div style="color:#F00;" align="center">No record found</div>
                              <?php }?>
                              
                              
                              
                            </div>
                            
                         
                            <?php include_once("includes/right-panel.php");?>
                            
                          </div>
                          
                          
                          
                          
                          
                          </div>
                        </div>
                        
                        
                        
                        
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!--==============================footer=================================-->
<?php include_once("includes/footer.php");?>
<?php include_once("includes/news-articles-footer.php");?>