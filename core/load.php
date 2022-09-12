<?php
class load{
    public function __construct(){

    }
    public function view($filename, $data = false){
		if($data == true){
			extract($data);
		}
        include 'views/'.$filename.'.php';
    }
    public function model($filename){
        include 'models/'.$filename.'.php';
        return new $filename();
    }
}

?>