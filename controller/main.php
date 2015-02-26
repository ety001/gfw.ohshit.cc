<?php
class main extends spController
{
	public function index(){
        $page               = array(
            'title'     => '私人定制'
        );
        $css_js['head_css'] = array('res/css/global.css');
        $this->page         = $page;
        tpl_display($this, 'index.html', $css_js);
    }
}