<?php

/**
 * Description of NewsController
 *
 * @author Administrator
 */
class VideoController extends FrontBase {
	//put your code here
	
	public function actionIndex($pid=0){
		
		$model = new Video();
		$criteria = new CDbCriteria();
		
		//查询条件
		if($pid){
			$pid=intval($pid);
			$criteria->addCondition("pid=$pid and is_show=1");
		}else{
			$criteria->addCondition("is_show=1");
		}
		
		//排序
		$criteria->order = 'pid asc';
		
		//分页处理
		$count = $model->count($criteria);
		$page = new CPagination($count);
		$page->pageSize = 12;
		$page->applyLimit($criteria);
		
		$videos = $model->findAll($criteria);
		
		$render='index';
		if($this->_type==2){
			$render='index2';
		}
		$cat=Videocat::model()->findAll();
		
		$cate=Videocat::getName($pid);
		
		$this->render($render,array(
			'videos'=>$videos,
			'page'=>$page,
			'cat'=>$cat,
			'pid'=>$pid,
			'cate'=>$cate,
		));
	}
	
	public function actionView($id){
		
		$id=intval($id);
		$video=Video::model()->find('id=:id',array('id'=>$id));
		
		$model=new Video();
		$criteria1 = new CDbCriteria();
		$criteria1->addCondition("pid=$video->pid and id>$id");
		$criteria1->order='id asc';
		$next = $model->find($criteria1);
		
		$criteria2 = new CDbCriteria();
		$criteria2->addCondition("pid=$video->pid and id<$id");
		$criteria2->order='id desc';
		$last = $model->find($criteria2);
		
		$render='view';
		if($this->_type==2){
			$render='view2';
		}
		$cate=Videocat::getName($video->pid);
		$this->render('view',array(
			'video'=>$video,
			
			'next'=>$next,
			'last'=>$last,
			
			'cate'=>$cate,
		));
	}
	
}
