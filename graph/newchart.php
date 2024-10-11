<?php

include("../../lib/inc/chartphp_dist.php");
$p = new chartphp();


$p->data = array(
array(
array("Jan",48.25),
array("Feb",238.75),
array("Mar",95.50),
array("Apr",300.50),
array("May",286.80),
array("Jun",400)),
array(
array("Jan",300.25),
array("Feb",225.75),
array("Mar",44.50),
array("Apr",259.50),
array("May",250.80),
array("Jun",300))
);


$p->chart_type = "line";


$out = $p->render("c1");
?>