<?php

$conn_string = "host = ec2-34-193-112-164.compute-1.amazonaws.com"
        . " port = 5432 "
        . " dbname = d9679rdtfjpra"
        . " user = qpcxqwxbunyfzc"
        . " password = ed64a6f14c6ad1c1c758efed47bf5084851f4425a75353158f8736ddd55f87cb";
$db = pg_connect($conn_string);
?>