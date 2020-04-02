<div class="card-ratings">
                    <div class="rating-value">
                        <span class="result"><?php echo $rating; ?></span>/5
                    </div>
                    <div class="rating-stars">
                        <?php
                        for ($x = 1; $x <= $rating; $x++) {
                            ?>
                            <figure><img src="<?php echo TOPLIST_URL ?>/images/icons/star.svg" alt=""></figure>
                            <?php
                        }
                        if (strpos($rating, '.')) {
                            ?>
                            <figure><img src="<?php echo TOPLIST_URL ?>/images/icons/star_half.svg" alt=""></figure>
                            <?php
                            $x++;
                        }
                        while ($x <= 5) {
                            ?>
                            <figure><img src="<?php echo TOPLIST_URL ?>/images/icons/star_empty.svg" alt=""></figure>
                            <?php
                            $x++;
                        }
                        ?>
                    </div>
                </div>