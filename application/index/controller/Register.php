<?php  

namespace app\index\controller;

class Register extends Common
{
	/**
	 * [register 报名功能]
	 * @return [type] [description]
	 */
	public function register()
	{
		$param=$this->params;
		$param['regtime']=time();
		$res=db('register')->insertGetid($param);
		if ($res) {
			$this->return_msg(200,'报名成功了',$res);
		}else{
			$this->return_msg(400,'报名失败');
		}
	}
	
}






?>