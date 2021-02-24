<?php
  class ConnexionModel {
    protected $dbName = 'mohamed_vatye'; /** Database Name */
    protected $dbHost = 'localhost'; /** Database Host */
    protected $dbUser = 'mohamed_vatye'; /** Database Root */
    protected $dbPass = 'wzdG3FQrUQpv41y8HyLkgDzTJ1VCnQOC'; /** Databse pwd */
    protected $dbHandler, $dbStmt;


    /**
      * @param null|void
      * @return null|void
    **/
    public function __construct()
    {
      $Dsn = "mysql:host=" . $this->dbHost . ';dbname=' . $this->dbName;
      $Options = array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      );
      try {
        $this->dbHandler = new PDO($Dsn, $this->dbUser, $this->dbPass, $Options);
      } catch (Exception $e) {
        var_dump('Couldn\'t Establish A Database Connection. Due to the following reason: ' . $e->getMessage());
      }
    }


    /**
      * @param string
      * @return null|void
    **/
    public function query($query)
    {
      $this->dbStmt = $this->dbHandler->prepare($query);
    }


    /**
      * @param string|integer|
      * @return null|void
    **/
    public function bind($param, $value, $type = null)
    {
      if (is_null($type)) {
        switch (true) {
          case is_int($value):
            $type = PDO::PARAM_INT;
          break;
          case is_bool($value):
            $type = PDO::PARAM_BOOL;
          break;
          case is_null($value):
            $type = PDO::PARAM_NULL;
          break;
          default:
            $type = PDO::PARAM_STR;
          break;
        }
      }

      $this->dbStmt->bindValue($param, $value, $type);
    }


    /**
      * @param null|void
      * @return null|void
    **/
    public function execute()
    {
      $this->dbStmt->execute();
      return true;
    }

    /**
      * @param null|void
      * @return null|void
    **/
    public function fetch()
    {
      $this->execute();
      return $this->dbStmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
      * @param null|void
      * @return null|void
    **/
    public function fetchAll()
    {
      $this->execute();
      return $this->dbStmt->fetchAll(PDO::FETCH_ASSOC);
    }
  }
 ?>
