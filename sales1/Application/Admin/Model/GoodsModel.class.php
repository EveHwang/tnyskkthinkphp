<?php
namespace Admin\Model;
use Think\Model;
class GoodsModel extends Model 
{
	protected $insertFields = 'goods_name,market_price,shop_price,is_on_sale,goods_desc,brand_id,cat_id,type_id,promote_price,promote_start_date,promote_end_date,is_new,is_best,is_hot,sort_num,is_floor';
	protected $updateFields = 'id,goods_name,market_price,shop_price,is_on_sale,goods_desc,brand_id,cat_id,type_id,promote_price,promote_start_date,promote_end_date,is_new,is_best,is_hot,sort_num,is_floor';
	protected $_validate = array(
		array('cat_id', 'require', '必须选择主分类！', 1),
		array('goods_name', 'require', '商品名称不能为空！', 1),
		
		array('shop_price', 'currency', '本店价格必须是货币类型！', 1),
	);
	
	protected function _before_insert(&$data, $option)
	{
		if($_FILES['logo']['error'] == 0)
		{
			$ret = uploadOne('logo', 'Goods', array(
				array(700, 700),
				array(350, 350),
				array(130, 130),
				array(50, 50),
			));
			$data['logo'] = $ret['images'][0];
			$data['mbig_logo'] = $ret['images'][1];
			$data['big_logo'] = $ret['images'][2];
			$data['mid_logo'] = $ret['images'][3];
			$data['sm_logo'] = $ret['images'][4];
		}
		$data['addtime'] = date('Y-m-d H:i:s', time());
		$data['goods_desc'] = removeXSS($_POST['goods_desc']);
	}
	
	protected function _before_update(&$data, $option)
	{
		$id = $option['where']['id']; 
		$data['is_updated'] = 1;
		require('./sphinxapi.php');
    	$sph = new \SphinxClient();
    	$sph->SetServer('localhost', 9312);
    	$sph->UpdateAttributes('goods', array('is_updated'), array($id=>array(1)));
		$gaid = I('post.goods_attr_id');
		$attrValue = I('post.attr_value');
		$gaModel = D('goods_attr');
		$_i = 0;
		foreach ($attrValue as $k => $v)
		{
			foreach ($v as $k1 => $v1)
			{
				if($gaid[$_i] == '')
					$gaModel->add(array(
						'goods_id' => $id,
						'attr_id' => $k,
						'attr_value' => $v1,
					));
				else 
					$gaModel->where(array(
						'id' => array('eq', $gaid[$_i]),
					))->setField('attr_value', $v1);
				
				$_i++;
			}
		}
		
		$ecid = I('post.ext_cat_id');
		$gcModel = D('goods_cat');
		$gcModel->where(array(
			'goods_id' => array('eq', $id),
		))->delete();
		if($ecid)
		{
			$ecid = array_unique($ecid);
			foreach ($ecid as $k => $v)
			{
				if(empty($v))
					continue ;
				$gcModel->add(array(
					'cat_id' => $v,
					'goods_id' => $id,
				));
			}
		}
		if($_FILES['logo']['error'] == 0)
		{
			$ret = uploadOne('logo', 'Goods', array(
				array(700, 700),
				array(350, 350),
				array(130, 130),
				array(50, 50),
			));
			$data['logo'] = $ret['images'][0];
			$data['mbig_logo'] = $ret['images'][1];
			$data['big_logo'] = $ret['images'][2];
			$data['mid_logo'] = $ret['images'][3];
			$data['sm_logo'] = $ret['images'][4];
			$oldLogo = $this->field('logo,mbig_logo,big_logo,mid_logo,sm_logo')->find($id);
			deleteImage($oldLogo);
		}
		if(isset($_FILES['pic']))
		{
			$pics = array();
			foreach ($_FILES['pic']['name'] as $k => $v)
			{
				$pics[] = array(
					'name' => $v,
					'type' => $_FILES['pic']['type'][$k],
					'tmp_name' => $_FILES['pic']['tmp_name'][$k],
					'error' => $_FILES['pic']['error'][$k],
					'size' => $_FILES['pic']['size'][$k],
				);
			}
			$_FILES = $pics;  
			$gpModel = D('goods_pic');
			foreach ($pics as $k => $v)
			{
				if($v['error'] == 0)
				{
					$ret = uploadOne($k, 'Goods', array(
						array(650, 650),
						array(350, 350),
						array(50, 50),
					));
					if($ret['ok'] == 1)
					{
						$gpModel->add(array(
							'pic' => $ret['images'][0],
							'big_pic' => $ret['images'][1],
							'mid_pic' => $ret['images'][2],
							'sm_pic' => $ret['images'][3],
							'goods_id' => $id,
						));
					}
				}
			}
		}
		$mp = I('post.member_price');
		$mpModel = D('member_price');
		$mpModel->where(array(
			'goods_id' => array('eq', $id),
		))->delete();
		foreach ($mp as $k => $v)
		{
			$_v = (float)$v;
			if($_v > 0)
			{
				$mpModel->add(array(
					'price' => $_v,
					'level_id' => $k,
					'goods_id' => $id,
				));
			}
		}
		$data['goods_desc'] = removeXSS($_POST['goods_desc']);
	}
	
