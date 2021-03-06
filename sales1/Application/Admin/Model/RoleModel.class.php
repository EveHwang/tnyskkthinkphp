<?php
namespace Admin\Model;
use Think\Model;
class RoleModel extends Model 
{
	protected $insertFields = array('role_name');
	protected $updateFields = array('id','role_name');
	protected $_validate = array(
		array('role_name', 'require', '角色名称不能为空！', 1, 'regex', 3),
		array('role_name', '1,30', '角色名称的值最长不能超过 30 个字符！', 1, 'length', 3),
		array('role_name', '', '角色名称已经存在！', 1, 'unique', 3),
	);
	public function search($pageSize = 20)
	{
		$where = array();
		$count = $this->alias('a')->where($where)->count();
		$page = new \Think\Page($count, $pageSize);
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$data['page'] = $page->show();
		$data['data'] = $this->alias('a')
		->field('a.*,GROUP_CONCAT(c.pri_name) pri_name')
		->join('LEFT JOIN __ROLE_PRI__ b ON a.id=b.role_id 
		        LEFT JOIN __PRIVILEGE__ c ON b.pri_id=c.id')
		->where($where)
		->limit($page->firstRow.','.$page->listRows)
		->group('a.id')
		->select();
		return $data;
	}
	protected function _after_insert($data, $option)
	{
		$priId = I('post.pri_id');
		$rpModel = D('role_pri');
		foreach ($priId as $v)
		{
			$rpModel->add(array(
				'pri_id' => $v,
				'role_id' => $data['id'],
			));
		}
	}
	protected function _before_insert(&$data, $option)
	{
	}
	protected function _before_update(&$data, $option)
	{
		$priId = I('post.pri_id');
		$rpModel = D('role_pri');
		$rpModel->where(array(
			'role_id' => array('eq', $option['where']['id']),
		))->delete();
		foreach ($priId as $v)
		{
			$rpModel->add(array(
				'pri_id' => $v,
				'role_id' => $option['where']['id'],
			));
		}
	}
	protected function _before_delete($option)
	{	
		$rpModel = D('role_pri');
		$rpData->where(array(
			'role_id' => array('eq', $option['where']['id'])
		))->delete();
		$arModel = D('admin_role');
		$arModel->where(array(
			'role_id' => array('eq', $option['where']['id'])
		))->delete();
	}
}