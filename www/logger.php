<?php

class logger
{
    public $table;
    public $date;
    public $mes;

    function __construct($t)
    {
        $this->table = $t;
        $this->date = date('Y-m-d H:i:s');

        $con = new sql;
        $con->connection();

        $query = "SELECT * FROM $t";
        $result = mysql_query($query);
        if (mysql_error()) {
            $result = mysql_error() . '';
            $result = str_replace('', '', $result);
        } else {
            $result = mysql_fetch_array($result, MYSQL_ASSOC);
            $result = print_r($result, 1);

        }


        $this->mes = $result;
    }


    function write_sql()
    {
        $con = new sql;
        $con->connection();


        $ins = "INSERT INTO test.data(date,text) VALUES ('$this->date','" . $this->mes .
            "')";
        mysql_query($ins); //записываю в БД


    }

    function write_txt()
    {
        $class_txt = new txt;
        $class_txt->create_file();
        $full_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $class_txt->catalog . '/' . $class_txt->
            file;
        file_put_contents($full_path, $this->date . '|' . $this->mes . PHP_EOL,
            FILE_APPEND);

    }

    function write_stdout()
    {
        $fp = fopen("php://stdout", 'w');
        fputs($fp, $this->mes);

    }


}

?>