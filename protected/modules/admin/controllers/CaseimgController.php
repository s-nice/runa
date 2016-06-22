<?php

class CaseimgController extends AdminBase
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

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
		$model=new Caseimg;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Caseimg']))
		{
			$model->attributes=$_POST['Caseimg'];
			$model->create_uid=Yii::app()->user->id;
			$model->create_time=date('Y-m-d H:i:s');
			
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Caseimg']))
		{
			$model->attributes=$_POST['Caseimg'];
			$model->update_uid=Yii::app()->user->id;
			$model->update_time=date('Y-m-d H:i:s');
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
		
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Manages all models.
	 */
	public function actionPc($cid='')
	{
		$model=new Caseimg('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Caseimg']))
			$model->attributes=$_GET['Caseimg'];
		
		$model->cid=$cid;
		$model->display=1;

		$case=Cases::model()->find('id=:id',array('id'=>$cid));
		$case=$case->name;
		
		$this->render('pc',array(
			'model'=>$model,
			'cid'=>$cid,
			'case'=>$case,
		));
	}
	
	/**
	 * Manages all models.
	 */
	public function actionMobile($cid='')
	{
		$model=new Caseimg('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Caseimg']))
			$model->attributes=$_GET['Caseimg'];
		
		$model->cid=$cid;
		$model->display=2;

		$case=Cases::model()->find('id=:id',array('id'=>$cid));
		$case=$case->name;
		
		$this->render('mobile',array(
			'model'=>$model,
			'cid'=>$cid,
			'case'=>$case,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Caseimg the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Caseimg::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Caseimg $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='caseimg-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionUpload(){

		$typeArr = array("jpg", "png", "gif"); //允许上传文件格式
		$path = "upload/img/"; //上传路径

		if (isset($_POST)) {
			$name = $_FILES['file']['name'];
			$size = $_FILES['file']['size'];
			$name_tmp = $_FILES['file']['tmp_name'];
			if (empty($name)) {
				echo json_encode(array("error" => "您还未选择图片"));
				exit;
			}
			$type = strtolower(substr(strrchr($name, '.'), 1)); //获取文件类型

			if (!in_array($type, $typeArr)) {
				echo json_encode(array("error" => "清上传jpg,png或gif类型的图片！"));
				exit;
			}
			if ($size > (500 * 1024)) {
				echo json_encode(array("error" => "图片大小已超过500KB！"));
				exit;
			}

			$pic_name = time() . rand(10000, 99999) . "." . $type; //图片名称
			
			$pic_url = $path . $pic_name; //上传后图片路径+名称
			if (move_uploaded_file($name_tmp, $pic_url)) { //临时文件转移到目标文件夹
				
				$model=new Caseimg();
				$model->cid=$_GET['cid'];
				$model->create_time=date('Y-m-d H:i:s');
				$model->create_uid=Yii::app()->user->id;
				$model->orderid=1;
				$model->img='/'.$path . $pic_name;
				$model->save();
				
				echo json_encode(array("error" => "0", "pic" => $pic_url, "name" => $pic_name));
			} else {
				echo json_encode(array("error" => "上传有误，清检查服务器配置！"));
			}
		}
	}
	
	public function actionUpload2(){

		$typeArr = array("jpg", "png", "gif"); //允许上传文件格式
		$path = "upload/img/"; //上传路径

		if (isset($_POST)) {
			$name = $_FILES['file']['name'];
			$size = $_FILES['file']['size'];
			$name_tmp = $_FILES['file']['tmp_name'];
			if (empty($name)) {
				echo json_encode(array("error" => "您还未选择图片"));
				exit;
			}
			$type = strtolower(substr(strrchr($name, '.'), 1)); //获取文件类型

			if (!in_array($type, $typeArr)) {
				echo json_encode(array("error" => "清上传jpg,png或gif类型的图片！"));
				exit;
			}
			if ($size > (500 * 1024)) {
				echo json_encode(array("error" => "图片大小已超过500KB！"));
				exit;
			}

			$pic_name = time() . rand(10000, 99999) . "." . $type; //图片名称
			
			$pic_url = $path . $pic_name; //上传后图片路径+名称
			if (move_uploaded_file($name_tmp, $pic_url)) { //临时文件转移到目标文件夹
				
				$model=new Caseimg();
				$model->cid=$_GET['cid'];
				$model->create_time=date('Y-m-d H:i:s');
				$model->create_uid=Yii::app()->user->id;
				$model->orderid=1;
				$model->display=2;
				$model->img='/'.$path . $pic_name;
				$model->save();
				
				echo json_encode(array("error" => "0", "pic" => $pic_url, "name" => $pic_name));
			} else {
				echo json_encode(array("error" => "上传有误，清检查服务器配置！"));
			}
		}
	}

}
