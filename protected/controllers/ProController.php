<?php

/**
 * Description of NewsController
 *
 * @author Administrator
 */
class ProController extends FrontBase {
	//put your code here
	
	public function actionIndex(){
		
		$model = new Pro();
		$criteria = new CDbCriteria();
		
		//$criteria->addCondition("is_show=1");
		$criteria->order = 'id asc';
		$pros = $model->findAll($criteria);
		
		$render='index';
		if($this->_type==2){
			$render='index2';
		}
		
		$this->render($render,array(
			'pros'=>$pros,
			
		));
	}
	
	public function actionView(){
		
		$this->render('view',array(
			//'news'=>$news,
			
		));
	}
	
	public function actionPen(){
		
		$ads5=Common::getads(5);
		$ads6=Common::getads(6);
		$ads7=Common::getads(7);
		
		$this->render('pen',array(
			'ads5'=>$ads5,
			'ads6'=>$ads6,
			'ads7'=>$ads7,
			
		));
	}
	
}
