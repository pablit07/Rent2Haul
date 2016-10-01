<?
#######################################################################################################

	## FUNCTION FOR SET PAGINATION VARIABLE
	function get_pagination_variable($num_of_records, $requested_page_no, $display_num_rows)
	{
		if($requested_page_no <= 0)
			$requested_page_no = 1;
		
		$start_from = ($requested_page_no - 1) * $display_num_rows;
	
		if($num_of_records % $display_num_rows == 0) 
			$no_of_pages = (int)(($num_of_records / $display_num_rows));
		else 
			$no_of_pages = (int)(ceil($num_of_records / $display_num_rows));
		
		$arr_pagination_variable = array($requested_page_no, $no_of_pages, $start_from, $display_num_rows);
		return $arr_pagination_variable;
	}
	## END OF FUNCTION FOR SET PAGINATION VARIABLE

#######################################################################################################

	## FUNCTION FOR DISPLAY PAGINATION FOR FORUM
	function display_pagination_all($requested_page_no, $no_of_pages) {
		$pagination_code = "";
		
		if($requested_page_no - 1 > 0)
		{	
			$previous = ($requested_page_no - 1);
			
			$pagination_code .= "<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit(1);'>1</a>&nbsp;&nbsp;";
		}
		
		if($requested_page_no - 1 > 0)
		{	
			$previous = ($requested_page_no - 1);
			
			$pagination_code .= "<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit($requested_page_no-1);'>&lt;&nbsp;Prev</a>&nbsp;&nbsp;";
		}
		$pagination_code .= "<span class='".$pagination_class_on."'><b>Page - $requested_page_no</b></span>&nbsp;";
		
		if($requested_page_no < $no_of_pages)
		{
			$pagination_code .= "&nbsp;<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit($requested_page_no+1);'>Next&nbsp;&gt;</a>&nbsp;";
		}
		if($requested_page_no < $no_of_pages)
		{
			$pagination_code .= "&nbsp;<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit($no_of_pages);'>..$no_of_pages</a>&nbsp;";
		}
		
		return $pagination_code;
	}
	
	function display_pagination_story1($requested_page_no, $no_of_pages, $pagination_text = '') {
		$pagination_code = "";
		
		/*if($requested_page_no - 1 > 0)
		{	
			$previous = ($requested_page_no - 1);
			
			$pagination_code .= "<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit(1);'>1</a>&nbsp;&nbsp;";
		}*/
		
		/*if($requested_page_no - 1 > 0)
		{	
			$previous = ($requested_page_no - 1);
			
			$pagination_code .= "<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit($requested_page_no-1);'>&lt;&nbsp;Prev</a>&nbsp;&nbsp;";
		}*/
		$pagination_code .= "<b>$pagination_text $requested_page_no</b>&nbsp;";
		
		/*if($requested_page_no < $no_of_pages)
		{
			$pagination_code .= "&nbsp;<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit($requested_page_no+1);'>Next&nbsp;&gt;</a>&nbsp;";
		}*/
		if($requested_page_no < $no_of_pages)
		{
			$pagination_code .= "<b>of $no_of_pages</b>";
		}
		
		return $pagination_code;
	}
	function display_pagination_all2($requested_page_no1, $no_of_pages1) {
		$pagination_code = "";
		
		if($requested_page_no1 - 1 > 0)
		{	
			$previous = ($requested_page_no1 - 1);
			
			$pagination_code .= "<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit1(1);'>1</a>&nbsp;&nbsp;";
		}
		
		if($requested_page_no1 - 1 > 0)
		{	
			$previous = ($requested_page_no1 - 1);
			
			$pagination_code .= "<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit1($requested_page_no1-1);'>&lt;&nbsp;Prev</a>&nbsp;&nbsp;";
		}
		$pagination_code .= "<span class='".$pagination_class_on."'><b>Page - $requested_page_no</b></span>&nbsp;";
		
		if($requested_page_no1 < $no_of_pages1)
		{
			$pagination_code .= "&nbsp;<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit1($requested_page_no1+1);'>Next&nbsp;&gt;</a>&nbsp;";
		}
		if($requested_page_no1 < $no_of_pages1)
		{
			$pagination_code .= "&nbsp;<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit1($no_of_pages1);'>..$no_of_pages1</a>&nbsp;";
		}
		
		return $pagination_code;
	}
	
	function display_pagination_story($requested_page_no, $no_of_pages) {
		$pagination_code = "";
		
		if($requested_page_no - 1 > 0)
		{	
			$previous = ($requested_page_no - 1);
			
			$pagination_code .= "<li class=next><a href=\"#\" onClick=\"return pagination_submit(1);\">� First</a></li>";
		}
		
		if($requested_page_no - 1 > 0)
		{	
			$previous = ($requested_page_no - 1);
			
			$pagination_code .= "<li class=next><a href=\"#\" onClick=\"return pagination_submit($requested_page_no-1);\">� Previous</a></li>";
		}
		if($requested_page_no - 10 <= 0)
			$i = 1;
		else
			$i = $requested_page_no - 10;

		for($j = 1; $i <= $no_of_pages && $j <= 20; $i++, $j++)
		{
			if($i != $requested_page_no)
			{
				$pagination_code .= "<li><a href='#' onClick='return pagination_submit($i);'>$i</a></li>";
			}
			else
				$pagination_code .= "<li class=active>$i</li>";
		} 
		
		if($requested_page_no < $no_of_pages)
		{
			$pagination_code .= "<li class=next><a href=\"#\" onClick=\"return pagination_submit($requested_page_no+1);\">Next �</a></li>";
		}
		if($requested_page_no < $no_of_pages)
		{
			$pagination_code .= "<li class=next><a href=\"#\" onClick=\"return pagination_submit($no_of_pages);\">Last �</a></li>";
		}
		
		return $pagination_code;
	}
	
	
	function display_pagination_activity($requested_page_no, $no_of_pages) {
		$pagination_code = "";
		if(strpos($no_of_pages,'.') == true)$no_of_pages=round($no_of_pages)+1;
/*		if($requested_page_no - 1 > 0)
		{	
			$previous = ($requested_page_no - 1);
			
			$pagination_code .= "<li class=next><a href=\"#\" onClick=\"return pagination_submit(1);\">� First</a></li>";
		}
*/		
		if($requested_page_no - 1 > 0)
		{	
			$previous = ($requested_page_no - 1);
			
			$pagination_code .= "<li><a href=\"#\" onClick=\"return pagination_submit($requested_page_no-1);\"><span>Previous</span></a></li>";
		}
		if($requested_page_no - 10 <= 0)
			$i = 1;
		else
			$i = $requested_page_no - 10;

		for($j = 1; $i <= $no_of_pages && $j <= 20; $i++, $j++)
		{
			if($i != $requested_page_no)
			{
				$pagination_code .= "<li><a href='#' onClick='return pagination_submit($i);'><span>$i</span></a></li>";
			}
			else
				$pagination_code .= "<li class='selected'><a href='#'><span>$i</span></a></li>";
		} 
		//$pagination_code .= "<li><b>Page - $requested_page_no of $no_of_pages</b></li>";
		if($requested_page_no < $no_of_pages)
		{
			$pagination_code .= "<li><a href=\"#\" onClick=\"return pagination_submit($requested_page_no+1);\"><span>Next</span></a></li>";
		}
		/*if($requested_page_no < $no_of_pages)
		{	
			
			
			$pagination_code .= "<li class=next><a href=\"#\" onClick=\"return pagination_submit($no_of_pages);\">Last �</a></li>";
		}*/
		
		return $pagination_code;
	}
	
	function display_pagination_manageactivity($requested_page_no, $no_of_pages, $total_count) {
		$pagination_code = "";
		
		if($requested_page_no - 1 > 0)
		{	
			$previous = ($requested_page_no - 1);
			
			//$pagination_code .= "<li class=next><a href=\"#\" onClick=\"return pagination_submit(1);\">� First</a></li>";
			$pagination_code .= "<li><a href=\"#\" onClick=\"return pagination_submit(1);\" style=text-decoration:underline>&#60;&#60; First&nbsp;</a></li>";
		}
		
		if($requested_page_no - 1 > 0)
		{	
			$previous = ($requested_page_no - 1);
			
			//$pagination_code .= "<li class=next><a href=\"#\" onClick=\"return pagination_submit($requested_page_no-1);\">� Previous</a></li>";
			$pagination_code .= "<li><a href=\"#\" onClick=\"return pagination_submit($requested_page_no-1);\" style=text-decoration:underline>&#60; Prev</a></li>";
		}
		if($requested_page_no - 10 <= 0)
			$i = 1;
		else
			$i = $requested_page_no - 10;

		/*for($j = 1; $i <= $no_of_pages && $j <= 20; $i++, $j++)
		{
			if($i != $requested_page_no)
			{
				//$pagination_code .= "<li><a href='#' onClick='return pagination_submit($i);'>$i</a></li>";
			}
			else
				//$pagination_code .= "<li>$i</li>";
		} */
		$pagination_code .= "<li>&nbsp;Page - $requested_page_no of $no_of_pages&nbsp;</li>";
		if($requested_page_no < $no_of_pages)
		{
			//$pagination_code .= "<li class=next><a href=\"#\" onClick=\"return pagination_submit($requested_page_no+1);\">Next �</a></li>";
			$pagination_code .= "<li><a href=\"#\" onClick=\"return pagination_submit($requested_page_no+1);\" style=text-decoration:underline>Next &#62;&nbsp;</a></li>";
		}
		if($requested_page_no < $no_of_pages)
		{
			//$pagination_code .= "<li class=next><a href=\"#\" onClick=\"return pagination_submit($no_of_pages);\">Last �</a></li>";
			$pagination_code .= "<li><a href=\"#\" onClick=\"return pagination_submit($no_of_pages);\" style=text-decoration:underline>Last &#62;&#62;</a></li>";
		}
		
		return $pagination_code;
	}
	## FUNCTION FOR DISPLAY PAGINATION FOR FORUM
	function display_pagination_talk($requested_page_no, $no_of_pages, $pagination_text = '') {
		$pagination_code = "";
		
		if($requested_page_no - 1 > 0)
		{	
			$previous = ($requested_page_no - 1);
			
			$pagination_code .= "<a class='".$pagination_class_off."' href='#' onClick='return pagination_talk_submit($requested_page_no-1);'>&lt;&nbsp;Prev</a>&nbsp;&nbsp;";
		}
		$pagination_code .= "<span class='".$pagination_class_on."'><b>$pagination_text $requested_page_no</b></span>&nbsp;";
		
		if($requested_page_no < $no_of_pages)
		{
			$pagination_code .= "&nbsp;<a class='".$pagination_class_off."' href='#' onClick='return pagination_talk_submit($requested_page_no+1);'>Next&nbsp;&gt;</a>&nbsp;";
		}
		/*if($requested_page_no < $no_of_pages)
		{
			$pagination_code .= "&nbsp;<a class='".$pagination_class_off."' href='#' onClick='return pagination_talk_submit($no_of_pages);'>..$no_of_pages</a>&nbsp;";
		}*/
		
		return $pagination_code;
	}
	function display_pagination_circle_talk($requested_page_no, $no_of_pages, $pagination_class_on = 'forumPagination', $pagination_class_off = 'forumPagination', $pagination_text = '') {
		$pagination_code = "";
		
		if($requested_page_no - 1 > 0)
		{	
			$previous = ($requested_page_no - 1);
			
			$pagination_code .= "<a class='".$pagination_class_off."' href='#' onClick='return pagination_talk_submit($requested_page_no-1);'>&lt;&nbsp;Prev</a>&nbsp;&nbsp;";
		}
		$pagination_code .= "<span class='".$pagination_class_on."'><b>$pagination_text $requested_page_no</b></span>&nbsp;";
		
		if($requested_page_no < $no_of_pages)
		{
			$pagination_code .= "&nbsp;<a class='".$pagination_class_off."' href='#' onClick='return pagination_talk_submit($requested_page_no+1);'>Next&nbsp;&gt;</a>&nbsp;";
		}
		/*if($requested_page_no < $no_of_pages)
		{
			$pagination_code .= "&nbsp;<a class='".$pagination_class_off."' href='#' onClick='return pagination_talk_submit($no_of_pages);'>..$no_of_pages</a>&nbsp;";
		}*/
		
		return $pagination_code;
	}
