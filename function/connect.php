<?php
class Database
{
  private $server = "localhost";
  private $username = "root";
  private $password = "";
  private $db = "libmandatabase";

  function connectMySQL()
  {
  $koneksi = mysqli_connect($server, $username, $password, $db);
  }
}
?>
