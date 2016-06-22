<?php

/**
 * Description of NewsController
 *
 * @author Administrator
 */
class QaController extends FrontBase {
	//put your code here
	
	public function actionIndex(){
		
		$model = new Qa();
		$criteria = new CDbCriteria();
		
		$criteria->addCondition("is_show=1");
		//排序
		$criteria->order = 'id desc';
		//分页处理
		$count = $model->count($criteria);
		$page = new CPagination($count);
		$page->pageSize = 10;
		$page->applyLimit($criteria);
		
		$qas = $model->findAll($criteria);
		
		$render='index';
		if($this->_type==2){
			$render='index2';
		}
		
		$this->render($render,array(
			'qas'=>$qas,
			'page'=>$page,
		));
	}
	
	public function actionView(){
		
		$this->render('view',array(
			//'news'=>$news,
			
		));
	}
	
	public function actionCw(){
		
		$this->render('cw',array(
			//'news'=>$news,
			
		));
	}
	
}
