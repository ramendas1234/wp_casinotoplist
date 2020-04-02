<?php global $global_settings; ?>

<span class="review-sidebar__text">Software Providers</span>
<div class="review-sidebar__software read-more-inline">
    <div class="read-more-inline__wrap software-wrap">
      <ul>
        <?php
        foreach ($table_software_provider as $psw) :
            $product_id = $psw['product_id'];
            $software_id = $psw['software_id'];
            $software_provider_file_url = $psw['url'];
            $software_provider_name = $psw['name'];
            $live_casino = $psw['live_casino'];
        ?>
        <li><img class="software-providers-img lazy" data-  src="<?php echo $software_provider_file_url ?>" alt="<?php echo $software_provider_name ?>"/></li>
        <?php
        endforeach;
        ?>
      </ul>
    </div>
</div>