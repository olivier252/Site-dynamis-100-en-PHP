<?php

function ajouter_Vue()
{
   $fichier = dirname(__DIR__).DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'compteur';
   $fichier_jour = $fichier.'-'.date('Y-m-d');

       increment($fichier);
       increment($fichier_jour);
}


function increment($fichier) {
    $compteur = 1;
    if(file_exists($fichier)) {
        $compteur = file_get_contents($fichier);
        $compteur++;
    }
    file_put_contents($fichier, $compteur);
}


function nombre_Vue() {
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    return file_get_contents($fichier);
}

function nombre_VueMois(int $year,int $month) {
    $month = str_pad($month, 2, '0', STR_PAD_LEFT);
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur-'.$year. '-' .$month. '-' . '*';
 
    $fichiers = glob($fichier);
     //var_dump($fichiers);
    $total = 0;
    foreach($fichiers as $fichier) {
        //var_dump($fichier);
        $total += (int)file_get_contents($fichier);
    }
    return $total;
}

function nombre_VueDetail(int $year, int $month){
    $month = str_pad($month, 2, '0', STR_PAD_LEFT);
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur-'.$year. '-' .$month. '-' . '*';
 
    $fichiers = glob($fichier);
     //var_dump($fichiers);
    $total = 0;
    $visites = [];
    foreach($fichiers as $fichier) {
        //var_dump($fichier);

        $item_date = explode('-', basename($fichier));
        $visites[] = [
            'annee' => $item_date[1],
            'mois' => $item_date[2],
            'jour' => $item_date[3],
            'total' => file_get_contents($fichier)
        ];
    }
    return $visites;   
}