<?php
  require_once(__dir__ . '/Controller.php');
  class MainController extends Controller {

    public $active = 'Main'; 

    /**
      * @param null|void
      * @return null|void
    **/
    public function __construct()
    {
      if (!isset($_SESSION['auth_status'])) header("Location: index.php");
    }

  }
 ?>
