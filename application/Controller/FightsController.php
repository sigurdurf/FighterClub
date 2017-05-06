<?php
namespace Mini\Controller;

use Mini\Model\Fights;
use Mini\Model\Home;

class FightsController
{
  public function index()
  {
    if(isset($_SESSION['username'])){
      $name = htmlspecialchars($_SESSION['username']);
      $myUser = new Home();
      $data = $myUser->getMyUser($name);
    }
    require APP . 'view/_templates/header.php';
    require APP . 'view/fights/index.php';
    require APP . 'view/_templates/footer.php';
  }

  public function leaderboards()
  {
    if(isset($_SESSION['username'])){
      $name = htmlspecialchars($_SESSION['username']);
      $myUser = new Home();
      $data = $myUser->getMyUser($name);
    }
    $fighter = new Fights();
    $allFighters = $fighter->getTop10Fighters();
    require APP . 'view/_templates/header.php';
    require APP . 'view/fights/leaderboards.php';
    require APP . 'view/_templates/footer.php';
  }

  public function fighters()
  {
    if(isset($_SESSION['username'])){
      $name = htmlspecialchars($_SESSION['username']);
      $myUser = new Home();
      $data = $myUser->getMyUser($name);
    }
    $fighter = new Fights();
    $allFighters = $fighter->getAllFighters();
    $fightersWithLeagueID = $fighter->getFighterAndLeagueID();
    require APP . 'view/_templates/header.php';
    require APP . 'view/fights/fighters.php';
    require APP . 'view/_templates/footer.php';
  }

  public function arena()
  {
    $fighter = new Fights();
    $allFighters = $fighter->getAllFighters();
    if(isset($_SESSION['username'])){
      $name = htmlspecialchars($_SESSION['username']);
      $myUser = new Home();
      $data = $myUser->getMyUser($name);
    }
    require APP . 'view/_templates/header.php';
    require APP . '/view/fights/arena.php';
    require APP . '/view/_templates/footer.php';
  }
  public function newFighter()
  {
    $fighter = new Fights();
    if(isset($_POST['newFighter']))
    {
      $fighter->newFighter($_POST['newFighter']);
      header('Location: ' . URL . 'fights/fighters');
    }
    else{
      header('Location: ' . URL . 'home/admin');
    }
  }

  public function fight()
  {
  $fighter = new Fights();
  $fighters = $fighter->getAllFighters();
  require APP . '/view/fights/fight.php';
  }

  public function ajaxGetFighter()
  {
    if(isset($_GET['fighterName'])){
      $fighter = new Fights();
      $name = htmlspecialchars($_GET['fighterName']);
      $selectedFighter = $fighter->getFighter($name);
      $jsonFighter = json_encode($selectedFighter);
      echo $jsonFighter;
    }
  }

  public function ajaxAddFight()
  {
    if(isset($_POST['fightResult']))
    {
      $fights = new Fights();
      $fights->ajaxAddFight($_GET['fighter1ID'],$_GET['fighter2ID'], $_GET['fightResult']);
      $lastfightID = $fights->getLastFightID();
      if(isset($_POST['user_betOn'])){
        $fights->ajaxAddBet($_SESSION['userID'],$latFightId,$_GET['user_bet'],$_GET['user_betOn'],$_SESSION['CoinID']);
      }
    }
  }
}

 ?>
