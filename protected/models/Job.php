<?php

/**
 * This is the model class for table "{{job}}".
 *
 * The followings are the available columns in table '{{job}}':
 * @property string $id
 * @property string $position
 * @property string $content
 * @property string $orderid
 * @property integer $is_show
 * @property string $create_uid
 * @property string $create_time
 * @property string $update_time
 */
class Job extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{job}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('position, content, create_uid, create_time', 'required'),
			array('is_show', 'numerical', 'integerOnly'=>true),
			array('position', 'length', 'max'=>50),
			array('orderid, create_uid', 'length', 'max'=>10),
			array('update_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, position, content, orderid, is_show, create_uid, create_time, update_time', 'safe', 'on'=>'search'),
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
			'position' => '职位',
			'content' => '内容',
			'orderid' => '排序',
			'is_show' => '是否显示',
			'create_uid' => '创建者',
			'create_time' => '创建者',
			'update_time' => '更新时间',
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
		$criteria->compare('position',$this->position,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('orderid',$this->orderid,true);
		$criteria->compare('is_show',$this->is_show);
		$criteria->compare('create_uid',$this->create_uid,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Job the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
