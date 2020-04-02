<?php global $global_settings; ?>
<?php
$current_product_id=get_field('product_id');
if(!empty($table_partner)){
  foreach ($table_partner as $p) {
      if($p['product_id']==$current_product_id)continue;
      include('toplist-row.php');
  }
}else{ ?>
    <div class="best-casinos-row" style="width:100%;">
      <div class="row u-align-items-center">
          <div class="col col-12">
              <p class="nocasinos">
                    <?php echo get_field('not_available_msg','option');?>
              </p>
          </div>
      </div>
    </div>
<?php
}
?>
        