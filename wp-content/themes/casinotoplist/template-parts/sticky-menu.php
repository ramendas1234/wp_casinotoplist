<?php 
$header_sticky_menu=get_field('header_sticky_menu');
if(!empty($header_sticky_menu)){
?>
<div class="sticky-menu">
  <div class="container">
    <nav class="sticky-menu-links">
      <ul class="quick-menu">
        <?php foreach($header_sticky_menu as $key=>$menu_elem){
          ?>
          <li><a href="#<?php echo sanitize_title($menu_elem['label']);?>"><?php echo $menu_elem['label'];?></a></li>
          <?php
        }?>
      </ul>
    </nav>    
  </div>
</div>
<?php } ?>