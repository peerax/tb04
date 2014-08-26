<?php $this->pageTitle = Yii::app()->name;
?>
<iframe src = "http://192.168.1.4/tb_04/index.php" height="-1"></iframe>
<div class="search-form">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<div id="req_result"></div>
</div>

</div><!-- form -->
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $model->search(),
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
            'value' => 'CHtml::encode(sexCon($data->sex))',
        ),
        array('name' => 'o_date',
            'value' => 'CHtml::encode(DateThai($data->o_date))',
        ),
        array('name' => 'tb_04_id',
            'value' => 'CHtml::encode(substr1($data->tb_04_id))."/".$data->round',
        ),
        'afb_res',
        'epi_res',
        'wbc_res',
        array('name' => 'n_o',
            'value' => 'CHtml::encode(newCon($data->n_o))',
        ),
        'sp_type',
        'col_type',
    ),
));
     function substr1($str) {
        $ret = substr($str, 4);
        $ret = ltrim($ret, 0);
        return $ret;
    }

     function DateThai($strDate) {
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strMonthCut = Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }

     function sexCon($sex) {
        if ($sex == 1) {
            return "ชาย";
        } else {
            return "หญิง";
        }
    }

     function newCon($new) {
        if ($new == 'N') {
            return "ใหม่";
        } else {
            return "เก่า";
        }
    }
?>

