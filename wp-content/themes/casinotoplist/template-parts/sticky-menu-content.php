<?php $header_sticky_menu=get_field('header_sticky_menu');?>
 <?php if(!empty($header_sticky_menu)){
 	foreach($header_sticky_menu as $key=>$menu_elem){
 		?>
 		<div id="<?php echo sanitize_title($menu_elem['label']);?>">
 			<?php echo do_shortcode($menu_elem['description']);?>
 		</div>
 		<?php
 	}
}?>