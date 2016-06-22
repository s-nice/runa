<?php

/**
 * Description of NewsController
 *
 * @author Administrator
 */
class TemplateController extends FrontBase {
	//put your code here
	
	public function actionIndex(){
		
		$model = new Tem();
		$criteria = new CDbCriteria();
		
		$criteria->addCondition("is_show=1");
		
		//排序
		$criteria->order = 'id desc';
		
		//分页处理
		$count = $model->count($criteria);
		$page = new CPagination($count);
		$page->pageSize = 10;
		$page->applyLimit($criteria);
		
		$tems = $model->findAll($criteria);
		
		$render='index';
		if($this->_type==2){
			$render='index2';
		}
		
		$this->render($render,array(
			'tems'=>$tems,
			'page'=>$page,
		));
	}
	
	public function actionView($id){
		$id=intval($id);
		$tem=Tem::model()->find('id=:id',array('id'=>$id));
		
		$this->render('view',array(
			'tem'=>$tem,
			
		));
	}
	
	public function actionCw(){
		
		$this->render('cw',array(
			//'news'=>$news,
			
		));
	}
	
}
