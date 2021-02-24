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
    public function EditLastLogin(array $user) :array
    {

      var_dump($user);
      // $this->query("INSERT INTO `user` (name, email, phone_no, password) VALUES (:name, :email, :phone_no, :password)");
      // $this->bind('name', $user['name']);
      // $this->bind('email', $user['email']);
      // $this->bind('phone_no', $user['phone']);
      // $this->bind('password', $user['password']);

      // $lastlogintime = date("Y-m-d H:i:s");

      // // query
      // $sql = "UPDATE `users` SET `user_lastlogin` = `$lastlogintime` WHERE `id` = :user->id";
      // $q = $db->prepare($sql);
      // $q->execute();

    return true;

    }
  }
 ?>
