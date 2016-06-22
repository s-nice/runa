<?php

/**
 * Description of NewsController
 *
 * @author Administrator
 */
class WorksController extends FrontBase {
	//put your code here
	
	public function actionIndex(){
		
		$model = new Cases();
		$criteria = new CDbCriteria();
		//排序
		$criteria->order = 'id desc';
		
		$criteria->addCondition("is_show=1");
		
		//分页处理
		$count = $model->count($criteria);
		$page = new CPagination($count);
		$page->pageSize = 9;
		$page->applyLimit($criteria);
		
		$ws = $model->findAll($criteria);
		
		$render='index';
		if($this->_type==2){
			$render='index2';
		}
		
		$this->render($render,array(
			'ws'=>$ws,
			'page'=>$page,
		));
	}
	
	public function actionView($id){
		$id=intval($id);
		$work=Cases::model()->find('id=:id',array('id'=>$id));
		$tem=Tem::model()->find('id=:id',array('id'=>$work->tid));
		if(!$tem){
			$tem='';
		}
		
		$model=new Cases();
		$criteria1 = new CDbCriteria();
		$criteria1->addCondition("is_show=1 and id<$id");
		$criteria1->order='id desc';
		$next = $model->find($criteria1);
		
		$criteria2 = new CDbCriteria();
		$criteria2->addCondition("is_show=1 and id>$id");
		$criteria2->order='id asc';
		$last = $model->find($criteria2);
		
		$flag=0;
		if(!$next){
			$next=$work;
			$flag=1;
		}
		if(!$last){
			$last=$work;
			$flag=2;
		}
		
		$imgs=Caseimg::getImgs(1,$id);
		
		$this->render('view',array(
			'work'=>$work,
			'tem'=>$tem,
			'last'=>$last,
			'next'=>$next,
			'flag'=>$flag,
			'imgs'=>$imgs,
		));
	}
	
	public function actionVideo($id){
		
		$id=intval($id);
		$video=Video::model()->find('id=:id',array('id'=>$id));
		
		$this->render('video',array(
			'video'=>$video,
			
		));
	}
	
}
