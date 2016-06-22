<?php

/**
 * This is the model class for table "{{video}}".
 *
 * The followings are the available columns in table '{{video}}':
 * @property string $id
 * @property integer $pid
 * @property string $img
 * @property string $video
 * @property integer $is_rec
 * @property string $orderid
 * @property integer $is_show
 * @property integer $create_uid
 * @property string $create_time
 */
class Video extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{video}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pid, img, video, create_uid, create_time, name', 'required'),
			array('pid, is_rec, is_show, create_uid', 'numerical', 'integerOnly'=>true),
			array('img, video', 'length', 'max'=>120),
			array('orderid', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pid, img, video, is_rec, orderid, is_show, create_uid, create_time, name', 'safe', 'on'=>'search'),
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
			'pid' => '分类',
			'img' => '封面图',
			'video' => '视频',
			'is_rec' => '是否推荐',
			'orderid' => '排序',
			'is_show' => '是否显示',
			'create_uid' => '创建者',
			'create_time' => '创建时间',
			'name'=>'名称',
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
		$criteria->compare('pid',$this->pid);
		$criteria->compare('img',$this->img,true);
		$criteria->compare('video',$this->video,true);
		$criteria->compare('is_rec',$this->is_rec);
		$criteria->compare('orderid',$this->orderid,true);
		$criteria->compare('is_show',$this->is_show);
		$criteria->compare('create_uid',$this->create_uid);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('name',$this->name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Video the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public static function getName ( $id='')
	{
		$condition = array ('condition' => 'id=:id' , 'params' => array ( 'id' => $id ) );
		$dataRs = Video::model()->find($condition);
		if($dataRs){
			return $dataRs['name'];
		}else{
			return '';
		}
	}
}
