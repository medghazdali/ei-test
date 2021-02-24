<?php
  require_once(__dir__ . '/Controller.php');
  class MainController extends Controller {

    public $active = 'Main'; //for highlighting the active link...

    /**
      * @param null|void
      * @return null|void
      * @desc Checks if the user session is set and creates a new instance of the MainModel...
    **/
    public function __construct()
    {
      if (!isset($_SESSION['auth_status'])) header("Location: index.php");
    }

  }
 ?>
