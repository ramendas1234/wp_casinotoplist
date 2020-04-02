<?php global $global_settings; ?>
<?php
foreach ($table_software_provider as $psw) :
    $product_id = $psw['product_id'];
    $software_id = $psw['software_id'];
    $software_provider_file_url = $psw['url'];
    $software_provider_name = $psw['name'];
    $live_casino = $psw['live_casino'];
    ?>
    <li class="list-group-item background-color--lima">
        <img src="<?php echo $software_provider_file_url ?>" alt="<?php echo $software_provider_name ?>">
    </li>
<?php
endforeach;
?>

<li class="list-group-item more"><p><?php _e('View More','cjp');?><?php //echo$global_settings['view_more'] ?></p></li>
<li class="list-group-item" style="display: none;">
</li>