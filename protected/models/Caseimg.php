<?php

/**
 * This is the model class for table "{{caseimg}}".
 *
 * The followings are the available columns in table '{{caseimg}}':
 * @property string $id
 * @property string $img
 * @property string $orderid
 * @property integer $is_show
 * @property string $create_uid
 * @property string $create_time
 */
class Caseimg extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{caseimg}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('img, orderid, create_uid, create_time, cid, display', 'required'),
			array('is_show', 'numerical', 'integerOnly'=>true),
			array('img', 'length', 'max'=>120),
			array('orderid, create_uid', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, img, orderid, is_show, create_uid, create_time, cid', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cid'=>'案例',
			'img' => '图片',
			'orderid' => '排序',
			'is_show' => '是否显示',
			'create_uid' => '创建者',
			'create_time' => '上传时间',
			'display' => '展示端',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('orderid',$this->orderid,true);
		$criteria->compare('is_show',$this->is_show);
		$criteria->compare('create_uid',$this->create_uid,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('cid',$this->cid);
		$criteria->compare('display',$this->display);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Caseimg the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	//获取案例图片
	public static function getImgs($type=1,$cid='') {
		$model = new Caseimg();
		$criteria = new CDbCriteria();
		
		if($type==1){
			$criteria->addCondition("cid=$cid and is_show=1 and display=1");
		}else{
			$criteria->addCondition("cid=$cid and is_show=1 and display=2");
		}
		
		$criteria->order = 'id ASC';
		$imgs = $model->findAll($criteria);
		
		$imgsarr=array();
		if($imgs){
			foreach ($imgs as $key => $row) {
				$imgsarr[$row['id']] = $row['img'];
			}
		}
		
		return $imgsarr;
	}
	
}
