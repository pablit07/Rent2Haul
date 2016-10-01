<?php 
include('includes/top-dev.php'); 
if(isset($_REQUEST['quots']) && $_REQUEST['quots'] == 'GO'){
if(!isset($_SESSION['pageOneData'])){
$arry = array(
"name" => $_REQUEST['name'],
"email" => $_REQUEST['email'],
"phone_no" => $_REQUEST['phone_no'],
"c_catagory" => $_REQUEST['c_catagory'],
"date_to_move" => $_REQUEST['date_to_move']
);
$_SESSION['pageOneData'] = $arry;
$calculationInsert = array("step_4_one" => 0.00);
$getInsertId = $db->insertDataArray(TBL_AJAX_CALCULATION,$calculationInsert);		
$_SESSION['CAL_INSERT_ID'] = $getInsertId;
}else{
$_SESSION['pageOneData']['name'] = $_REQUEST['name'];
$_SESSION['pageOneData']['email'] = $_REQUEST['email'];
$_SESSION['pageOneData']['phone_no'] = $_REQUEST['phone_no'];
$_SESSION['pageOneData']['c_catagory'] = $_REQUEST['c_catagory'];
$_SESSION['pageOneData']['date_to_move'] = $_REQUEST['date_to_move'];
}
}
?>
<?php
if(!isset($_REQUEST['quots']) && $_REQUEST['quots'] != 'GO' && empty($_SESSION['pageOneData'])){
echo '<script type="text/javascript">alert("Please Submit The Form First");</script>';
}
?>
<script type="text/javascript">

function AddTrailerTotal(price_1, price_2)
   {
						var sel_1 = document.getElementById("select_1");
            var qty1 = sel_1.options[sel_1.selectedIndex].value;

						var sel_2 = document.getElementById("select_2");
            var qty2 = sel_2.options[sel_2.selectedIndex].value;
						
			  		var total = (price_1*qty1) + (price_2*qty2);
						document.getElementById('trailertotal').innerHTML='$'+total;
	 }

