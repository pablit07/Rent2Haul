<?php 
include_once("configure.php");
$page_title = "LTL Freight - What is LTL";
$record_sql = "SELECT * FROM ".TBL_CMS." WHERE id = '1'";
$rs_news = mysql_query($record_sql);
$row_news = mysql_fetch_array($rs_news);
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
                              <div class="singlePageTitle">
                                <div class="articlePic">
                                  <!--<img src="images/singlepic.jpg" width="71" height="66" alt="images" />-->
                                  <img src="images/logo.png" width="71" height="66" alt="images" /> 
                                  </div>
                                  <a href="news-articles-details.php?id=<?php echo $row_news['id']?>"><h2><?php echo ucfirst(stripslashes($row_news['title']))?></h2></a>
                                  <span><?php echo date('M d, Y',strtotime($row_news['news_date']));?> by <?php echo ucfirst(stripslashes($row_news['username']))?></span>
                              </div>
                              <div class="pageContentSec">
                              <p><?php echo ucfirst(stripslashes(html_entity_decode($row_news['content'])))?></p>
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