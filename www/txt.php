<?php

class txt
{
    public $file; // ���� �����
    public $catalog; // �������
    
    
    function __construct()
    {
        $block = 'txt';//��� ���� � config
        $data = get_array($block);
        $this->file = $data[$block]['file'];
        $this->catalog = $data[$block]['catalog'];
    }
        
    function create_file()
    {
        $folder = $_SERVER['DOCUMENT_ROOT'] . '/' . $this->catalog;
        $file = $_SERVER['DOCUMENT_ROOT'] . '/' . $this->catalog . '/' . $this->file;
        if (!is_dir($folder)) mkdir($folder, 0700);

        if (!file_exists($file)) $myfile = fopen($file, "w") or die("$file to open file!");

    }

    
}

?>