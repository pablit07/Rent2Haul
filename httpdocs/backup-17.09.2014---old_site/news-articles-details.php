<?php 
include_once("configure.php");
$page_title = "News &amp; Articles Details";
if(isset($_GET['id']) && $_GET['id']!=""){
$news_sql = mysql_query("SELECT * FROM ".TBL_NEWS_ARTICLES." WHERE status = '1' AND id = '".$_GET['id']."'");
$total_news = mysql_num_rows($news_sql);
$row_news = mysql_fetch_array($news_sql);
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
                          <h1>News &amp; Articles Details</h1>
                          
                          
                          <div class="mainContentArea">
                          
                          
                            <div class="leftContentArea">
                              <div class="singlePageTitle">
                                <div class="articlePic">
                                  <img src="images/logo.png" width="71" height="66" alt="images" /> 
                                  </div>
                                  <h2><?php echo ucfirst(stripslashes($row_news['title']))?></h2>
                                  <span><?php echo date('d M Y',strtotime($row_news['news_date']));?> by <?php echo ucfirst(stripslashes($row_news['username']))?></span>
                              </div>
                              <div class="pageContentSec">
                              <p><?php echo ucfirst(stripslashes(html_entity_decode($row_news['news'])))?></p>    
                              </div>
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