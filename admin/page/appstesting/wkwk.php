<?php 

// untuk A2 -----------------
if (in_array($query[$a],$arrTerm2)){
    $search = array_search($query[$a],$arrTerm);
    $searchGet = $arr[$search]['nilai']['pr_a2'];
    $ku2['text'] = 'Pr('.$query[$a].'|A2)';
    $ku2['value'] = $searchGet;
} else {
    $ku2['text'] = 'Pr('.$query[$a].'|A2)';
    $ku2['value'] = round(((1+0)/($sumdf2+$sumalldf)),4);
}
    $kuu2[] = $ku2;
    $kuat['nbc_a2'] = [
        'hitung' => $kuu2,
        'final' => array_sum(array_column($kuu2, 'value')),
    ];

// untuk A3 -----------------
if (in_array($query[$a],$arrTerm3)){
    $search = array_search($query[$a],$arrTerm);
    $searchGet = $arr[$search]['nilai']['pr_a3'];
    $ku3['text'] = 'Pr('.$query[$a].'|A3)';
    $ku3['value'] = $searchGet;
} else {
    $ku3['text'] = 'Pr('.$query[$a].'|A3)';
    $ku3['value'] = round(((1+0)/($sumdf3+$sumalldf)),4);
}
    $kuu3[] = $ku3;
    $kuat['nbc_a3'] = [
        'hitung' => $kuu3,
        'final' => array_sum(array_column($kuu3, 'value')),
    ];    

// untuk A4 -----------------
if (in_array($query[$a],$arrTerm4)){
    $search = array_search($query[$a],$arrTerm);
    $searchGet = $arr[$search]['nilai']['pr_a4'];
    $ku4['text'] = 'Pr('.$query[$a].'|A4)';
    $ku4['value'] = $searchGet;
} else {
    $ku4['text'] = 'Pr('.$query[$a].'|A4)';
    $ku4['value'] = round(((1+0)/($sumdf4+$sumalldf)),4);
}
    $kuu4[] = $ku4;
    $kuat['nbc_a4'] = [
        'hitung' => $kuu4,
        'final' => array_sum(array_column($kuu4, 'value')),
    ];