<?php

class CommonController extends FrontBase {
	
	public function actionContact(){
		
		if(isset($_POST['data'])){
			$data=$_POST['data'];
			$model=new Contact();
			$model->name=$data[0];
			$model->gender=$data[1];
			$model->phone=$data[2];
			
			$model->city=$data[3];
			$model->content=$data[4];
			
			$model->create_time=date('Y-m-d H:i:s');
			
			if($model->save()){
				echo 1;exit();
			}else{
				echo 0;exit();
			}
		}
		
	}
	
	public function actionMcontact(){
		
		if(isset($_POST['data'])){
			$data=$_POST['data'];
			$model=new Contact();
			$model->name=$data[0];
			$model->gender=$data[1];
			$model->phone=$data[2];
			
			$model->content=$data[4];
			$model->source=2;
			
			$d = explode(' ',$data[3]);
			
			$model->province=$d[0];
			$model->city=$d[1].' '.$d[2];
			
			$model->create_time=date('Y-m-d H:i:s');
			
			if($model->save()){
				echo 1;exit();
			}else{
				echo 0;exit();
			}
		}
		
	}
	
	public function actionVisit(){
		if(isset($_POST['data'])){
			$data=$_POST['data'];
			$model=new Reservation();
			$model->gender=$data[0];
			$model->name=$data[1];
			$model->phone=$data[2];
			$model->province=$data[3];
			$model->city=$data[4];
			
			$model->create_time=date('Y-m-d H:i:s');
			
			if($model->save()){
				echo 1;exit();
			}else{
				echo 0;exit();
			}
		}
	}
	
	public function actionBm(){
		if(isset($_POST['data'])){
			$data=$_POST['data'];
			$model=new Reservation();
			$model->name=$data[0];
			$model->gender=$data[1];
			$model->phone=$data[2];
			
			$model->source=1;
			$model->create_time=date('Y-m-d H:i:s');
			
			if($model->save()){
				echo 1;exit();
			}else{
				echo 0;exit();
			}
		}
	}
	
	
	public function actionGetcase(){
		
		if(isset($_POST['data'])){
			$data=$_POST['data'];
			
			$model = new Cases();
			$criteria = new CDbCriteria();
			$criteria->addCondition("is_show=1 and orderid>$data");
			$criteria->order = 'orderid ASC';
			$criteria->limit=6;
			$cases = $model->findAll($criteria);
			$html='';
			if($cases){
				foreach($cases as $one){
					$imgs=Caseimg::getImgs($one->id);
					$i=0;
					$imglist='';
					foreach($imgs as $img){
						if($i==0){
							$imglist=$img;
						}else{
							$imglist = $imgs.','.$img;
						};
						$i++;
					}

					$html=$html."<div class='item'>
						<a href='javascript:;' class='caseview external' data-img='$imglist' data-txt='$one->eint<br>$one->cint'>
							<img src='$one->img'>
							<div class='text'><span>$one->name</span></div>
						</a>

					</div>";
				}
				$html=$html."<p style='display:none' class='order'>$one->orderid</p>";
			}
			if($html){
				echo $html;exit();
			}else{
				echo 0;exit();
			}
		}
		
	}
	
}