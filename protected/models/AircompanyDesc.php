<?php

/**
 * This is the model class for table "g_dictionary.g_aircompanydescrw".
 *
 * The followings are the available columns in table 'g_dictionary.g_aircompanydescrw':
 * @property integer $cid
 * @property integer $aircompanyid
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $content
 * @property string $image
 * @property integer $status
 */
class AircompanyDesc extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'g_dictionary.g_aircompanydescrw';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('aircompanyid, title, slug, description, content, status', 'required'),
			array('aircompanyid, status', 'numerical', 'integerOnly'=>true),

            // image must be uploaded, allowed file types jpg,gif,png
            array('image', 'file', 'types'=>'jpg, gif, png'),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('cid, aircompanyid, title, slug, description, content, image, status', 'safe', 'on'=>'search'),
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
			'cid' => 'Cid',
			'aircompanyid' => 'ID Companie aeriana',
			'title' => 'Titlul descrierii',
			'slug' => 'Url descriere',
			'description' => 'Descriere scurta',
			'content' => 'Continut',
			'image' => 'Imagine',
			'status' => 'Status',
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

		$criteria->compare('cid',$this->cid);
		$criteria->compare('aircompanyid',$this->aircompanyid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AircompanyDesc the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
