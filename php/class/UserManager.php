<?php
/**
 *
 */
class UserManager extends PersonneManager {

  function __construct(){
    $this->champs+=[
      [
        'nom'=>'type',
        'PDO'=>PDO::PARAM_INT
      ],
      [
        'nom'=>'mdp',
        'PDO'=>PDO::PARAM_STR
      ]
    ];
    parent::__construct();
  }

  public function create($user){
    $client=parent::readWhereEmail($user->getEmail());
    if ($client==null) {
      parent::create($user);
    } else {
      if ($client['type']==null) {
        $user->setId($client->getId());
        $this->update($user);
      }
    }
  }

  public function read(int $id){
    $values=$this->readWhereValue($id);
    if ($values) {
      return new user($values);
    }
  }

  public function readWhereEmail($email){
    $values=parent::readWhereEmail($email,'email');
    if ($values){
      return new User($values);
    }
  }

  public function delete($user){
    $manPortefeuille=new PortefeuilleManager();
    $portefeuilles=$manPortefeuille->readAllFkCommercial($user);
    if ($portefeuilles) {
      foreach ($portefeuilles as $portefeuille) {
        $manPortefeuille->delete($portefeuille);
      }
    }
    $manMission=new MissionManager();
    $Missions=$manmission->readAllFkCommercial($user);
    if ($Missions) {
      foreach ($Missions as $mission){
        $manMission->delete($mission);
      }
    }
    parent::delete($user);

  }
}