#######################################################################################################	
#######################################################################################################
	## FUNCTION FOR DISPLAY PAGINATION FOR FORUM
	function display_pagination_findplot($requested_page_no, $no_of_pages, $pagination_class_on = 'forumPagination', $pagination_class_off = 'forumPagination', $pagination_text = '',$plot_id) {
		$pagination_code = "";
		
		if($requested_page_no - 1 > 0)
		{	
			$previous = ($requested_page_no - 1);
			
			$pagination_code .= "<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit(1);'>1</a>&nbsp;&nbsp;";
		}
		
		if($requested_page_no - 1 > 0)
		{	
			$previous = ($requested_page_no - 1);
			
			$pagination_code .= "<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit($requested_page_no-1);'>&lt;&nbsp;Prev</a>&nbsp;&nbsp;";
		}
		$pagination_code .= "<span class='".$pagination_class_on."'><a href='plot.php?plot_id=".$plot_id."&requested_page_no=".$requested_page_no."' class='".$pagination_class_off."'><b>$pagination_text $requested_page_no</b></a></span>&nbsp;";
		
		if($requested_page_no < $no_of_pages)
		{
			$pagination_code .= "&nbsp;<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit($requested_page_no+1);'>Next&nbsp;&gt;</a>&nbsp;";
		}
		if($requested_page_no < $no_of_pages)
		{
			$pagination_code .= "&nbsp;<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit($no_of_pages);'>..$no_of_pages</a>&nbsp;";
		}
		
		return $pagination_code;
	}
