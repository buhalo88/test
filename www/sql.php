<?php
class sql
{
    public $connection;
    public $host; // хост
    public $user; // юзер
    public $password; // пароль
    public $database; // каталог



    function __construct()
    {
        $block = 'sql'; //имя блок в config
        $data = get_array($block);
        $this->connection = new MySQLi();
        $this->host = $data[$block]['host'];
        $this->user = $data[$block]['user'];
        $this->password = $data[$block]['password'];
        $this->database = $data[$block]['database'];
    }


    function connection()
    {
        $this->connection = mysql_connect($this->host, $this->user, $this->password) or die('Не удалось соединиться: ' .
            mysql_error());
        mysql_select_db($this->database) or die('Не удалось выбрать базу данных');
        return $this->connection;


    }
    function close()
    {
        mysqli_close($this->connection);

    }
  


}
?> 