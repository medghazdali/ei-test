<?php
  require_once(__dir__ . '/ConnexionModel.php');
  class LoginModel extends ConnexionModel {

    /**
      * @param string
      * @return array
      * @desc Returns a user record based on the method parameter....
    **/
    public function fetchusername(string $username) :array
    {
      $this->query("SELECT * FROM `user` u 
      INNER JOIN `user_group` ug ON ug.id_user = u.id_user 
      INNER JOIN `group` g ON g.id_group = ug.id_group 
      WHERE `username` = :username AND g.id_group =2");

      $this->bind('username', $username);
      $this->execute();
      
      $this->EditLastLogin();

      $username = $this->fetch();
      // var_dump($username) ;
      if (empty($username)) {

        $Response = array(
          'status' => true,
          'data' => $username
        );


        return $Response;
      }

      if (!empty($username)) {
        $Response = array(
          'status' => false,
          'data' => $username
        );



        return $Response;
      }


    }
    /**
      * @param array
      * @return array
      * @desc Creates and returns a user record....
    **/
    public function EditLastLogin()
    {

      // $lastlogintime = date("Y-m-d H:i:s");
      $sql = "UPDATE `user` SET `last_login` = `$lastlogintime` WHERE `id_user` = 1";
      $this->execute();

    return true;

    }
  }
 ?>