#######################################################################################################
function display_pagination_findplot_nonuser($requested_page_no, $no_of_pages, $pagination_class_on = 'forumPagination', $pagination_class_off = 'forumPagination', $pagination_text = '',$plot_id) {
		$pagination_code = "";
		
		if($requested_page_no - 1 > 0)
		{	
			$previous = ($requested_page_no - 1);
			
			$pagination_code .= "<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit(1);'>1</a>&nbsp;&nbsp;";
		}
		
		if($requested_page_no - 1 > 0)
		{	
			$previous = ($requested_page_no - 1);
			
			$pagination_code .= "<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit($requested_page_no-1);'>&lt;&nbsp;Prev</a>&nbsp;&nbsp;";
		}
		$pagination_code .= "<span class='".$pagination_class_on."'><a href='plot_read.php?plot_id=".$plot_id."&requested_page_no=".$requested_page_no."' class='".$pagination_class_off."'><b>$pagination_text $requested_page_no</b></a></span>&nbsp;";
		
		if($requested_page_no < $no_of_pages)
		{
			$pagination_code .= "&nbsp;<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit($requested_page_no+1);'>Next&nbsp;&gt;</a>&nbsp;";
		}
		if($requested_page_no < $no_of_pages)
		{
			$pagination_code .= "&nbsp;<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit($no_of_pages);'>..$no_of_pages</a>&nbsp;";
		}
		
		return $pagination_code;
	}		
