<?php 

function convertRupiah($params){
	$val = "Rp " . number_format($params,2,',','.');
	return $val;
}