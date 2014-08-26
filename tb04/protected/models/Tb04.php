<?php

/**
 * This is the model class for table "tb_04".
 *
 * The followings are the available columns in table 'tb_04':
 * @property integer $id
 * @property integer $l_o_n
 * @property string $hn
 * @property string $name
 * @property integer $age
 * @property integer $sex
 * @property string $tb_04_id
 * @property integer $round
 * @property string $afb_res
 * @property string $epi_res
 * @property string $wbc_res
 * @property string $n_o
 * @property string $o_date
 * @property string $sp_type
 * @property string $col_type
 */
class Tb04 extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Tb04 the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tb_04';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('l_o_n, age, sex, round', 'numerical', 'integerOnly'=>true),
			array('hn', 'length', 'max'=>9),
			array('name', 'length', 'max'=>150),
			array('tb_04_id', 'length', 'max'=>10),
			array('afb_res', 'length', 'max'=>25),
			array('epi_res, wbc_res', 'length', 'max'=>3),
			array('n_o', 'length', 'max'=>1),
			array('sp_type', 'length', 'max'=>50),
			array('col_type', 'length', 'max'=>20),
			array('o_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, l_o_n, hn, name, age, sex, tb_04_id, round, afb_res, epi_res, wbc_res, n_o, o_date, sp_type, col_type', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'l_o_n' => 'L O N',
			'hn' => 'Hn',
			'name' => 'ชื่อ-สกุล',
			'age' => 'อายุ(ปี)',
			'sex' => 'เพศ',
			'tb_04_id' => 'เลขที่',
			'round' => 'ครั้งที่',
			'afb_res' => 'ผล',
			'epi_res' => 'Epi',
			'wbc_res' => 'WBC',
			'n_o' => 'ใหม่เก่า',
			'o_date' => 'วันที่ตรวจ',
			'sp_type' => 'ลักษณะเสมหะ',
			'col_type' => 'ชนิดการเก็บ',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		
		$criteria->compare('hn',$this->hn,true);

	$criteria->order=(' tb_04_id DESC');	return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}