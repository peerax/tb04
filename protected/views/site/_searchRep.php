<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl('Site/RepAll'),
        'method' => 'post',
    ));
    ?>

    <div class="row">วันเริ่มต้น:
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'language' => 'th',
            'name' => 'start_date',
            'id' => 'start_date',
            // additional javascript options for the date picker plugin
            'options' => array(
                'showAnim' => 'slide',
                'dateFormat' => 'd-mm-yy',
                'changeMonth' => true,
                'changeYear' => true,
                'showOptions' => array('direction' => 'horizontal')
            ),
                )
        );
        ?>
    </div>
    <div class="row">วันสิ้นสุด:
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'language' => 'th',
            'name' => 'end_date',
            'id' => 'end_date',
            // additional javascript options for the date picker plugin
            'options' => array(
                'showAnim' => 'slide',
                'dateFormat' => 'd-mm-yy',
                'changeMonth' => true,
                'changeYear' => true,
                'showOptions' => array('direction' => 'horizontal')
            ),
                )
        );
        ?>
    </div>
    <!--
    <div class="row">
        <input type="checkbox" name="Posi" value="Pos"> เฉพาะผล Positive
    </div>
-->
    <div class="row buttons">
        <?php echo CHtml::submitButton('ค้นหา'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->
