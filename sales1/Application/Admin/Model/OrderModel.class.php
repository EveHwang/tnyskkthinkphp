<?php
namespace Admin\Model;
use Think\Model;
class OrderModel extends Model 
{
	protected $insertFields = array('shr_name','shr_tel','shr_province','shr_city','shr_area','shr_address');
	protected $_validate = array(
		array('shr_name', 'require', '收货人姓名不能为空！', 1, 'regex', 3),
		array('shr_tel', 'require', '收货人电话不能为空！', 1, 'regex', 3),
		array('shr_province', 'require', '所在省不能为空！', 1, 'regex', 3),
		array('shr_city', 'require', '所在城市不能为空！', 1, 'regex', 3),
		array('shr_area', 'require', '所在地区不能为空！', 1, 'regex', 3),
		array('shr_address', 'require', '详细地址不能为空！', 1, 'regex', 3),
	);
	public function search($pageSize = 20)
	{
		$memberId = session('m_id');
		$where['member_id'] = array('eq', $memberId);
		$noPayCount = $this->where(array(
			'member_id' => array('eq', $memberId),
			'pay_status' => array('eq', '否'),
		))->count();
		$count = $this->alias('a')->where($where)->count();
		$page = new \Think\Page($count, $pageSize);
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$data['page'] = $page->show();
		$data['data'] = $this->alias('a')
		->field('a.id,a.shr_name,a.total_price,a.addtime,a.pay_status,GROUP_CONCAT(DISTINCT c.sm_logo) logo')
		->join('LEFT JOIN __ORDER_GOODS__ b ON a.id=b.order_id 
		        LEFT JOIN __GOODS__ c ON b.goods_id=c.id')
		->where($where)
		->group('a.id')
		->limit($page->firstRow.','.$page->listRows)
		->select();
		$data['noPayCount'] = $noPayCount;
		return $data;
	}
	protected function _before_insert(&$data, &$option)
	{
		$memberId = session('m_id');
		if(!$memberId)
		{
			$this->error = '必须先登录！';
			return FALSE;
		}
		$cartModel = D('Cart');
		$option['goods'] = $goods = $cartModel->cartList();
		if(!$goods)
		{
			$this->error = '购物车中没有商品，无法下单！';
			return FALSE;
		}
		$this->fp = fopen('./order.lock');
		flock($this->fp, LOCK_EX);
		$gnModel = D('goods_number');
		$total_price = 0;
		foreach ($goods as $k => $v)
		{
			// 检查库存量
			$gnNumber = $gnModel->field('goods_number')->where(array(
				'goods_id' => array('eq', $v['goods_id']),
				'goods_attr_id' => array('eq', $v['goods_attr_id']),
			))->find();
			if($gnNumber['goods_number'] < $v['goods_number'])
			{
				$this->error = '下单失败，原因：商品：<strong>'.$v['goods_name'].'</strong> 库存量不足！';
				return FALSE;
			}
			$total_price += $v['price'] * $v['goods_number'];  
		}
		$data['total_price'] = $total_price;
		$data['member_id'] = $memberId;
		$data['addtime'] = time();
		$this->startTrans();
	}
	protected function _after_insert($data, $option)
	{
		$ogModel = D('order_goods');
		$gnModel = D('goods_number');
		foreach ($option['goods'] as $k => $v)
		{
			$ret = $ogModel->add(array(
				'order_id' => $data['id'],
				'goods_id' => $v['goods_id'],
				'goods_attr_id' => $v['goods_attr_id'],
				'goods_number' => $v['goods_number'],
				'price' => $v['price'],
			));
			if(!$ret)
			{
				$this->rollback();
				return FALSE;
			}
			// 减库存
			$ret = $gnModel->where(array(
				'goods_id' => array('eq', $v['goods_id']),
				'goods_attr_id' => array('eq', $v['goods_attr_id']),
			))->setDec('goods_number', $v['goods_number']);
			if(FALSE === $ret)
			{
				$this->rollback();
				return FALSE;
			}
		}
		$this->commit();
		flock($this->fp, LOCK_UN);
		fclose($this->fp);
		$cartModel = D('Cart');
		$cartModel->clear();
	}
	public function setPaid($orderId)
	{
		$this->where(array(
			'id' => array('eq', $orderId),
		))->save(array(
			'pay_status' => '是',
			'pay_time' => time(),
		));
		$tp = $this->field('total_price,member_id')->find($orderId);
		$memberModel = M('member'); 
		$memberModel->where(array(
			'id' => array('eq', $tp['member_id']),
		))->setInc('jifen', $tp['total_pricd']);
	}
}


