	protected function _before_delete($option)
	{
		$id = $option['where']['id'];
		$gnModel = D('goods_number');
		$gnModel->where(array(
			'goods_id' => array('eq', $id),
		))->delete();
		$gaModel = D('goods_attr');
		$gaModel->where(array(
			'goods_id' => array('eq', $id),
		))->delete();
		$gcModel = D('goods_cat');
		$gcModel->where(array(
			'goods_id' => array('eq', $id),
		))->delete();
		$gpModel = D('goods_pic');
		$pics = $gpModel->field('pic,sm_pic,mid_pic,big_pic')->where(array(
			'goods_id' => array('eq', $id),
		))->select();
		foreach ($pics as $k => $v)
			deleteImage($v);  
		$gpModel->where(array(
			'goods_id' => array('eq', $id),
		))->delete();
		$oldLogo = $this->field('logo,mbig_logo,big_logo,mid_logo,sm_logo')->find($id);
		deleteImage($oldLogo);
		$mpModel = D('member_price');
		$mpModel->where(array(
			'goods_id' => array('eq', $id),
		))->delete();
	}
	
	public function getGoodsIdByCatId($catId)
	{
		$catModel = D('Admin/Category');
		$children = $catModel->getChildren($catId);
		// 和子分类放一起
		$children[] = $catId;
		$gids = $this->field('id')->where(array(
			'cat_id' => array('in', $children),
		))->select();
		$gcModel = D('goods_cat');
		$gids1 = $gcModel->field('DISTINCT goods_id id')->where(array(
			'cat_id' => array('IN', $children)
		))->select();
		if($gids && $gids1)
			$gids = array_merge($gids, $gids1);
		elseif ($gids1)
			$gids = $gids1;
		$id = array();
		foreach ($gids as $k => $v)
		{
			if(!in_array($v['id'], $id))
				$id[] = $v['id'];
		}
		return $id;
	}
	public function search($perPage = 5)
	{
		$where = array();  
	
		$gn = I('get.gn');
		if($gn)
			$where['a.goods_name'] = array('like', "%$gn%"); 
		$fp = I('get.fp');
		$tp = I('get.tp');
		if($fp && $tp)
			$where['a.shop_price'] = array('between', array($fp, $tp)); 
		elseif ($fp)
			$where['a.shop_price'] = array('egt', $fp);  
		elseif ($tp)
			$where['a.shop_price'] = array('elt', $tp); 
		$ios = I('get.ios');
		if($ios)
			$where['a.is_on_sale'] = array('eq', $ios); 
		$fa = I('get.fa');
		$ta = I('get.ta');
		if($fa && $ta)
			$where['a.addtime'] = array('between', array($fa, $ta));
		elseif ($fa)
			$where['a.addtime'] = array('egt', $fa);  
		elseif ($ta)
			$where['a.addtime'] = array('elt', $ta);
		$brandId = I('get.brand_id');
		if($brandId)
			$where['a.brand_id'] = array('eq', $brandId);
		$catId = I('get.cat_id');
		if($catId)
		{
			$gids = $this->getGoodsIdByCatId($catId);
			$where['a.id'] = array('in', $gids);
		}
		$count = $this->where($where)->count();
		$pageObj = new \Think\Page($count, $perPage);
		$pageObj->setConfig('next', '下一页');
		$pageObj->setConfig('prev', '上一页');
		$pageString = $pageObj->show();
		$orderby = 'a.id';     
		$orderway = 'desc';   
		$odby = I('get.odby');
		if($odby)
		{
			if($odby == 'id_asc')
				$orderway = 'asc';
			elseif ($odby == 'price_desc')
				$orderby = 'shop_price';
			elseif ($odby == 'price_asc')
			{
				$orderby = 'shop_price';
				$orderway = 'asc';
			}
		}
		
		$data = $this->order("$orderby $orderway")                  
		->field('a.*,b.brand_name,c.cat_name,GROUP_CONCAT(e.cat_name SEPARATOR "<br />") ext_cat_name')
		->alias('a')
		->join('LEFT JOIN __BRAND__ b ON a.brand_id=b.id      
		        LEFT JOIN __CATEGORY__ c ON a.cat_id=c.id 
		        LEFT JOIN __GOODS_CAT__ d ON a.id=d.goods_id 
		        LEFT JOIN __CATEGORY__ e ON d.cat_id=e.id') 
		->where($where)                                              
		->limit($pageObj->firstRow.','.$pageObj->listRows)           
		->group('a.id')
		->select();
		return array(
			'data' => $data,  
			'page' => $pageString,  
		);
	}
	protected function _after_insert($data, $option)
	{
		
		$attrValue = I('post.attr_value');
		$gaModel = D('goods_attr');
		foreach ($attrValue as $k => $v)
		{
			$v = array_unique($v);
			foreach ($v as $k1 => $v1)
			{
				$gaModel->add(array(
					'goods_id' => $data['id'],
					'attr_id' => $k,
					'attr_value' => $v1,
				));
			}
		}
		
		if($ecid)
		{
			$gcModel = D('goods_cat');
			foreach ($ecid as $k => $v)
			{
				if(empty($v))
					continue ;
				$gcModel->add(array(
					'cat_id' => $v,
					'goods_id' => $data['id'],
				));
			}
		}
		if(isset($_FILES['pic']))
		{
			$pics = array();
			foreach ($_FILES['pic']['name'] as $k => $v)
			{
				$pics[] = array(
					'name' => $v,
					'type' => $_FILES['pic']['type'][$k],
					'tmp_name' => $_FILES['pic']['tmp_name'][$k],
					'error' => $_FILES['pic']['error'][$k],
					'size' => $_FILES['pic']['size'][$k],
				);
			}
			$_FILES = $pics;  
			$gpModel = D('goods_pic');
			foreach ($pics as $k => $v)
			{
				if($v['error'] == 0)
				{
					$ret = uploadOne($k, 'Goods', array(
						array(650, 650),
						array(350, 350),
						array(50, 50),
					));
					if($ret['ok'] == 1)
					{
						$gpModel->add(array(
							'pic' => $ret['images'][0],
							'big_pic' => $ret['images'][1],
							'mid_pic' => $ret['images'][2],
							'sm_pic' => $ret['images'][3],
							'goods_id' => $data['id'],
						));
					}
				}
			}
		}
		$mp = I('post.member_price');
		$mpModel = D('member_price');
		foreach ($mp as $k => $v)
		{
			$_v = (float)$v;
			if($_v > 0)
			{
				$mpModel->add(array(
					'price' => $_v,
					'level_id' => $k,
					'goods_id' => $data['id'],
				));
			}
		}
	}
	public function getPromoteGoods($limit = 5)
	{
		$today = date('Y-m-d H:i');
		return $this->field('id,goods_name,mid_logo,promote_price')
		->where(array(
			'is_on_sale' => array('eq', '是'),
			'promote_price' => array('gt', 0),
			'promote_start_date' => array('elt', $today),
			'promote_end_date' => array('egt', $today),
		))
		->limit($limit)
		->order('sort_num ASC')
		->select();
	}
	public function getRecGoods($recType, $limit = 5)
	{
		return $this->field('id,goods_name,mid_logo,shop_price')
		->where(array(
			'is_on_sale' => array('eq', '是'),
			"$recType" => array('eq', '是'),
		))
		->limit($limit)
		->order('sort_num ASC')
		->select();
	}
	
	public function getMemberPrice($goodsId)
	{
		$today = date('Y-m-d H:i');
		$levelId = session('level_id');
		$promotePrice = $this->field('promote_price')->where(array(
			'id' => array('eq', $goodsId),
			'promote_price' => array('gt', 0),
			'promote_start_date' => array('elt', $today),
			'promote_end_date' => array('egt', $today),
		))->find();
		
		if($levelId)
		{
			$mpModel = D('member_price');
			$mpData = $mpModel->field('price')->where(array(
				'goods_id' => array('eq', $goodsId),
				'level_id' => array('eq', $levelId),
			))->find();
			if($mpData['price'])
			{
				if($promotePrice['promote_price'])
					return min($promotePrice['promote_price'], $mpData['price']);
				else 
					return $mpData['price'];
			}
			else 
			{
				$p = $this->field('shop_price')->find($goodsId);
				if($promotePrice['promote_price'])
					return min($promotePrice['promote_price'], $p['shop_price']);
				else 
					return $p['shop_price'];
			}
		}
		else 
		{
			$p = $this->field('shop_price')->find($goodsId);
			if($promotePrice['promote_price'])
				return min($promotePrice['promote_price'], $p['shop_price']);
			else 
				return $p['shop_price'];
		}
	}
	public function cat_search($catId, $pageSize = 60)
	{
		$goodsId = $this->getGoodsIdByCatId($catId);
		$where['a.id'] = array('in', $goodsId);
		$brandId = I('get.brand_id');
		if($brandId)
			$where['a.brand_id'] = array('eq', (int)$brandId);
		$price = I('get.price');
		if($price)
		{
			$price = explode('-', $price);
			$where['a.shop_price'] = array('between', $price);
		}
		
		$gaModel = D('goods_attr');
		$attrGoodsId = NULL;  
		foreach ($_GET as $k => $v)
		{
			if(strpos($k, 'attr_') === 0)
			{
				$attrId = str_replace('attr_', '', $k); 
				$attrName = strrchr($v, '-');
				$attrValue = str_replace($attrName, '', $v);
				$gids = $gaModel->field('GROUP_CONCAT(goods_id) gids')->where(array(
					'attr_id' => array('eq', $attrId),
					'attr_value' => array('eq', $attrValue),
				))->find();
				if($gids['gids'])
				{
					$gids['gids'] = explode(',', $gids['gids']);
					if($attrGoodsId === NULL)
						$attrGoodsId = $gids['gids']; 
					else 
					{
						$attrGoodsId = array_intersect($attrGoodsId, $gids['gids']);
						if(empty($attrGoodsId))
						{
							$where['a.id'] = array('eq', 0);
							break;
						}
					}
				}
				else 
				{
					$attrGoodsId = array();
					$where['a.id'] = array('eq', 0);
					break;
				}
			}
		}
		if($attrGoodsId)
			$where['a.id'] = array('IN', $attrGoodsId);
		$count = $this->alias('a')->field('COUNT(a.id) goods_count,GROUP_CONCAT(a.id) goods_id')->where($where)->find();
		$data['goods_id'] = explode(',', $count['goods_id']);
		
		$page = new \Think\Page($count['goods_count'], $pageSize);
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$data['page'] = $page->show();
		
		$oderby = 'xl';    
		$oderway = 'desc';
		$odby = I('get.odby');
		if($odby)
		{
			if($odby == 'addtime')
				$oderby = 'a.addtime';
			if(strpos($odby, 'price_') === 0)
			{
				$oderby = 'a.shop_price';
				if($odby == 'price_asc')
					$oderway = 'asc';
			}
		}
		$data['data'] = $this->alias('a')
		->field('a.id,a.goods_name,a.mid_logo,a.shop_price,SUM(b.goods_number) xl')
		->join('LEFT JOIN __ORDER_GOODS__ b 
				 ON (a.id=b.goods_id 
				      AND 
				     b.order_id IN(SELECT id FROM __ORDER__ WHERE pay_status="是"))')
		->where($where)
		->group('a.id')
		->limit($page->firstRow.','.$page->listRows)
		->order("$oderby $oderway")
		->select();
		
		return $data;
	}
	public function key_search($key, $pageSize = 60)
	{
		
		$goodsId = $this->alias('a')
		->field('GROUP_CONCAT(DISTINCT a.id) gids')
		->join('LEFT JOIN __GOODS_ATTR__ b ON a.id=b.goods_id')
		->where(array(
			'a.is_on_sale' => array('eq', '是'),
			'a.goods_name' => array('exp', " LIKE '%$key%' OR a.goods_desc LIKE '%$key%' OR attr_value LIKE '%$key%'"),
		))
		->find();
		$goodsId = explode(',', $goodsId['gids']);
		
		$where['a.id'] = array('in', $goodsId);

		$brandId = I('get.brand_id');
		if($brandId)
			$where['a.brand_id'] = array('eq', (int)$brandId);

		$price = I('get.price');
		if($price)
		{
			$price = explode('-', $price);
			$where['a.shop_price'] = array('between', $price);
		}
		$gaModel = D('goods_attr');
		$attrGoodsId = NULL; 
		foreach ($_GET as $k => $v)
		{
			if(strpos($k, 'attr_') === 0)
			{
				$attrId = str_replace('attr_', '', $k); 
				$attrName = strrchr($v, '-');
				$attrValue = str_replace($attrName, '', $v);
				$gids = $gaModel->field('GROUP_CONCAT(goods_id) gids')->where(array(
					'attr_id' => array('eq', $attrId),
					'attr_value' => array('eq', $attrValue),
				))->find();
				if($gids['gids'])
				{
					$gids['gids'] = explode(',', $gids['gids']);
					if($attrGoodsId === NULL)
						$attrGoodsId = $gids['gids']; 
					else 
					{
						$attrGoodsId = array_intersect($attrGoodsId, $gids['gids']);
						if(empty($attrGoodsId))
						{
							$where['a.id'] = array('eq', 0);
							break;
						}
					}
				}
				else 
				{
					$attrGoodsId = array();
					$where['a.id'] = array('eq', 0);
					break;
				}
			}
		}
		if($attrGoodsId)
			$where['a.id'] = array('IN', $attrGoodsId);
		$count = $this->alias('a')->field('COUNT(a.id) goods_count,GROUP_CONCAT(a.id) goods_id')->where($where)->find();
		$data['goods_id'] = explode(',', $count['goods_id']);
		
		$page = new \Think\Page($count['goods_count'], $pageSize);
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$data['page'] = $page->show();
		$oderby = 'xl';    
		$oderway = 'desc'; 
		$odby = I('get.odby');
		if($odby)
		{
			if($odby == 'addtime')
				$oderby = 'a.addtime';
			if(strpos($odby, 'price_') === 0)
			{
				$oderby = 'a.shop_price';
				if($odby == 'price_asc')
					$oderway = 'asc';
			}
		}
		$data['data'] = $this->alias('a')
		->field('a.id,a.goods_name,a.mid_logo,a.shop_price,SUM(b.goods_number) xl')
		->join('LEFT JOIN __ORDER_GOODS__ b 
				 ON (a.id=b.goods_id 
				      AND 
				     b.order_id IN(SELECT id FROM __ORDER__ WHERE pay_status="是"))')
		->where($where)
		->group('a.id')
		->limit($page->firstRow.','.$page->listRows)
		->order("$oderby $oderway")
		->select();
		
		return $data;
	}
}












