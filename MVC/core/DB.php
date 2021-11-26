<?php
class DB
{
    public $con;
    protected $servername = "localhost:3325";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "metacoffee";

    function __construct()
    {
        $this->con = mysqli_connect($this->servername, $this->username, $this->password);
        mysqli_select_db($this->con, $this->dbname);
        mysqli_query($this->con, "SET NAMES 'utf8'");
    }
    
}
