<?php

/**
 * This is the model class for table "film".
 *
 * The followings are the available columns in table 'film':
 * @property integer $id
 * @property string $name
 * @property string $info
 * @property string $img_src
 * @property integer $year
 * @property string $tech_info
 * @property string $description
 * @property string $trailer
 * @property string $producer_name
 * @property string $producer_photo
 * @property string $producer_filmograf
 * @property string $producer_biograf
 *
 * The followings are the available model relations:
 * @property FilmImage[] $filmImages
 */
class Film extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'film';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('year', 'numerical', 'integerOnly'=>true),
			array('name, info, img_src, producer_name', 'length', 'max'=>255),
			array('producer_photo', 'length', 'max'=>45),
			array('tech_info, description, trailer, producer_filmograf, producer_biograf', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, info, img_src, year, tech_info, description, trailer, producer_name, producer_photo, producer_filmograf, producer_biograf', 'safe', 'on'=>'search'),
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
			'filmImages' => array(self::HAS_MANY, 'FilmImage', 'film_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'info' => 'Info',
			'img_src' => 'Img Src',
			'year' => 'Year',
			'tech_info' => 'Tech Info',
			'description' => 'Description',
			'trailer' => 'Trailer',
			'producer_name' => 'Producer Name',
			'producer_photo' => 'Producer Photo',
			'producer_filmograf' => 'Producer Filmograf',
			'producer_biograf' => 'Producer Biograf',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('info',$this->info,true);
		$criteria->compare('img_src',$this->img_src,true);
		$criteria->compare('year',$this->year);
		$criteria->compare('tech_info',$this->tech_info,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('trailer',$this->trailer,true);
		$criteria->compare('producer_name',$this->producer_name,true);
		$criteria->compare('producer_photo',$this->producer_photo,true);
		$criteria->compare('producer_filmograf',$this->producer_filmograf,true);
		$criteria->compare('producer_biograf',$this->producer_biograf,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Film the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
