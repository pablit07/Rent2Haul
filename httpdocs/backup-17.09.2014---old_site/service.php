<?php 
include_once("configure.php");
$page_title = "Service";
include_once("includes/header.php");
?>
<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen">
<script src="js/hover-image.js" type="text/javascript"></script>
<script src="js/jquery.prettyPhoto.js" type="text/javascript"></script>
<script type="text/javascript">
		$(document).ready(function(){
			//for prettyPhoto
			$("a[rel^='prettyPhoto']").prettyPhoto({theme:'facebook'});
			$(".box-2").hover(function(){
			$(this).addClass("alt");
			Cufon.refresh();
			}, function(){
			$(this).removeClass("alt");
			Cufon.refresh();
			});
		});
	</script>
<body id="page3">
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
                        <article class="grid_24 alpha">
                           <h2 class="spacing-bot">The best <span class="small-1">professional services</span></h2>
						   <div class="wrapper indent-bot">
                           		<div class="col-1">
                                	<div class="box-2">
                                       <div class="padding maxheight">
                                            <div class="wrapper">
                                                <figure><a class="lightbox-image" href="images/packing.jpg" rel="prettyPhoto[gallery1]"><img class="p2" src="images/packing.jpg" height="221" width="260" alt=""></a></figure>
                                                <div class="extra-box">
                                                    <h6>Packing and Unpacking </h6>
                                                    Leave the packing and unpacking to the professionals! $30 an hour is industry standard. Let us know what your budget is!
                                                    
                                                    
                                                    
                                                </div>
                                            </div>
                                       </div>
                                   </div>
                                </div>
                                <div class="col-1">
                                	<div class="box-2">
                                       <div class="padding maxheight">
                                            <div class="wrapper">
                                                <figure><a class="lightbox-image" href="images/image-blank.png" rel="prettyPhoto[gallery1]"><img class="p2" src="images/page3-img2.png" height="221" width="312" alt=""></a></figure>
                                                <div class="extra-box">
                                                    <h6>Simple single piece of furniture moves!                                                </h6> We'll move single items such as a couch, or pool table, piano or even a vehicle. Industry standard hourly rate is $85 an hour, you name your price!
                                                </div>
                                            </div>
                                       </div>
                                   </div>
                                </div>
                                <div class="col-2">
                                	<div class="box-2">
                                       <div class="padding maxheight">
                                            <div class="wrapper">
                                                <figure><a class="lightbox-image" href="images/image-blank.png" rel="prettyPhoto[gallery1]"><img class="p2" src="images/page3-img3.png" height="221" width="260" alt=""></a></figure>
                                                <div class="extra-box">
                                                    <h6>Long distance relocation!</h6> 
                                                    You can be confident we'll relocate your family stress free, on time, to any domestic location you need. Ask us for a custom quote!
                                                </div>
                                            </div>
                                       </div>
                                   </div>
                                </div>
                           </div>
                           <div class="wrapper">
                           		<div class="col-1">
                                	<div class="box-2">
                                       <div class="padding maxheight">
                                            <div class="wrapper">
                                                <figure><a class="lightbox-image" href="images/image-blank.png" rel="prettyPhoto[gallery1]"><img class="p2" src="images/page3-img4.png" height="221" width="260" alt=""></a></figure>
                                                <div class="extra-box">
                                                    <h6>Commercial office relocations.</h6> From one small office to a large corporate move we have the team to manage it all. Ask us for a custom quote
                                                </div>
                                            </div>
                                       </div>
                                   </div>
                                </div>
                                <div class="col-1">
                                	<div class="box-2">
                                       <div class="padding maxheight">
                                            <div class="wrapper">
                                                <figure><a class="lightbox-image" href="images/image-blank.png" rel="prettyPhoto[gallery1]"><img class="p2" src="images/page3-img5.png" height="221" width="260" alt=""></a></figure>
                                                <div class="extra-box">
                                                    <h6>Storage</h6> Do you need storage? ask about our low cost storage solutions. Industry standard is $150 a month. You name your price!
                                                </div>
                                            </div>
                                       </div>
                                   </div>
                                </div>
                                 <div class="col-2">
                                	<div class="box-2">
                                       <div class="padding maxheight">
                                            <div class="wrapper">
                                                <figure><a class="lightbox-image" href="images/image-blank.png" rel="prettyPhoto[gallery1]"><img class="p2" src="images/page3-img6.png" height="221" width="260" alt=""></a></figure>
                                                <div class="extra-box">
                                                    <h6>Name your price!</h6> We'll work within your budget!
                                                </div>
                                            </div>
                                       </div>
                                   </div>
                                </div>
                           </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!--==============================footer=================================-->
<?php include_once("includes/footer.php");?>