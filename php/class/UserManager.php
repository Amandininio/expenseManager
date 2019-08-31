<?php
/**
 *
 */
class UserManager extends PersonneManager {

  function __construct(){
    $this->champs=array_merge(
      $this->champs,
      [
        [
          'nom'=>'type',
          'PDO'=>PDO::PARAM_STR
        ],
        [
          'nom'=>'mdp',
          'PDO'=>PDO::PARAM_STR
        ]
      ]
    );
    parent::__construct();
  }

  public function create($user){
    $client=$this->readWhereEmail(Client,$user->getEmail());
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
    $value=$this->readWhereValue($id, 'id');
    if ($value) {
      if ($value['type']=='commercial'){
        return new Commercial($value);
      }
      if ($value['type']=='comptable'){
        return new comptable($value);
      }
    }
  }

  public function readWhereEmail($email){
    $value=parent::readWhereEmail($email);
    if ($value){
      if ($value['type']=='commercial'){
        return new Commercial($value);
      }
      if ($value['type']=='comptable'){
        return new comptable($value);
      }
    }
  }

  public function delete($user){
    if ($user->getType()=='commercial'){
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
    }
    parent::delete($user);

  }
}
