<?php
namespace app\index\controller;


class Index extends  Common
{
	
    public function lists_art()
    {
    	$param=$this->params;

    	$field='tittle,content,author,ltittle,linfo';

		$res=db('article')->alias('a')->field($field)
						  ->join('list l', 'l.lid = a.alid')
						  ->select();

    	if ($res) {
    		$this->return_msg(200,'查询成功',$res);
    	}else{
    		$this->return_msg(400,'查询失败');
    	}  
    }

    public function add_art()
    {
    	$param=$this->params;
    	
    	$res=db('article')->insertGetid($param);
    	if ($res) {
    		$this->return_msg(200,'添加文章成功',$res);
    	}else{
    		$this->return_msg(400,'添加文章失败');
    	}
    }

    /**
     * [delete_art description]
     * @return [type] [description]
     */
	public function delete_art()
	{
		$param=$this->params;

		$res=db('article')->where('id',$param['id'])->delete();
		if ($res) {
			$this->return_msg(200,'删除文章成功');
		}else{
			$this->return_msg(400,'删除文章失败');
		}
	}

	/**
	 * [update_art description]
	 * @return [type] [description]
	 */
	public function update_art()
	{
		$param=$this->params;
	
		$res=db('article')->update($param);
		if ($res) {
				$this->return_msg(200,'修改章成功');
		}else{
				$this->return_msg(400,'修改文章失败');
		}
	}


	
}
