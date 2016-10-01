<iframe width="174" height="189" name="gToday:normal1:agenda1.js" id="gToday:normal1:agenda1.js" src="<?PHP echo(SITE_URL);?>calender/ipopeng.htm" scrolling="no" frameborder="0" style="LEFT: -500px; POSITION: absolute; TOP: 0px; VISIBILITY: visible; Z-INDEX: 999">
</iframe>
<?php
if((isset($message) && $message!='') || (isset($_GET['message']) && $_GET['message']!=''))
{
	if(isset($_GET['message']) && $_GET['message']!='')
	{
		$msg = base64_decode($_GET['message']);
		//$msg = $_GET['message'];
	}
	if(isset($message) && $message!='')
	{
		$msg = $message;
	}
	$split_message = explode(':',$msg);
	if($split_message[0] == "Success")
	{
?>
<script type="text/javascript">
	$(function() {
	 $.notifyBar({ cls: "success", html: "<?php echo($split_message[1])?>", delay: 2000, animationSpeed: "slow" });
	});
</script>
<?php
	}
	if($split_message[0] == "Error")
	{
?>
<script type="text/javascript">
	$(function() {
	 $.notifyBar({ cls: "error", html: "<?php echo($split_message[1])?>", delay: 2000, animationSpeed: "slow" });
	});
</script>
<?php
	}
}
?>