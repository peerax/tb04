<div class="form">
    <?php
    $this->renderPartial('_searchRep', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->
<?php
if (isset($res)):
    echo 'ผลการตรวจระหว่างวันที่  '.Yii::app()->controller->DateThai($sdate).'  ถึงวันที่  ' . Yii::app()->controller->DateThai($edate);
    echo '<br>จำนวนรายที่ตรวจ ' . $countper .' ราย ('.$count.' ครั้ง)';
    echo '<br>จำนวนรายที่Positive ' . $countpos.' ราย ('.$cpos.' ครั้ง)';
    echo '<br>จำนวนPositive รายใหม่ ' . $countposnew.' ราย';
    echo '<br>จำนวนPositive รายเก่า' . $countposold.' ราย';
    $this->widget('zii.widgets.grid.CGridView', array(
        'dataProvider' => $dataProvider,
        'id' => 's-grid',
        'pager' => array(
            'nextPageLabel' => 'หน้าถัดไป',
            'prevPageLabel' => 'หน้าก่อนหน้า',
            'firstPageLabel' => 'หน้าแรก',
            'lastPageLabel' => 'หน้าสุดท้าย',
            'header' => 'เลือกหน้า',
            'maxButtonCount' => 30,
        ),
        'columns' => array(
            'hn',
            'name',
            'age',
            array('name' => 'sex',
                'value' => 'CHtml::encode(Yii::app()->controller->sexCon($data["sex"]))',
            ),
            array('name' => 'o_date',
                'value' => 'CHtml::encode(Yii::app()->controller->DateThai($data["o_date"]))',
            ),
            array('name' => 'tb_04_id',
                'value' => 'CHtml::encode(Yii::app()->controller->substr1($data["tb_04_id"]))."/".$data["round"]',
            ),
            'afb_res',
            'epi_res',
            'wbc_res',
            array('name' => 'n_o',
                'value' => 'CHtml::encode(Yii::app()->controller->newCon($data["n_o"]))',
            ),
            'sp_type',
            'col_type',
        ),
    ));
endif;
?>
