<?php
  require_once(__dir__ . '/Controller.php');

  class Logout extends Controller {

    /**
      * @param null|void
      * @return null|void
    **/
    public function __construct()
    {
      session_destroy();
      header("Location: index.php");
    }
  }
 ?>
