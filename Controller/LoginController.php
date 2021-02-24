<?php
require_once(__dir__ . '/Controller.php');
require_once('./Model/LoginModel.php');

class LoginController extends Controller {

  public $active = 'login'; //for highlighting the active link...
  private $loginModel;

  /**
    * @param null|void
    * @return null|void
  **/
  public function __construct()
  {
    if (isset($_SESSION['auth_status'])) header("Location: main.php");
    $this->loginModel = new LoginModel();
  }

  /**
    * @param array
    * @return array|boolean
  **/
  public function login(array $data)
  {
    $username = stripcslashes(strip_tags($data['username']));
    $password = stripcslashes(strip_tags($data['password']));

    echo '=====...>>>>>'.$username;

$username=strval($username);
    $usernameRecords = $this->loginModel->fetchusername($username);

    if (!$usernameRecords['status']) {
      if (password_verify($password, $usernameRecords['data']['password'])) {
        $Response = array(
          'status' => true
        );

        $_SESSION['data'] = $usernameRecords['data'];
        $_SESSION['auth_status'] = true;
        header("Location: main.php");
      }

      $Response = array(
        'status' => false,
      );
      return $Response;
    }

    $Response = array(
      'status' => false,
    );
    return $Response;
  }
}
 ?>
