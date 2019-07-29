<?php

function imgBuku($params){
    if (!empty($params)){
        $temp = '<img class="img-thumbnail" src="assets/img/buku/'.$params.'"/>';
    } else {
        $temp = '<img class="img-thumbnail" src="assets/img/no-book.png"/>';
    }
    return $temp;
}