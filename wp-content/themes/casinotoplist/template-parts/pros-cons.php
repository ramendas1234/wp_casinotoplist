<?php

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