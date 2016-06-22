<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NewsController
 *
 * @author Administrator
 */
class NewsController extends FrontBase {
	//put your code here
	
	public function actionIndex($pid=0){
		
		$model = new News();
		$criteria = new CDbCriteria();
		//排序
		$criteria->order = 'pid asc, news_date desc';
		
		//查询条件
		if($pid){
			$pid=intval($pid);
			$criteria->addCondition("pid=$pid and is_show=1");
		}else{
			$criteria->addCondition("is_show=1");
		}
		
		//分页处理
		$count = $model->count($criteria);
		$page = new CPagination($count);
		$page->pageSize = 10;
		$page->applyLimit($criteria);
		
		$news = $model->findAll($criteria);
		
		$render='index';
		if($this->_type==2){
			$render='index2';
		}
		
		$cat=Newscat::model()->findAll();
		
		$this->render($render,array(
			'news'=>$news,
			'page'=>$page,
			'cat'=>$cat,
			'pid'=>$pid,
		));
	}
	
	public function actionView($id){
		$id=intval($id);
		$news=News::model()->find('id=:id',array('id'=>$id));
		
		$news->views+=1;
		$news->save();
		
		$model=new News();
		$criteria1 = new CDbCriteria();
		$criteria1->addCondition("id<$id and is_show=1");
		$criteria1->order='id desc';
		$next = $model->find($criteria1);
		
		$criteria2 = new CDbCriteria();
		$criteria2->addCondition("id>$id and is_show=1");
		$criteria2->order='id asc';
		$last = $model->find($criteria2);
		
		$render='view';
		if($this->_type==2){
			$render='view2';
		}
		
		$this->render($render,array(
			'news'=>$news,
			
			'next'=>$next,
			'last'=>$last,
			
		));
	}
	
}
