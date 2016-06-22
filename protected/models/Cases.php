<?php

/**
 * This is the model class for table "{{cases}}".
 *
 * The followings are the available columns in table '{{cases}}':
 * @property string $id
 * @property string $name
 * @property string $video
 * @property string $tid
 * @property string $img
 * @property integer $is_rec
 * @property string $orderid
 * @property integer $is_show
 * @property string $create_uid
 * @property string $create_time
 */
class Cases extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{cases}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, img, create_uid, create_time', 'required'),
			array('is_rec, is_show, video', 'numerical', 'integerOnly'=>true),
			array('video, tid', 'safe'),
			array('name', 'length', 'max'=>50),
			array('img', 'length', 'max'=>120),
			array('tid, orderid, create_uid', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, video, tid, img, is_rec, orderid, is_show, create_uid, create_time', 'safe', 'on'=>'search'),
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
			'name' => '名称',
			'video' => '教程',
			'tid' => '模板',
			'img' => '封面图',
			'is_rec' => '是否推荐',
			'orderid' => '排序',
			'is_show' => '是否显示',
			'create_uid' => '创建者',
			'create_time' => '创建时间',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('video',$this->video,true);
		$criteria->compare('tid',$this->tid,true);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('is_rec',$this->is_rec);
		$criteria->compare('orderid',$this->orderid,true);
		$criteria->compare('is_show',$this->is_show);
		$criteria->compare('create_uid',$this->create_uid,true);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cases the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	//获取分类列表（数组）
	public static function getDropList() {
		$model = new Video();
		$criteria = new CDbCriteria();
		$criteria->addCondition("is_show=1");
		$criteria->order = 'id asc';
		$data = $model->findAll($criteria);
		
		$dropList=array();
		$dropList[0]='';
		
		if($data){
			foreach ($data as $key => $row) {
				$dropList[$row['id']] = $row['name'];
			}
		}
		
		return $dropList;
	}
}
