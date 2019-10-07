<?php
$db = new PDO('mysql:host=localhost; dbname=expensemanager; charset=utf8', 'root', '');

function readVehicules( $db )
{
    $sql = "SELECT * FROM vehicules";
    $resultats = $db->query($sql);
    return $resultats->fetchAll(PDO::FETCH_ASSOC);
}

function readVehicule($db,$id)
{
    $sql = "SELECT * FROM vehicules WHERE :id = Immatriculation";
    $id = $id;
    $req = $db->prepare($sql);
    $req->bindValue('id', '$id', PDO::PARAM_INT);
    $req->execute();
    return $req->fetch();
}

function readtableauResas($db)
{
        $sql = "SELECT * FROM tableauresa ORDER BY dateResa ASC";
        $resultats = $db->query($sql);
    return $resultats->fetchAll(PDO::FETCH_ASSOC);
}

function readResa($db,$idResa)
{
    $sql = "SELECT * FROM tableauresa WHERE idResa=:idResa";
    $req = $db->prepare($sql);

    $req->bindValue('idResa', $idResa, PDO::PARAM_INT);
    $req->execute();
    return $req->fetch();
}

function readCollaborateurs($db)
{
    $sql = "SELECT * FROM collaborateurs";
    $resultats = $db->query($sql);
    return $resultats->fetchAll(PDO::FETCH_ASSOC);
}

function ajoutReservation($db,$annee,$mois,$jour,$idVehicule,$idCollab)
{
    $sql="INSERT INTO tableauresa(dateResa,vehiculeResa,collaboResa)
    VALUES(:dateReserv,:idVehicule,:idCollab)";
    $req=$db->prepare($sql);
    $req->bindValue('dateReserv', ( $annee.'-'.$mois.'-'.$jour), PDO::PARAM_STR);
    $req->bindValue('idCollab', $idCollab, PDO::PARAM_STR);
    $req->bindValue('idVehicule', $idVehicule, PDO::PARAM_STR);
    $req->execute();
    return $req->fetch();
}

function updateResa($db, $idResa, $dateResa,$collaboResa, $vehiculeResa)
{
    $sql="UPDATE tableauresa SET dateResa=:dateResa, collaboResa=:collaboResa, vehiculeResa=:vehiculeResa WHERE idResa = :idResa" ;
    $req=$db->prepare($sql);
    $req->bindValue('dateResa', $dateResa, PDO::PARAM_STR);
    $req->bindValue('collaboResa', $collaboResa, PDO::PARAM_STR);
    $req->bindValue('vehiculeResa', $vehiculeResa, PDO::PARAM_STR);
    $req->bindValue('idResa', $idResa, PDO::PARAM_INT);
    $req->execute();
    return $req->fetch();
}

function deleteResa(
    $db,
    $idResa)
{
    $sql = "DELETE FROM tableauResa WHERE idResa = :idResa";
    $req=$db->prepare($sql);
    $req->bindValue('idResa', $idResa, PDO::PARAM_INT);
    $req->execute();
    return $req->fetch();
}


function ajoutClient($Email, $ID, $Nom, $password, $Prenom, $Tel, $Ville)
{
    $sql="INSERT INTO clients(Email,ID,Nom, password, Prenom, Tel, Ville)
        VALUES('Email:varchar', 'ID:int', 'Nom:varchar', 'password:varchar', 'Prenom:varchar', 'Tel:int', 'Ville:varchar') ";
                $req= $db ->prepare($sql);
                $req->bindValue('Email', $Email, PDO::PARAM_STR);
                $req->bindValue('ID', $ID, PDO::PARAM_STR);
                $req->bindValue('Nom', $Nom, PDO::PARAM_STR);
                $req->bindValue('Prenom', $Prenom, PDO::PARAM_STR);
                $req->bindValue('password', $password, PDO::PARAM_STR);
                $req->bindValue('Tel', $Tel, PDO::PARAM_STR);
                $req->bindValue('Ville', $Ville, PDO::PARAM_STR);
                $req->execute();
                return $req->fetch();
}