<?php
global $global_settings;
//echo '<pre>';
//print_r($p);
//exit();
$id = $p['product_id'];
$partner = $p['product_name'];
$bonus_summary = $p['bonus_summary'];
$bonus_currency = $p['bonus_currency'];
$bonus_amount = number_format($p['bonus_amount']);
if(!empty($p['bonus_match'])){
    $bonus_match = $p['bonus_match'] . "%";
}else{
    $bonus_match = "";
}
$exc_bonus_amount = number_format($p['exclusive_bonus_amount']);
$exc_bonus_match = number_format($p['exclusive_bonus_match']) . "%";
$bonus_tc = $p['bonus_tc'];
$rating = $p['rating'];
$review_link = home_url() . $p['review_link'];
$goto_link = site_url() . '/' . $p['go_link'] . '/' . $p['slug'];
$term = $p['terms'];
$term_link = site_url() . '/' . $p['term_link'] . '/' . $p['slug'];
$background_color = $p['primary_colour'];
$min_deposit = $p['minimum_deposit'];
$asset_cat_name = $p['asset_category_name'];
$freespin = $p['freespin'];
$freebie_name = $p['freebie_name'];
$bonus_name = $p['bonus_name'];
$tag = explode( ' || ', $bonus_name );
$pros_cons = isset($p['procons'])?$p['procons']:'';
$button_text = $p['cta_button_text'];

$is_featured = false;

if(!empty($p['tag'][0])){
    $is_featured = true;
}

$image_small = !empty($p['product_assets'][0]['url'])?$p['product_assets'][0]['url']:'';
$image = !empty($p['product_assets'][1]['url'])?$p['product_assets'][1]['url']:'';
$image_big =!empty( $p['product_assets'][2]['url'])?$p['product_assets'][2]['url']:'';

$sign = "";

if ($bonus_currency == "EUR") {
    $sign = "€";
}else if ($bonus_currency == "USD") {
    $sign = "$";
}else if ($bonus_currency == "GBP") {
    $sign = "£";
}

$explodedArr = explode(" | ", $bonus_summary);

$bonus_summary = $explodedArr[0];

$rating = round($rating / 2, 1);

$remainder = 5 - $rating;

if ($exc_bonus_amount != "" && $exc_bonus_amount != 0) {
    if (empty($p['exclusive_bonus_match']))
        $bonus = $sign . "" . $exc_bonus_amount . "&nbsp;bonus";
    else
        $bonus = $exc_bonus_match . " " . __('up to', 'cjp') . " " . $sign . "" . $exc_bonus_amount;
}
else if ($bonus_amount != "" && $bonus_amount != 0) {
    if (empty($p['bonus_match']))
        $bonus = $sign . "" . $bonus_amount . "&nbsp;" . __('bonus', 'cjp');
    else
        $bonus = $bonus_match . " " . __('up to', 'cjp') . " " . $sign . "" . $bonus_amount;
}if ($freespin != '') {
    $bonus .= " + " . $freespin . " " . $freebie_name;
}
$pros_cons_data = (array) json_decode(do_shortcode("[cas-pro-cons pid='$id' is-featured='2' review='return']"));
$pros = array();
$cons = array();

if(!empty($pros_cons_data)){

foreach ($pros_cons_data as $d) {
    if ($d->is_positive == 1) {
        array_push($pros, $d->description);
    } else {
        array_push($cons, $d->description);
    }
}
}
