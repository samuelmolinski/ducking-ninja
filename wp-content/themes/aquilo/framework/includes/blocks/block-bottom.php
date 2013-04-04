<?php
/**
 * @package WordPress
 * @subpackage Aquilo Theme
 */ 
 


//bottom widgets columns
$bottom_a = sidebar_exist_and_active('bottom-a');
$bottom_b = sidebar_exist_and_active('bottom-b');
$bottom_c = sidebar_exist_and_active('bottom-c');
$bottom_d = sidebar_exist_and_active('bottom-d');



//columns layout
$bottom_four_columns_layout = mb2_theme_option('aquilo_bottom_layout_4_cols');
$bottom_three_columns_layout = mb2_theme_option('aquilo_bottom_layout_3_cols');
$bottom_two_columns_layout = mb2_theme_option('aquilo_bottom_layout_2_cols');




//four columns grid
if ($bottom_four_columns_layout=='25,25,25,25') {
	$grid_4col_1 = 'col-6';
	$grid_4col_2 = 'col-6';
	$grid_4col_3 = 'col-6';
	$grid_4col_4 = 'col-6';
}
elseif ($bottom_four_columns_layout=='50,15,15,15') {
	$grid_4col_1 = 'col-12';
	$grid_4col_2 = 'col-4';
	$grid_4col_3 = 'col-4';
	$grid_4col_4 = 'col-4';
}
elseif ($bottom_four_columns_layout=='15,15,15,50') {
	$grid_4col_1 = 'col-4';
	$grid_4col_2 = 'col-4';
	$grid_4col_3 = 'col-4';
	$grid_4col_4 = 'col-12';
}
elseif ($bottom_four_columns_layout=='15,50,15,15') {
	$grid_4col_1 = 'col-4';
	$grid_4col_2 = 'col-12';
	$grid_4col_3 = 'col-4';
	$grid_4col_4 = 'col-4';
}
elseif ($bottom_four_columns_layout=='15,15,50,15') {
	$grid_4col_1 = 'col-4';
	$grid_4col_2 = 'col-4';
	$grid_4col_3 = 'col-12';
	$grid_4col_4 = 'col-4';
}
elseif ($bottom_four_columns_layout=='40,20,20,20') {
	$grid_4col_1 = 'col-9';
	$grid_4col_2 = 'col-5';
	$grid_4col_3 = 'col-5';
	$grid_4col_4 = 'col-5';
}
elseif ($bottom_four_columns_layout=='20,20,20,40') {
	$grid_4col_1 = 'col-5';
	$grid_4col_2 = 'col-5';
	$grid_4col_3 = 'col-5';
	$grid_4col_4 = 'col-9';
}
elseif ($bottom_four_columns_layout=='20,40,20,20') {
	$grid_4col_1 = 'col-5';
	$grid_4col_2 = 'col-9';
	$grid_4col_3 = 'col-5';
	$grid_4col_4 = 'col-5';
}
elseif ($bottom_four_columns_layout=='20,20,40,20') {
	$grid_4col_1 = 'col-5';
	$grid_4col_2 = 'col-5';
	$grid_4col_3 = 'col-9';
	$grid_4col_4 = 'col-5';
}




//three columns grid
if ($bottom_three_columns_layout=='33,33,33') {
	$grid_3col_1 = 'col-8';
	$grid_3col_2 = 'col-8';
	$grid_3col_3 = 'col-8';
}
elseif ($bottom_three_columns_layout=='50,25,25'){
	$grid_3col_1 = 'col-12';
	$grid_3col_2 = 'col-6';
	$grid_3col_3 = 'col-6';
}
elseif ($bottom_three_columns_layout=='25,25,50'){
	$grid_3col_1 = 'col-6';
	$grid_3col_2 = 'col-6';
	$grid_3col_3 = 'col-12';
}
elseif ($bottom_three_columns_layout=='35,25,40'){
	$grid_3col_1 = 'col-8';
	$grid_3col_2 = 'col-6';
	$grid_3col_3 = 'col-10';
}
elseif ($bottom_three_columns_layout=='40,25,35'){
	$grid_3col_1 = 'col-10';
	$grid_3col_2 = 'col-6';
	$grid_3col_3 = 'col-8';
}




//two columns grid
if ($bottom_two_columns_layout=='50,50') {
	$grid_2col_1 = 'col-12';
	$grid_2col_2 = 'col-12';
}
elseif ($bottom_two_columns_layout=='75,25') {
	$grid_2col_1 = 'col-18';
	$grid_2col_2 = 'col-6';
}
elseif ($bottom_two_columns_layout=='25,75') {
	$grid_2col_1 = 'col-6';
	$grid_2col_2 = 'col-18';
}
elseif ($bottom_two_columns_layout=='60,40') {
	$grid_2col_1 = 'col-16';
	$grid_2col_2 = 'col-8';
}
elseif ($bottom_two_columns_layout=='40,60') {
	$grid_2col_1 = 'col-8';
	$grid_2col_2 = 'col-16';
}





