<?php
function afficheTableau($data){
    // Ouverture du tableau html et entete
    $html = '<table>';
    $html .= ' <thead><tr>';
//===================================================//
    // Boucle sur les indices du premier tableau
    foreach ($data[0] as $key => $value){
        $html .= "<th>$key</th>";
    }
//===================================================//
    // Fermeture entete html
    $html .= '</tr></thead>';
//===================================================//
    // Ouverture du tbody
    $html .= '<tbody>';
//===================================================//
    // boucle sur toutes le ligne du tableau
    foreach($data as $ligne){
        $html .= '<tr>';
        foreach($ligne as $celulle){
            $html .= "<td>$celulle</td>";
        }
        $html .= '</tr>';
    }
//==================================================//
    // Ferme le tbody et table
    $html .= '</tbody></table>';

    return $html;
}


//===================================================//
//===================================================//
function selectOptions($values,$selected=null){
    $html = '';
    foreach($values as $id => $value){
        if($selected == $value){
            $html .= '<option value="'.$value.'" selected>'.$value.'</option>';
        }else{
            $html .= '<option value="'.$value.'">'.$value.'</option>';
        }
    }
    return $html;
}

//======================================================//
//======================================================//
function afficherListeCollaborateurs($collaborateurs){

    $resultats=[];
    foreach ($collaborateurs as $collaborateur){
        foreach ($collaborateur as $value){
            $resultats[] = $value;
        }
    }
    return $resultats;

}

//===========================================//
//===========================================//
function afficherVehicules($vehicules){

    $resultats=[];
    foreach ($vehicules as $vehicule){
        foreach ($vehicule as $value){
            $resultats[] = $value;
        }
    }
    return $resultats;

}



//===========================================//
//===========================================//
function selectOptionsNumeric($debut,$fin,$selected=null){
    $values = [];

    if($debut <= $fin){
        for($i=$debut;$i<=$fin;$i++) {
            $values[$i]=$i;
        }
    }

    if($debut > $fin){
        for($i=$debut; $i>=$fin; $i--){
            $values[$i]=$i;
        }
    }


    return selectOptions($values,$selected);
}

