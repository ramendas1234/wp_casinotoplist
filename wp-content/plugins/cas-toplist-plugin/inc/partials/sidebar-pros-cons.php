<?php global $global_settings; ?>

<?php

$pros = array();
$cons = array();

foreach ($table_procons as $p) {
    if ($p['is_positive'] == 1) {
        array_push($pros, $p);
    } else {
        array_push($cons, $p);
    }
}
?>

<div class="row">
    <div class="col col-6 col-sm-12">
        <div class="toggle-panel">
            <div class="toggle-panel-header"><span><img src="<?php echo TOPLIST_URL;?>images/icons/positive.svg" alt="" /></span><?php _e('Positives','cjp');?> <i></i></div>
            <div class="toggle-panel-content">
                <ul class="list-decoration list-decoration-positive">
                    <?php foreach ($pros as $p) { ?>
                    <li><?php echo $p['description'] ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col col-6 col-sm-12">
        <div class="toggle-panel">
            <div class="toggle-panel-header"><span><img src="<?php echo TOPLIST_URL;?>images/icons/negative.svg" alt="" /></span><?php _e('Negatives','cjp');?> <i></i></div>
            <div class="toggle-panel-content">
                <ul class="list-decoration list-decoration-negative">
                    <?php foreach ($cons as $c) { ?>
                        <li><?php echo $c['description'] ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>