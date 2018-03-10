<?php 
namespace app\index\controller;

class Category extends Common
{
	/**
	 * [lists_category 所有栏目汇总]
	 * @return [json] [返回数据]
	 */
	public function lists_category()
    {

    	$param=$this->params;

    	$field='ctittle,cicon,ltittle,linfo';

		$res=db('category')->alias('c')->field($field)
						  ->join('list l', 'l.lcid = c.cid')
						  ->select();
    
    	if ($res) {
    		$this->return_msg(200,'查询成功',$res);
    	}else{
    		$this->return_msg(400,'查询失败');
    	}  
    }

    /**
     * [del_category 删除栏目]
     * @return [json] [description]
     */
    public function del_category()
    {
    	$param=$this->params;
    	
    	$res=db('category')->where('cid',$param['cid'])->delete();
		if ($res) {
			$this->return_msg(200,'删除栏目成功');
		}else{
			$this->return_msg(400,'删除栏目失败');
		}
    }
	/**
	 * [add_category 增加栏目]
	 */
    public function add_category()
    {
    	$param=$this->params;
    	$param['ctime']=time();

 		$res=db('category')->insertGetid($param);
    	if ($res) {
    		$this->return_msg(200,'添加栏目成功',$res);
    	}else{
    		$this->return_msg(400,'添加文章失败');
    	}
    }

	/**
	 * [update_category 更改栏目]
	 * @return [type] [description]
	 */
    public function update_category()
    {
    	$param=$this->params;
	
		$res=db('category')->update($param);
		if ($res) {
				$this->return_msg(200,'修改栏目成功');
		}else{
				$this->return_msg(400,'修改栏目失败');
		}
    }
}



 ?>