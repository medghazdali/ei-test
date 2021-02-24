<?php
  require_once(__dir__ . '/ConnexionModel.php');
  class LoginModel extends ConnexionModel {

    /**
      * @param string
      * @return array
    **/
    public function fetchusername(string $username) :array
    {


      $this->query("SELECT * FROM `user` u 
      INNER JOIN `user_group` ug ON ug.id_user = u.id_user 
      INNER JOIN `group` g ON g.id_group = ug.id_group 
      WHERE `username` = :username AND g.id_group =2");

      $this->bind('username', $username);
      $this->execute();


      $username = $this->fetch();
      $id_user = $username['id_user'];
      

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


        // var_dump('======',$id_user);
        $this->EditLastLogin($id_user);

        return $Response;
      }


    }
    /**
      * @param array
      * @return array
    **/
    public function EditLastLogin($id_user)
    {

      $lastlogintime = date("Y-m-d H:i:s");
      $this->query("UPDATE `user` SET `last_login` = '".$lastlogintime."' WHERE `id_user` = :id_user");
      $this->bind('id_user', $id_user);
      $this->execute();

    return true;

    }
  }
 ?>
