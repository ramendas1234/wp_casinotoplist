<?php global $global_settings; ?>
<?php
if(!empty($table_partner)){
  foreach ($table_partner as $p) {
      include('roller-casino.php');
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
        