<?php global $global_settings; ?>
<?php
if(!empty($table_partner)){
  ?>
  <ul>
  <?php
  foreach ($table_partner as $p) {
    include('product-info.php');
    ?>
    <li><a href="<?php echo $goto_link;?>"><img src="<?php echo !empty($image)?$image:TOPLIST_URL.'images/notallowed.png';?>" alt="<?php echo $partner;?>"></a>
    </li>
    <?php
  }
  ?>
  </ul>
  <?php
}?>
