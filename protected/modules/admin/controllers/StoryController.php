<?php

class StoryController extends AdminBase
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
		$model=new Story;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Story']))
		{
			$model->attributes=$_POST['Story'];
			$model->create_uid=Yii::app()->user->id;
			$model->create_time=date('Y-m-d H:i:s');
			
			$img =  CUploadedFile::getInstance($model,'img');
			if($img){
				$savename = Yii::app()->params['uploadPath'].time().mt_rand(1,999).'.'.$img->extensionName;
				$model->img='/'.$savename;
				
				$img->saveAs($savename);
				
			}
			
			$img2 =  CUploadedFile::getInstance($model,'img2');
			if($img2){
				$savename = Yii::app()->params['uploadPath'].time().mt_rand(1,999).'.'.$img2->extensionName;
				$model->img2='/'.$savename;
				if($model->validate()){
					$img2->saveAs($savename);
				}
			}
			
			if($model->save()){
				//$this->redirect(array('view','id'=>$model->id));
				Yii::app()->user->setFlash('success','信息提交成功！');
			}else{
				Yii::app()->user->setFlash('success','信息提交失败！');
			}
		}
		$this->render('create',array(
			'model'=>$model,
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

		$oldimg=$model->img;
		$oldimg2=$model->img2;

		if(isset($_POST['Story']))
		{
			$model->attributes=$_POST['Story'];
			
			$img =  CUploadedFile::getInstance($model,'img');
			if($img){
				$savename = Yii::app()->params['uploadPath'].time().mt_rand(1,999).'.'.$img->extensionName;
				$model->img='/'.$savename;
				
				$img->saveAs($savename);
				
				if (file_exists($oldimg)) {
					unlink($oldimg);
				}
			}else{
				$model->img=$oldimg;
			}
			
			$img2 =  CUploadedFile::getInstance($model,'img2');
			if($img2){
				$savename = Yii::app()->params['uploadPath'].time().mt_rand(1,999).'.'.$img2->extensionName;
				$model->img2='/'.$savename;
				if($model->validate()){
					$img2->saveAs($savename);
				}
				if (file_exists($oldimg2)) {
					unlink($oldimg2);
				}
			}else{
				$model->img2=$oldimg2;
			}
			
			if($model->save()){
				//$this->redirect(array('view','id'=>$model->id));
				Yii::app()->user->setFlash('success','信息提交成功！');
			}else{
				Yii::app()->user->setFlash('success','信息提交失败！');
			}
		}

		$this->render('update',array(
			'model'=>$model,
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
		
		if (file_exists($model->img)) {
			unlink($model->img);
		}
		
		if (file_exists($model->img2)) {
			unlink($model->img2);
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
		$model=new Story('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Story']))
			$model->attributes=$_GET['Story'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Story the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Story::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Story $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='story-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
