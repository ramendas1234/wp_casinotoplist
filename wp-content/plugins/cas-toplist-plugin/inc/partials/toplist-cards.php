<?php global $global_settings; ?>
<?php
if(!empty($table_partner)) {
    foreach ($table_partner as $p) {
        include('toplist-card.php');
    }
}
?>
       
