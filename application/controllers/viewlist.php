<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 12/27/16
 * Time: 2:03 PM
 */


class ViewList extends Controller{

    function index(){}


    function loadNewContents($limist, $offset_main){
        $data =  $this->model->loadNewContents($limist, $offset_main);
        echo json_encode($data);
    }

    function loadContentsByHash(){
        $data =  $this->model->loadContentsByHash();
        echo json_encode($data);
    }

}