if ($bottom_a || $bottom_b || $bottom_c || $bottom_d ){
?>





<section id="bottom">
<div class="wrap">
		
		
				
	<?php //four columns widgets
	if ($bottom_a && $bottom_b && $bottom_c && $bottom_d) { ?>		
		<div class="<?php echo $grid_4col_1; ?>"><?php dynamic_sidebar('bottom-a'); ?></div>
		<div class="<?php echo $grid_4col_2; ?>"><?php dynamic_sidebar('bottom-b'); ?></div>
		<div class="<?php echo $grid_4col_3; ?>"><?php dynamic_sidebar('bottom-c'); ?></div>
		<div class="<?php echo $grid_4col_4; ?>"><?php dynamic_sidebar('bottom-d'); ?></div>				
			



			
	<?php //three columns widgets
	}
	elseif (!$bottom_a && $bottom_b && $bottom_c && $bottom_d) { ?>
		<div class="<?php echo $grid_3col_1; ?>"><?php dynamic_sidebar('bottom-b'); ?></div>
		<div class="<?php echo $grid_3col_2; ?>"><?php dynamic_sidebar('bottom-c'); ?></div>
		<div class="<?php echo $grid_3col_3; ?>"><?php dynamic_sidebar('bottom-d'); ?></div>		
	<?php 
	}
	elseif ($bottom_a && !$bottom_b && $bottom_c && $bottom_d) { ?>
		<div class="<?php echo $grid_3col_1; ?>"><?php dynamic_sidebar('bottom-a'); ?></div>
		<div class="<?php echo $grid_3col_2; ?>"><?php dynamic_sidebar('bottom-c'); ?></div>
		<div class="<?php echo $grid_3col_3; ?>"><?php dynamic_sidebar('bottom-d'); ?></div>		
	<?php 
	}
	elseif ($bottom_a && $bottom_b && !$bottom_c && $bottom_d) { ?>
		<div class="<?php echo $grid_3col_1; ?>"><?php dynamic_sidebar('bottom-a'); ?></div>
		<div class="<?php echo $grid_3col_2; ?>"><?php dynamic_sidebar('bottom-b'); ?></div>
		<div class="<?php echo $grid_3col_3; ?>"><?php dynamic_sidebar('bottom-d'); ?></div>		
	<?php
	}
	elseif ($bottom_a && $bottom_b && $bottom_c && !$bottom_d) { ?>
		<div class="<?php echo $grid_3col_1; ?>"><?php dynamic_sidebar('bottom-a'); ?></div>
		<div class="<?php echo $grid_3col_2; ?>"><?php dynamic_sidebar('bottom-b'); ?></div>
		<div class="<?php echo $grid_3col_3; ?>"><?php dynamic_sidebar('bottom-c'); ?></div>	
				
		
		
		
		
		
	<?php //two columns widgets
	}
	elseif (!$bottom_a && !$bottom_b && $bottom_c && $bottom_d) { ?>
		<div class="<?php echo $grid_2col_1; ?>"><?php dynamic_sidebar('bottom-c'); ?></div>
		<div class="<?php echo $grid_2col_2; ?>"><?php dynamic_sidebar('bottom-d'); ?></div>			
	<?php
	}
	elseif (!$bottom_a && $bottom_b && !$bottom_c && $bottom_d) { ?>
		<div class="<?php echo $grid_2col_1; ?>"><?php dynamic_sidebar('bottom-b'); ?></div>
		<div class="<?php echo $grid_2col_2; ?>"><?php dynamic_sidebar('bottom-d'); ?></div>		
		<?php 
	}
	elseif (!$bottom_a && $bottom_b && $bottom_c && !$bottom_d) { ?>
		<div class="<?php echo $grid_2col_1; ?>"><?php dynamic_sidebar('bottom-b'); ?></div>
		<div class="<?php echo $grid_2col_2; ?>"><?php dynamic_sidebar('bottom-c'); ?></div>		
	<?php 
	}
	elseif ($bottom_a && !$bottom_b && $bottom_c && !$bottom_d) { ?>
		<div class="<?php echo $grid_2col_1; ?>"><?php dynamic_sidebar('bottom-a'); ?></div>
		<div class="<?php echo $grid_2col_2; ?>"><?php dynamic_sidebar('bottom-c'); ?></div>		
	<?php 
	}
	elseif ($bottom_a && $bottom_b && !$bottom_c && !$bottom_d) { ?>
		<div class="<?php echo $grid_2col_1; ?>"><?php dynamic_sidebar('bottom-a'); ?></div>
		<div class="<?php echo $grid_2col_2; ?>"><?php dynamic_sidebar('bottom-b'); ?></div>		
	<?php 
	} elseif ($bottom_a && !$bottom_b && !$bottom_c && $bottom_d) { ?>
		<div class="<?php echo $grid_2col_1; ?>"><?php dynamic_sidebar('bottom-a'); ?></div>
		<div class="<?php echo $grid_2col_2; ?>"><?php dynamic_sidebar('bottom-d'); ?></div>
			
			
		
		
		
		
		
	<?php //one column widget
	}
	elseif ($bottom_a && !$bottom_b && !$bottom_c && !$bottom_d) { ?>
		<div class="col-24"><?php dynamic_sidebar('bottom-a'); ?></div>		
	<?php 
	}
	elseif (!$bottom_a && $bottom_b && !$bottom_c && !$bottom_d) { ?>
		<div class="col-24"><?php dynamic_sidebar('bottom-b'); ?></div>		
	<?php 
	}
	elseif (!$bottom_a && !$bottom_b && $bottom_c && !$bottom_d) { ?>
		<div class="col-24"><?php dynamic_sidebar('bottom-c'); ?></div>			
	<?php 
	}
	elseif (!$bottom_a && !$bottom_b && !$bottom_c && $bottom_d) { ?>
		<div class="col-24"><?php dynamic_sidebar('bottom-d'); ?></div>
			
	<?php } ?>
		
	<div class="clear"></div>
</div>
</section>

<?php } ?>