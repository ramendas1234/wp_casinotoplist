<?php global $global_settings; ?>
<?php
if (!empty($payment_options)) {
    ?>

    <div class="ct-supported-casinos">
        <div class="paypal-support-table payment-method">
            <div class="table-row">
                <div class="table-column img-col">&nbsp;</div>
                <div class="table-column bonus-col">
                    <p>Payment name</p>
                </div>
                <div class="table-column deposit-col">
                    <p>Deposit</p>
                </div>
                <div class="table-column withdrawl-col">
                    <p>Withdrawal</p>
                </div>
            </div>
            <?php
            $id = '';
            foreach ($payment_options as $payment_option) {
                if ($id == $payment_option['po_id']) {
                    continue;
                }
                ?>  

                <div class="table-row">
                    <div class="table-column img-col"><a href="#"><img src="<?php echo $payment_option['url']; ?>" alt="<?php echo $payment_option['name']; ?>"></a></div>
                    <div class="table-column bonus-col">
                        <p><?php echo $payment_option['name']; ?></p>
                    </div>
                    <div class="table-column deposit-col">
                        <img src="<?php echo CTL_URL ?>/images/icon/<?php echo ($payment_option['deposit'] == 1) ? 'true' : 'false' ?>.png" alt="" />
                    </div>
                    <div class="table-column withdrawl-col">
                        <img src="<?php echo CTL_URL ?>/images/icon/<?php echo ($payment_option['withdrawal'] == 1) ? 'true' : 'false' ?>.png" alt="" />
                    </div>
                </div>
        <?php $id = $payment_option['po_id'];
    } ?>
        </div>
    </div>
<?php } ?>
