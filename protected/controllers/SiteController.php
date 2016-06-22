<?php

class SiteController extends FrontBase
{

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$render='index';
		if($this->_type==2){
			$render='index2';
		}
		
		$this->renderPartial($render,array(
			
		));
	}

	/**
	 * 3D产品
	 */
	public function actionPro()
	{
		$this->render('pro');
	}
	
	/**
	 * 招聘信息
	 */
	public function actionJob()
	{
		$model = new Job();
		$criteria = new CDbCriteria();
		$criteria->addCondition("is_show=1");
		$criteria->order = 'orderid ASC';
		$jobs = $model->findAll($criteria);
		
		$render='job';
		if($this->_type==2){
			$render='job2';
		}
		
		$this->render($render,array(
			'jobs'=>$jobs,
			
		));
	}

	/**
	 * 联系我们
	 */
	public function actionContact()
	{
		$render='contact';
		if($this->_type==2){
			$render='contact2';
		}
		
		$this->render($render,array(
			
		));
	}

	/**
	 * 关于我们
	 */
	public function actionAbout()
	{
		$about=Page::model()->find('id=:id',array('id'=>1));
		
		$render='about';
		if($this->_type==2){
			$render='visit2';
		}
		
		$this->render($render,array(
			'about'=>$about,
		));
	}
	
	/**
	 * 颜色材料
	 */
	public function actionMaterial()
	{
		$model = new Style();
		$criteria = new CDbCriteria();
		$criteria->addCondition("is_show=1");
		$criteria->order = 'orderid ASC';
		$styles = $model->findAll($criteria);
		
		$model2 = new Material();
		$criteria2 = new CDbCriteria();
		$criteria2->addCondition("is_show=1");
		$criteria2->order = 'orderid ASC';
		$materials = $model2->findAll($criteria2);
		
		$render='material';
		if($this->_type==2){
			$render='material2';
			$ad15=Common::getad(26);
		}else{
			$ad15=Common::getad(15);
		}
		
		$this->render($render,array(
			'styles'=>$styles,
			'materials'=>$materials,
			'ad15'=>$ad15,
		));
	}
	
	/**
	 * 网站地图
	 */
	public function actionSitemap()
	{
		$cat=Newscat::model()->findAll();
		
		$model = new Support();
		$criteria = new CDbCriteria();
		
		$criteria->addCondition("is_show=1");
		$criteria->order = 'id asc';
		$sups = $model->findAll($criteria);
		
		$this->render('sitemap',array(
			'cat'=>$cat,
			'sups'=>$sups,
		));
	}
	
	/**
	 * 超级英雄
	 */
	public function actionSuper()
	{
		$more=Common::getads(9);
		
		$this->render('super',array(
			'more'=>$more,
		));
	}
	
	/**
	 * 我的梦想
	 */
	public function actionDream()
	{
		$more=Common::getads(9);
		
		$this->render('dream',array(
			'more'=>$more,
		));
	}
	
	/**
	 * 白雪公主
	 */
	public function actionSnow()
	{
		$more=Common::getads(9);
		
		$this->render('snow',array(
			'more'=>$more,
		));
	}
	
	/**
	 * 疯狂动物城
	 */
	public function actionAnimal()
	{
		$more=Common::getads(9);
		
		$this->render('animal',array(
			'more'=>$more,
		));
	}
	
	/**
	 * 故事
	 */
	public function actionStory($id)
	{
		$story=Story::model()->find('id=:id',array('id'=>$id));
		
		$more=Common::getads(9);
		
		$this->render('story',array(
			'story'=>$story,
			'more'=>$more,
		));
	}
	
	/**
	 * 案例
	 */
	public function actionCase()
	{
		$model = new Cases();
		$criteria = new CDbCriteria();
		$criteria->addCondition("is_show=1");
		$criteria->order = 'orderid ASC';
		$page='';
		if($this->_type==1){
			//分页处理
			$count = $model->count($criteria);
			$page = new CPagination($count);
			$page->pageSize = 9;
			$page->applyLimit($criteria);
		}else{
			$criteria->limit=6;
		}
		
		$cases = $model->findAll($criteria);
		
		$render='case';
		if($this->_type==2){
			$render='case2';
			$this->layout=false;
		}
		
		$this->render($render,array(
			'cases'=>$cases,
			'page'=>$page,
		));
	}
	
	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest){
				echo $error['message'];exit();
			}else{
				$this->render('error', array(
					'error'=>$error,
				));
			}
		}
	}
}