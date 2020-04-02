<?php if (!empty($table_ratings)): ?>
    <div class="rating-dispaly-box">
        <div class="rating-boxes">
            <?php
            foreach ($table_ratings as $key => $each_rating):
                if ($key > 5):break;
                endif;
                $rating = round($each_rating['value'] / 2, 1);
                ?>  
                <div class="rating-box-outer">
                    <?php include 'ratings.php'; ?>
                    <span><?php echo $each_rating['criteria_name']; ?></span>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="total-rating">
            <?php include 'ratings.php'; ?>
            <span class="total">Total rate</span>
        </div>
    </div>


<?php endif; ?>