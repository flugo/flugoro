<?php

/**
 * This is the model class for table "g_dictionary.g_offersrw".
 *
 * The followings are the available columns in table 'g_dictionary.g_offersrw':
 * @property integer $oid
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property integer $city_from
 * @property integer $city_to
 * @property string $date_from
 * @property string $date_to
 * @property string $price
 * @property integer $min_stay
 * @property integer $max_stay
 * @property string $content
 * @property string $image
 * @property integer $changes
 * @property integer $return
 * @property integer $status
 */
class Offers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'g_dictionary.g_offersrw';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, slug, description, city_from, city_to, date_from, date_to, price, content, changes, return, status', 'required'),
			array('city_from, city_to, min_stay, max_stay, changes, return, status', 'numerical', 'integerOnly'=>true),
			array('price', 'length', 'max'=>5),
			array('image', 'length', 'max'=>120),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('oid, title, slug, description, city_from, city_to, date_from, date_to, price, min_stay, max_stay, content, image, changes, return, status', 'safe', 'on'=>'search'),
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
			'oid' => 'ID Oferta',
			'title' => 'Titlul ofertei',
			'slug' => 'URL',
			'description' => 'Descriere scurta',
			'city_from' => 'Din orasul',
			'city_to' => 'Spre orasul',
			'date_from' => 'Data start',
			'date_to' => 'Data finis',
			'price' => 'Pret',
			'min_stay' => 'Sedere minima',
			'max_stay' => 'Sedere maxima',
			'content' => 'Continut oferta',
			'image' => 'Imagine',
			'changes' => 'Schimb bilet',
			'return' => 'Retur bilet',
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

		$criteria->compare('oid',$this->oid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('slug',$this->slug,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('city_from',$this->city_from);
		$criteria->compare('city_to',$this->city_to);
		$criteria->compare('date_from',$this->date_from,true);
		$criteria->compare('date_to',$this->date_to,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('min_stay',$this->min_stay);
		$criteria->compare('max_stay',$this->max_stay);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('changes',$this->changes);
		$criteria->compare('return',$this->return);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Offers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
