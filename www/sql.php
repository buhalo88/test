<?php
class sql
{
    public $connection;
    public $host; // ����
    public $user; // ����
    public $password; // ������
    public $database; // �������



    function __construct()
    {
        $block = 'sql'; //��� ���� � config
        $data = get_array($block);
        $this->connection = new MySQLi();
        $this->host = $data[$block]['host'];
        $this->user = $data[$block]['user'];
        $this->password = $data[$block]['password'];
        $this->database = $data[$block]['database'];
    }


    function connection()
    {
        $this->connection = mysql_connect($this->host, $this->user, $this->password) or die('�� ������� �����������: ' .
            mysql_error());
        mysql_select_db($this->database) or die('�� ������� ������� ���� ������');
        return $this->connection;


    }
    function close()
    {
        mysqli_close($this->connection);

    }
  


}
?> 