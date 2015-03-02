<?php
class user extends spController
{
    public function __construct(){
        parent::__construct();
        if(!checkHasLogin()){
            $this->error('您还未登录，请先登录！',spUrl('main','login'));
            return;
        }
    }

    public function index(){
        
    }
}