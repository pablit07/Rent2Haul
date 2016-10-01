<?php
$url = $_SERVER['PHP_SELF'];
$page = explode("/",$url);
$page_name = $page[1];
?>
<div class="main">
        <div class="row-1">
            <h1><a class="logo" href="index.php">Ufirst Moving Company</a></h1>
            <nav>
                <ul class="sf-menu">
					<?php if($page_name == "index.php"){?>
                    <li class="current first"><a class="mains" href="index.php">Home</a></li>
					<?php }else{?>
					<li class="first"><a class="mains" href="index.php">Home</a></li>
					<?php }?>
					<?php if($page_name == "about.php"){?>
                    <li class="current"><a class="mains" href="about.php">About</a></li>
					<?php }else{?>
					<li><a class="mains" href="about.php">About</a></li>
					<?php }?>
					<?php if($page_name == "service.php"){?>
                    <li class="current"><a class="mains" href="service.php">Services</a>
                       <!-- <ul>
                           <li><a href="#">Easy Freight Quoting</a></li>
                           <li><a href="#">Total Freight Capabilities</a></li>
                           <li><a href="#">Daily Shipment Tracking</a></li>
                           <li><a href="#">Single Source Customer Service</a></li>
                           <li><a href="#">Single Source Freight Billing</a></li>
                           <li><a href="#">24/7 On Call Emergency Staffing</a></li>
                           <li><a href="#">Carrier Contract &amp; Insurance Maintenance</a></li>
                        </ul>-->
                    </li>
					<?php }else{?>
					<li><a class="mains" href="service.php">Services</a>
                         <!--<ul>
                           <li><a href="#">Easy Freight Quoting</a></li>
                           <li><a href="#">Total Freight Capabilities</a></li>
                           <li><a href="#">Daily Shipment Tracking</a></li>
                           <li><a href="#">Single Source Customer Service</a></li>
                           <li><a href="#">Single Source Freight Billing</a></li>
                           <li><a href="#">24/7 On Call Emergency Staffing</a></li>
                           <li><a href="#">Carrier Contract &amp; Insurance Maintenance</a></li>
                        </ul>-->
                    </li>
					
					<?php }?>
					<?php if($page_name == "faqs.php"){?>
                    <li class="current"><a class="mains" href="faqs.php">Moving FAQs</a></li>
					<?php }else{?>
					<li><a class="mains" href="faqs.php">Moving FAQs</a></li>
					<?php }?>
					<?php if($page_name == "review.php"){?>
                    <li class="current"><a class="mains" href="review.php">Reviews</a></li>
					<?php }else{?>
					<li><a class="mains" href="review.php">Reviews</a></li>
					<?php }?>
                    <?php if($page_name == "news-articles.php"){?>
                    <li class="current"><a class="mains" href="news-articles.php">LTL Freight</a></li>
					<?php }else{?>
					<li><a class="mains" href="news-articles.php">LTL Freight</a></li>
					<?php }?>
					<?php if($page_name == "contact-us.php"){?>
                    <li class="current last"><a class="last mains" href="contact-us.php">Contact Us</a></li>
					<?php }else{?>
					<li class="last"><a class="last mains" href="contact-us.php">Contact Us</a></li>
					<?php }?>
                </ul>
            </nav>
        </div>
    </div>