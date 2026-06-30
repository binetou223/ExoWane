<?php
$categories = [
    0 => [
        'noms' => 'categ1',
        'code' => 2345,
        'produits' => [
            0 => ['nom' => 'lait', 'ref' => '4567', 'qte' => 50, 'prix' => 500],
            1 => ['nom' => 'sucre', 'ref' => '3467', 'qte' => 100, 'prix' => 700]
        ]
    ],
    1 => ['noms' => 'categ2', 'code' => 2565, 'produits' => []]

];
function afficheCategorieSansProduit(array $categories):void{
for ($index=0; $index < count($categories); $index++) { 
     if (count($categories[$index]['produits']) == 0) {
        echo $categories[$index]['noms'] . "\n";
        echo $categories[$index]['code'] . "\n";
        print_r($categories[$index]['produits']);
    }
}
}
afficheCategorieSansProduit($categories);