#######################################################################################################	

	function display_pagination($requested_page_no, $no_of_pages, $pagination_class_on = 'pagination_on', $pagination_class_off = 'pagination_off')
	{
		$pagination_code = "";
		
		if($requested_page_no - 1 > 0)
		{	
			$previous = ($requested_page_no - 1);
			
			$pagination_code .= "<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit($requested_page_no-1);'>Prev</a>&nbsp;&nbsp;";
		}

		if($requested_page_no - 10 <= 0)
			$i = 1;
		else
			$i = $requested_page_no - 10;

		for($j = 1; $i <= $no_of_pages && $j <= 20; $i++, $j++)
		{
			if($i != $requested_page_no)
			{
				$pagination_code .= "<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit($i);'>$i</a>&nbsp;";
			}
			else
				$pagination_code .= "<span class='".$pagination_class_on."'>
				<b>$i</b></span>&nbsp;";
		} 
		if($requested_page_no < $no_of_pages)
		{
			$pagination_code .= "&nbsp;<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit($requested_page_no+1);'>Next</a>&nbsp;";
		}
		
		return $pagination_code;
	}
	## END OF FUNCTION FOR DISPLAY PAGINATION
	
	
	
	function display_pagination_read($requested_page_no, $no_of_pages, $pagination_class_on = 'forumPagination', $pagination_class_off = 'forumPagination', $pagination_text = '') {
		$pagination_code = "";
		
		if($requested_page_no - 1 > 0)
		{	
			$previous = ($requested_page_no - 1);
			
			$pagination_code .= "<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit($requested_page_no-1);'>&lt;&nbsp;Previous</a>&nbsp;&nbsp;";
		}
		$pagination_code .= "<span class='".$pagination_class_on."'><b>$pagination_text $requested_page_no</b></span>&nbsp;";
		
		if($requested_page_no < $no_of_pages)
		{
			$pagination_code .= "&nbsp;<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit($requested_page_no+1);'>Next&nbsp;&gt;</a>&nbsp;";
		}
		
		return $pagination_code;
	}
	
