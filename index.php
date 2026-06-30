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

for ($index = 0; $index < count($categories); $index++) {
    if (count($categories[$index]['produits']) == 0) {
        echo $categories[$index]['noms'] . "\n";
        echo $categories[$index]['code'] . "\n";
        print_r($categories[$index]['produits']);
    }
}

$codeExiste = false;

do {
    $code = readline('Entrer le code : ');
    for ($index = 0; $index < count($categories); $index++) {
        if ($categories[$index]["code"] == $code) {
            $codeExiste = true;
            echo "Le code existe déjà ...\n";
            break;
        }
    }
} while ($codeExiste);

$nomExiste = false;

do {
    $nom = readline('Entrer le nom : ');
    for ($index = 0; $index < count($categories); $index++) {
        if ($categories[$index]["noms"] == $nom) {
            $codeExiste = true;
            echo "Le nom existe déjà ...\n";
            break;
        }
    }
} while ($nomExiste);
$categorie =   [
    "nom" => $nom,
    "code" => $code,
    "produits" => []
];

$categories[] = $categorie;

$categorieExiste =  false;
$code = readline("saisir le code :");
for ($index = 0; $index < count($categories); $index++) {
    if ($categories[$index]["noms"] == $nom) {
        $categorieExiste = true;
        break;
    }
}
if ($categorieExiste) {
    $produit =   [
        'nom' => readline("saisir le nom : "),
        "ref" => readline("saisir la reference : "),
        'prix' => (int)readline("saisir le prix : "),
        'qte' => (int)readline("saisir la quantité : ")
    ];
    $categories[$index]["produits"][] = $produit;
} else {
    echo " désolé , la categorie n'existe pas...";
}

$codeExiste = false;

do {
    $code = readline('Entrer le code : ');
    for ($index = 0; $index < count($categories); $index++) {
        if ($categories[$index]["code"] == $code) {
            $codeExiste = true;
            echo "Le code existe déjà ...\n";
            break;
        }
    }
} while ($codeExiste);

$nomExiste = false;

do {
    $nom = readline('Entrer le nom : ');
    for ($index = 0; $index < count($categories); $index++) {
        if ($categories[$index]["noms"] == $nom) {
            $codeExiste = true;
            echo "Le nom existe déjà ...\n";
            break;
        }
    }
} while ($nomExiste);


$produits = [];
do {
    $produit =   [
        'nom' => readline("saisir le nom : "),
        "ref" => readline("saisir la reference : "),
        'prix' => (int)readline("saisir le prix : "),
        'qte' => (int)readline("saisir la quantité : ")
    ];
    $produits[] = $produit;

    $choix = strtolower(readline(" voulez vous continuer  oui/non "));
} while ($choix === "oui");

$categorie  =   [
    "nom" => $nom,
    "code" => $code,
    "produits" =>  $produits
];

$categories[] = $categorie;
