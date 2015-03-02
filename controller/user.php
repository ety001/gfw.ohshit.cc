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
        $this->user_info    = $_SESSION['user'];
        $page               = array(
            'title'     => '管理',
            'tag'       => 'index'
        );
        $css_js['head_css'] = array('res/css/global.css');
        $this->page         = $page;
        tpl_display($this, 'user/index.html', $css_js);
    }

    public function order(){
        $order_lib          = spClass('m_order');
        $this->order_info   = $order_lib->findAll(array('userid'=>$_SESSION['userid']));
        $page               = array(
            'title'     => '购买',
            'tag'       => 'order'
        );
        $css_js['head_css'] = array('res/css/global.css');
        $this->page         = $page;
        tpl_display($this, 'user/order.html', $css_js);
    }

    public function orderSave(){
        $order_id           = $this->spArgs('order_id', false, 'post');
        $userid             = $_SESSION['userid'];
        $order_lib          = spClass('m_order');
        if($order_lib->find(array('order_id'=>$order_id))){
            $this->error('订单已存在', spUrl('user', 'order'));
        } else {
            $info           = array(
                'order_id'  => $order_id,
                'userid'    => $userid
            );
            $order_lib->create($info);
            $this->success('添加订单成功，请等待管理员审核', spUrl('user', 'order'));
        }
    }

    public function tutorial(){
        $this->error('教程正在编写中', spUrl('user', 'index'));
    }
}