#######################################################################################################
#######################################################################################################

	## FUNCTION FOR SET PAGINATION VARIABLE
	function get_pagination_variable_story($num_of_records, $requested_page_no, $display_num_rows)
	{
	    //echo $requested_page_no;
		
		if($requested_page_no <= 0)
			$requested_page_no = 1;
			
		$start_from = ($requested_page_no - 1) * $display_num_rows;
	
		if($num_of_records % $display_num_rows == 0) 
			$no_of_pages = (int)(($num_of_records / $display_num_rows));
		else 
			$no_of_pages = (int)(ceil($num_of_records / $display_num_rows));
		
		$arr_pagination_variable = array($requested_page_no, $no_of_pages, $start_from, $display_num_rows);
		return $arr_pagination_variable;
	}
	## END OF FUNCTION FOR SET PAGINATION VARIABLE

#######################################################################################################

	## FUNCTION FOR DISPLAY PAGINATION FOR FORUM
	function display_pagination_all_story($requested_page_no, $no_of_pages) {
		$pagination_code = "";
		//echo $requested_page_no;
		
		if($requested_page_no - 1 > 0)
		{	
			$previous = ($requested_page_no - 1);
			
			$pagination_code .= "<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit(1);'>1</a>&nbsp;&nbsp;";
		}
		
		if($requested_page_no - 1 > 0)
		{	
			$previous = ($requested_page_no - 1);
			
			$pagination_code .= "<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit($requested_page_no-1);'>&lt;&nbsp;Prev</a>&nbsp;&nbsp;";
		}
		$pagination_code .= "<span class='".$pagination_class_on."'><b>Page - $requested_page_no</b></span>&nbsp;";
		
		if($requested_page_no < $no_of_pages)
		{
			$pagination_code .= "&nbsp;<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit($requested_page_no+1);'>Next&nbsp;&gt;</a>&nbsp;";
		}
		if($requested_page_no < $no_of_pages)
		{
			$pagination_code .= "&nbsp;<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit($no_of_pages);'>..$no_of_pages</a>&nbsp;";
		}
		
		return $pagination_code;
	}
	#######################################################################################################

	## FUNCTION FOR SET PAGINATION VARIABLE
	function get_pagination_variable_comment($num_of_records, $requested_page_no1, $display_num_rows)
	{
		if($requested_page_no1 <= 0)
			$requested_page_no1 = 1;
		
		$start_from = ($requested_page_no1 - 1) * $display_num_rows;
	
		if($num_of_records % $display_num_rows == 0) 
			$no_of_pages1 = (int)(($num_of_records / $display_num_rows));
		else 
			$no_of_pages1 = (int)(ceil($num_of_records / $display_num_rows));
		
		$arr_pagination_variable = array($requested_page_no1, $no_of_pages1, $start_from, $display_num_rows);
		return $arr_pagination_variable;
	}
	## END OF FUNCTION FOR SET PAGINATION VARIABLE

#######################################################################################################

	## FUNCTION FOR DISPLAY PAGINATION FOR FORUM
	function display_pagination_all_comment($requested_page_no1, $no_of_pages1) {
		$pagination_code = "";
		
		if($requested_page_no1 - 1 > 0)
		{	
			$previous = ($requested_page_no1 - 1);
			
			$pagination_code .= "<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit1(1);'>1</a>&nbsp;&nbsp;";
		}
		
		if($requested_page_no1 - 1 > 0)
		{	
			$previous = ($requested_page_no1 - 1);
			
			$pagination_code .= "<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit1($requested_page_no1-1);'>&lt;&nbsp;Prev</a>&nbsp;&nbsp;";
		}
		$pagination_code .= "<span class='".$pagination_class_on."'><b>Page - $requested_page_no1</b></span>&nbsp;";
		
		if($requested_page_no1 < $no_of_pages1)
		{
			$pagination_code .= "&nbsp;<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit1($requested_page_no1+1);'>Next&nbsp;&gt;</a>&nbsp;";
		}
		if($requested_page_no1 < $no_of_pages1)
		{
			$pagination_code .= "&nbsp;<a class='".$pagination_class_off."' href='#' onClick='return pagination_submit1($no_of_pages1);'>..$no_of_pages1</a>&nbsp;";
		}
		
		return $pagination_code;
	}
?>