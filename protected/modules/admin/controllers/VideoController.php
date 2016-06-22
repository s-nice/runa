<?php

class VideoController extends AdminBase
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/widgets';

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->layout=FALSE;
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Video;

		$catelist = Videocat::getDropList();

		if(isset($_POST['Video']))
		{
			$model->attributes=$_POST['Video'];
			$model->create_uid=Yii::app()->user->id;
			$model->create_time=date('Y-m-d H:i:s');
			
			$img =  CUploadedFile::getInstance($model,'img');
			if($img){
				$savename = Yii::app()->params['uploadPath'].time().mt_rand(1,999).'.'.$img->extensionName;
				$model->img='/'.$savename;
				
				$img->saveAs($savename);
				
			}
			
			$v =  CUploadedFile::getInstance($model,'video');
			if($v){
				$savename = Yii::app()->params['videoPath'].time().mt_rand(1,999).'.'.$v->extensionName;
				$model->video='/'.$savename;
				if($model->validate()){
					$v->saveAs($savename);
				}
			}
			
			if(file_exists('.'.$model->video) && $model->save()){
				//$this->redirect(array('view','id'=>$model->id));
				Yii::app()->user->setFlash('success','信息提交成功！');
			}else{
				Yii::app()->user->setFlash('success','信息提交失败！');
			}
		}
		$this->render('create',array(
			'model'=>$model,
			'catelist'=>$catelist,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		$catelist = Videocat::getDropList();

		if(isset($_POST['Video']))
		{
			$oldimg=$model->img;
			$oldvideo=$model->video;
			
			$model->attributes=$_POST['Video'];
			
			$img =  CUploadedFile::getInstance($model,'img');
			if($img){
				$savename = Yii::app()->params['uploadPath'].time().mt_rand(1,999).'.'.$img->extensionName;
				$model->img='/'.$savename;
				
				$img->saveAs($savename);
				
				if (file_exists('.'.$oldimg)) {
					unlink('.'.$oldimg);
				}
			}else{
				$model->img=$oldimg;
			}
			
			$v =  CUploadedFile::getInstance($model,'video');
			if($v){
				$savename = Yii::app()->params['videoPath'].time().mt_rand(1,999).'.'.$v->extensionName;
				$model->video='/'.$savename;
				if($model->validate()){
					$v->saveAs($savename);
				}
				
			}else{
				$model->video=$oldvideo;
			}
			
			if($model->save()){
				if (file_exists('.'.$oldvideo)) {
					unlink('.'.$oldvideo);
				}
				//$this->redirect(array('view','id'=>$model->id));
				Yii::app()->user->setFlash('success','信息提交成功！');
			}else{
				Yii::app()->user->setFlash('success','信息提交失败！');
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'catelist'=>$catelist,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model=$this->loadModel($id);
		
		if (file_exists('.'.$model->img)) {
			unlink('.'.$model->img);
		}
		if (file_exists('.'.$model->video)) {
			unlink('.'.$model->video);
		}
		
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Video('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Video']))
			$model->attributes=$_GET['Video'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Video the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Video::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Video $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='video-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
