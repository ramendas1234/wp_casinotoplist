<?php include('product-info.php'); ?>

<div class="payment-tabs__room">
    <div class="payment-tabs__info">
        <img src="img/icon-info.png"/>
    </div>
    <div class="row no-gutters">
        <div class="col-auto">
            <div class="payment-tabs__logo">
                <a class="cas-link" href="<?php echo $goto_link ?>" rel="nofollow">
                    <img src="<?php echo $image ?>" alt="<?php echo $partner ?>_logo"/>
                </a>
            </div>
        </div>
        <div class="col-auto">
            <p class="payment-tabs__bonus">
                Bonus details:
            </p>
            <p class="payment-tabs__amount">
                <?php
                if ($exc_bonus_amount != "" && $exc_bonus_amount != 0) {
                    echo $sign . $exc_bonus_amount;
                } else {
                    if ($bonus_amount != "" && $bonus_amount != 0) {
                        echo $sign . $bonus_amount;
                    } else {
                        echo "Get " . $freespin . " " . $freebie_name;
                    }
                }
                ?>
            </p>
            <a href="<?php echo $review_link ?>" class="payment-tabs__review">
                Review
            </a>
        </div>
        <div class="col-12 text-center mt-3">
            <a href="<?php echo $goto_link ?>" target="_blank" rel="nofollow" class="btn btn--blue btn--sm cas-link">
                <?php echo $button_text ?>
            </a>
        </div>
        <?php if ($term != "") { ?>
            <div class="col-12 toplist-row-tc">
                <?php echo $term; ?>
            </div>
        <?php } ?>
    </div>
</div>