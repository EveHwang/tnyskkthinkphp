<?php
namespace Admin\Model;
use Think\Model;
class CommentReplyModel extends Model 
{
	protected $insertFields = 'content,comment_id'; 
	protected $_validate = array(
		array('comment_id', 'require', '参数错误！', 1),
		array('content', '1,200', '内容必须是1-200个字符！', 1, 'length'),
	);
	
	protected function _before_insert(&$data, $option)
	{
		$memberId = session('m_id');
		if(!$memberId)
		{
			$this->error = '必须先登录！';
			return FALSE;
		}
		$data['member_id'] = $memberId;
		$data['addtime'] = date('Y-m-d H:i:s');
	}
}
