function getTrailerDetailTwo(q,p,id1,id2,id,textid){
var total	
if(q==0){
total  = p;
document.getElementById(id).required = false;
document.getElementById(textid).style.color='Black';
}else{
total  = q*p;
document.getElementById(id).required = true;
document.getElementById(textid).style.color='Red';
}
var data = total.toString().split(".");
document.getElementById(id1).innerHTML=data[0];
document.getElementById(id2).innerHTML='.'+data[1];

}
function validateForm(){
	
if ($("input[type=checkbox]:checked").length === 0) {
  alert('Please select quantity at least for one trailer');
  return false;
}	

if(document.getElementById('chk_1').checked){
var se_1 = document.getElementById("select_1");
var se_EXE = se_1.options[se_1.selectedIndex].value;
if(se_EXE <=0){
document.getElementById("text1").style.color='Red';
alert("Please select qty for selected trailer");
return false;
}
}

if(document.getElementById('chk_2').checked){
var se_1 = document.getElementById("select_2");
var se_EXE = se_1.options[se_1.selectedIndex].value;
if(se_EXE <=0){
document.getElementById("text2").style.color='Red';
alert("Please select qty for selected trailer");
return false;
}
}

if(document.getElementById('chk_3').checked){
var se_1 = document.getElementById("select_3");
var se_EXE = se_1.options[se_1.selectedIndex].value;
if(se_EXE <=0){
document.getElementById("text3").style.color='Red';
alert("Please select qty for selected trailer");
return false;
}
}

}
</script>
<body onLoad="AddTrailerTotal(<?php echo $get['price_one']; ?>,<?php echo $get['price_two']; ?>);">
<?php include('includes/header-dev.php'); ?>
<div class="stepSec">
<?php include('includes/sub_menu-dev.php'); ?>
<div class="topMain">
   <div class="continueArea">
      <form action="step-3-dev.php" name="myForm" method="post" onSubmit="return validateForm()">
      <div class="roundArea2">
         <div class="fastbxtopTxt">
            <div class="twentyFootLft"><?php echo $get['trailer_one'].'&nbsp;'.'foot'; ?><br /><p>Trailer</p>
						</div>
            <div class="toprightPnl"><?php echo stripslashes($get['dimention_one']); ?><br /><p>Typically holds <?php echo $get['holder_one']; ?> rooms</p>
            </div>
         </div>
         <div class="quantitySec">
            <div class="quntmain">
               <div class="qunttxt"><h4 id="text1">Quantity:</h4>
						</div>
            <div class="quntbrdr">
               <select id="select_1"  class="jmpsec" name="step_2_product_qty_one"  onChange="getTrailerDetailTwo(this.value,<?php echo $get['price_one']; ?>,'sec1-one','sec1-two','chk_1','text100'); AddTrailerTotal(<?php echo $get['price_one']; ?>,<?php echo $get['price_two']; ?>);">
               <?php 
                  for($i=0;$i<4;$i++)
							    	{
               ?>
                       <option <?php if(isset($_SESSION['pageOneData_one']) && $_SESSION['pageOneData_one']['step_2_product_code_one']==1 && $_SESSION['pageOneData_one']['step_2_product_qty_one']==$i){?> selected  <?php }?> value="<?php echo $i; ?>">
												   <?php echo $i; ?>
												</option>
               <?php
                    }
               ?>
               </select>
            </div>
 			   </div>
         <div class="pricePrt">
            <?php 
               if(isset($_SESSION['pageOneData_one']) && $_SESSION['pageOneData_one']['step_2_product_code_one']==1)
			 		        {
                     $getPriceArryTwo = explode('.',$_SESSION['pageOneData_one']['step_2_product_price_one']);
                  }
							 else
							    {
                     $getPriceArryTwo = explode('.',$get['price_one']);
                  }
            ?>
                  <h4><p class="dollersign">$</p><b id="sec1-one"><?php echo $getPriceArryTwo[0]; ?></b><p id="sec1-two">.<?php echo $getPriceArryTwo[1]; ?></p></h4>
                  <div class="dailyRntal">
									   <p>Daily Rental</p>
									</div>
               </div>
               <div class="surcharge">
                  <span style="margin:0 0 0 -69px">+Surcharge</span>
                  <p style="margin:15px 0 0 0;">(<?php echo $get['serchanges_one']; ?> per mile)</p>
              </div>
           </div>
           <div class="continueBtn">
              <b style="margin-right:91px; margin-top:8px; float:right;"><strong id="text100">I need a <?php echo $get['trailer_one'].'&nbsp;'.'foot'; ?> trailer</strong></b>
              <?php 
                 if(!empty($_SESSION['pageOneData_one']['step_2_product_qty_one']))
								    {
              ?>	
                       <input type="checkbox" value="Yes" name="chk_1" alt="chk_1" id="chk_1" checked  style="margin:10px 0 0 0; cursor:pointer">
              <?php 
							      } 
						     else
								    {
              ?>	
                       <input type="checkbox" value="Yes" name="chk_1" alt="chk_1" id="chk_1"  style="margin:10px 0 0 0; cursor:pointer">
             <?php 
						        } 
						 ?>
             <input type="hidden" name="step_2_product_code_one" value="1"  />
             <input type="hidden" name="step_2_product_price_one" value="<?php echo $get['price_one']; ?>"  />
         </div>
      </div>
      <div class="roundArea2">
         <div class="fastbxtopTxt">
            <div class="twentyFootLft"><?php echo $get['trailer_two'].'&nbsp;'.'foot'; ?><br /><p>Trailer</p>
						</div>
            <div class="toprightPnl"><?php echo stripslashes($get['dimention_two']); ?><br /><p>Typically holds <?php echo $get['holder_two']; ?> rooms</p>
            </div>
         </div>
         <div class="quantitySec">
            <div class="quntmain">
               <div class="qunttxt"><h4 id="text2">Quantity:</h4>
							 </div>
               <div class="quntbrdr">
                  <select id="select_2"  class="jmpsec" name="step_2_product_qty_two" onChange="getTrailerDetailTwo(this.value,<?php echo $get['price_two']; ?>,'sec2-one','sec2-two','chk_2','text200'); AddTrailerTotal(<?php echo $get['price_one']; ?>,<?php echo $get['price_two']; ?>);">
                     <?php 
                        for($i=0;$i<4;$i++)
					   					    {
                     ?>
                             <option <?php if(isset($_SESSION['pageOneData_one']) && $_SESSION['pageOneData_one']['step_2_product_code_two']==2 && $_SESSION['pageOneData_one']['step_2_product_qty_two']==$i){?> selected  <?php }?> value="<?php echo $i; ?>">
										   			   <?php echo $i; ?>
												     </option>
                     <?php
                           } 
                     ?>
                  </select>
              </div>
           </div>
           <div class="pricePrt">
              <?php 
                 if(isset($_SESSION['pageOneData_one']) && $_SESSION['pageOneData_one']['step_2_product_code_two']==2)
			   				   {
					   			    $getPriceArryTwo = explode('.',$_SESSION['pageOneData_one']['step_2_product_price_two']);
							   	 }
   							else
		   					   {
				   				    $getPriceArryTwo = explode('.',$get['price_two']);
						  		 }
			    		?>
              <h4><p class="dollersign">$</p><b id="sec2-one"><?php echo $getPriceArryTwo[0]; ?></b><p id="sec2-two">.<?php echo $getPriceArryTwo[1]; ?></p></h4>
							<div class="dailyRntal"><p>Daily Rental</p>
							</div>
					</div>
					<div class="surcharge">
				  	 <span style="margin:0 0 0 -69px">+Surcharge</span>
					   <p style="margin:15px 0 0 0;">(<?php echo $get['serchanges_two']; ?> per mile )</p>
          </div>
       </div>
			 <div class="continueBtn">
		      <b style="margin-right:91px; margin-top:8px; float:right;"><strong id="text200">I need a <?php echo $get['trailer_two'].'&nbsp;'.'foot'; ?> trailer</strong></b>
          <?php 
             if(!empty($_SESSION['pageOneData_one']['step_2_product_qty_two']))
						    {
          ?>	
                   <input type="checkbox" value="Yes" name="chk_2" alt="chk_2" id="chk_2" checked style="margin:10px 0 0 0; cursor:pointer">
          <?php 
					      }
						 else
						    {
          ?>	
                   <input type="checkbox" value="Yes" name="chk_2" alt="chk_2" id="chk_2" style="margin:10px 0 0 0; cursor:pointer">
          <?php 
								} 
					?>
          <input type="hidden" name="step_2_product_code_two" value="2"  />
          <input type="hidden" name="step_2_product_price_two" value="<?php echo $get['price_two']; ?>"  />
       </div>
   </div>



   <input type="hidden" name="c_catagory" value="<?php echo $_SESSION['pageOneData']['c_catagory']; ?>" />
   <input type="hidden" name="date_to_move" value="<?php echo $_SESSION['pageOneData']['date_to_move']; ?>" />
   <input type="hidden" name="name" value="<?php echo $_SESSION['pageOneData']['name']; ?>"  />
   <input type="hidden" name="phone_no" value="<?php echo $_SESSION['pageOneData']['phone_no']; ?>"  />
   <input type="hidden" name="email" value="<?php echo $_SESSION['pageOneData']['email']; ?>"  />


   <div style="float:right" class="reservationDetails">
      <h2>CHARGES UPON INITIAL DELIVERY</h2>
      <div class="delRow1">
         <h5>Trailer rental <br />Cost Total
	          <p class="contTop" id="trailertotal">$0.00</p>
				 </h5>
			</div>										

			<input type="submit" value="Submit_val_2" name="submit" alt="Submit" class="submit" style="float:right;" >
		  </form>
      <p style="margin-top:10px;"><strong><?php echo $adminData['slogan']; ?></strong></p>
   </div>
</div>
</div>

<?php include('includes/footer-dev.php'); 
ob_end_flush();
?>