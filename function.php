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
function afficheCategorieSansProduit(array $categories): void
{
    for ($index = 0; $index < count($categories); $index++) {
        if (count($categories[$index]['produits']) == 0) {
            echo $categories[$index]['noms'] . "\n";
            echo $categories[$index]['code'] . "\n";
            print_r($categories[$index]['produits']);
        }
    }
}
afficheCategorieSansProduit($categories);

function saisieChamp(string $message): string
{
    return readline($message);
}
function  verifieChamp(string $value, string $message): bool
{
    if (empty($value)) {
        echo $message . "\n";
        return false;
    } else {
        return true;
    }
}
function  rechercheCategorieParCle(array $categories,string $key, string $value): int|bool
{
    foreach ($categories as $index => $categorie) {
        if ($categorie[$key] == $value) {
            return $index;
        }
    }
    return false;
}

function saisieChampObligatoireEtUnique(array $categories,string $smsSaisie, string $smsError,string $key): string{
        
    $valueIsValid = true;
    do {   
        $value = saisieChamp($smsSaisie);
        $valueIsValid = verifieChamp($value,$smsError);
        if($valueIsValid){     
            $valueIsValid =rechercheCategorieParCle($categories,$key,$value);
        }
    } while (!$valueIsValid);
    return $value;
 }


function enregistrerCategorie(): void{
    global $categories;
    $code = saisieChampObligatoireEtUnique($categories,"Entrez le code :", "champs obligatoire : ", "code");
    $nom = saisieChampObligatoireEtUnique($categories,"Entrez le nom :", "champs obligatoire : ", "noms");

    $categorie  =   [
            "noms" => $nom,
            "code" => $code,
            "produits" => []
         ];

    $categories[] = $categorie;
}

function ajouterProduitDansCategorie(array &$categories,string $message): void
{
    $code = saisieChamp($message);

    $index = rechercheCategorieParCle($categories, "code", $code);

    if ($index !== false) {

        $produit = [
            "nom"  =>saisieChamp($message),
            "ref"  => saisieChamp($message),
            "prix" => (int) saisieChamp($message),
            "qte"  => (int) saisieChamp($message)
        ];

        $categories[$index]["produits"][] = $produit;

        echo "Produit ajouté avec succès.\n";
    } else {
        echo "La catégorie n'existe pas.\n";
    }
}
function enregistrerCategorieAvecProduits(array &$categories): void
{
    $code = saisieChampObligatoireEtUnique($categories,"Entrez le code : ","Champ obligatoire", "code");

    $nom = saisieChampObligatoireEtUnique($categories,"Entrez le nom : ","Champ obligatoire","noms");

    $produits = [];

    do {

        $produit = [
            "nom"  => saisieChamp("Nom du produit : "),
            "ref"  => saisieChamp("Référence : "),
            "prix" => (int) saisieChamp("Prix : "),
            "qte"  => (int) saisieChamp("Quantité : ")
        ];

        $produits[] = $produit;

        $choix = strtolower(
            saisieChamp("Voulez-vous ajouter un autre produit ? (oui/non) : ")
        );

    } while ($choix === "oui");

    $categories[] = [
        "noms" => $nom,
        "code" => $code,
        "produits" => $produits
    ];

    echo "Catégorie enregistrée avec succès.\n";
}