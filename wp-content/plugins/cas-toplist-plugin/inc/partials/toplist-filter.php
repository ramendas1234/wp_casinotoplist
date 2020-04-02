<div class="row">
  <div class="col-12">
    <div class="online-casino-header">
        <div class="ct-section-title">
          <h6><i class="icon icon-casinos"></i> <?php printf(__('Best Online Casinos %s','ctl'),do_shortcode('[current_date format="Y"]'));?></h6>
          <div class="right-filter">
            <div class="filter-btn js-filter-btn"><?php _e('Filter','ctl');?></div>
            <div class="select-style">
                <select>
                  <option>Sort By: Recommended</option>
                  <option>Sort By: Total Bonus</option>
                  <option>Sort By: First Deposit Match</option>
                  <option>Sort By: Number Of Games</option>
                  <option>Sort By: Highest RTP</option>
                  <option>Sort By: Oldest</option>
                </select>
            </div>
          </div>
        </div>
        <div class="filter-dropdown" style="display: none;">
            <div class="filter-dropdown-bar">
              <div class="select-style">
                  <select>
                    <option><?php _e('Deposit Options','ctl');?></option>
                    <option>Paypal</option>
                    <option>Visa</option>
                    <option>Neteller</option>
                    <option>Skrill</option>
                    <option>masterCard</option>
                  </select>
              </div>
              <div class="select-style">
                  <select>
                    <option><?php _e('Support','ctl');?></option>
                    <option>Live Chat</option>
                    <option>Email</option>
                  </select>
              </div>
              <div class="select-style">
                  <select>
                    <option><?php _e('Bonus type','ctl');?></option>
                    <option>Welcome Package</option>
                    <option>First Deposit Bonus</option>
                  </select>
              </div>
              <button class="cta-clear">✕ <?php _e('Clear filters','ctl');?></button>
            </div>
        </div>
    </div>
  </div>
  <?php include 'toplist-with-pros-cons.php';?>
</div>