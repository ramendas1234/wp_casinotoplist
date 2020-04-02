<div class="right-panel">
    <span><?php _e('Supported casinos','ctl');?></span>
                                <ul>
    <?php global $global_settings; ?>
    <?php
    if (!empty($table_partner)) {
        foreach ($table_partner as $p) {
            include('product-info.php');
            ?>
            <li><a href="<?php echo $review_link;?>"><img src="<?php echo !empty($image)?$image:TOPLIST_URL.'images/notallowed.png';?>" alt="<?php echo $partner;?>"></a></li>
            <?php
        }
    } else {
        ?>
        <li><a href="javascript:void(0);"><?php _e('No supported casinos found','ctl');?></a></li>
        <?php
    }
    ?>
</ul>
</div>