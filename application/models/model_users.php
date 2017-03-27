<?php

class Model_Users extends Model
{
  public $id = 0;
  public $params = array();
  public $actions = array();

  public function __construct($id = 0)
  {
    $this->connect();

    $this->id = (int)$id;

    if($this->id > 0)
    {
      $this->params = $this->select('select * from user where id='.$this->id);
      if(is_array($this->params))
        $this->params = $this->params[0];
    }
  }

  public function checkLogin($login, $passCrypt)
  {

    $result = $this->select("SELECT login as login, pass as pass from user WHERE login = '$login'");
    if(!empty($result) AND crypt($result[0]['pass'], '$2a$10$1qAz2wSx3eDc4rFv5tGb5t') == $passCrypt)
    {
      // $data["login_status"] = "access_granted";
      return true;  
    }
    else
    {
      $data["login_status"] = "access_denied";
      return false;
    }
  }

  public function login($login, $passCrypt)
  {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $passCrypt = crypt($_POST['password'], '$2a$10$1qAz2wSx3eDc4rFv5tGb5t');
    $result_id = $this->select("SELECT id as id from user WHERE login = '$login' and pass='$password'");

    session_start();
    $_SESSION['admin'] = $login;
    $_SESSION['cpass'] = $passCrypt;
    $_SESSION['user_id'] = $result_id[0]['id'];

//    $data["login_status"] = "access_granted";
  }

  public function logout()
  {
    session_start();
    session_destroy();
    header('Location:/');
  }

  public function actions($year = null)
  {
      $result = $this->select("SELECT name as name, volume as volume, measure as measure from action WHERE user_id = '$this->id'");

        if($year)
        {
            $result = $this->select("SELECT name as name, volume as volume, measure as measure from action WHERE user_id = '$this->id' AND date LIKE '%$year%'");
        }

        if(!empty($result))
        {
            // $data["login_status"] = "access_granted";
            $this->actions = $result;
            return true;
        }
        else
        {
    //            $data["login_status"] = "access_denied";
            return false;
        }
  }

  public function getAllActionsNames()
  {
      $allActionsNames = parent::select("select name as name from action WHERE user_id = '$this->id' GROUP BY name");

      return $allActionsNames;
  }

}