<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        $model = new Tb04;
        $dataProvider = new CActiveDataProvider('Tb04');
        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function actionSearching() {
        $model = new Tb04('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_POST['Tb04']))
            $model->attributes = $_POST['Tb04'];

        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function actionReport() {
        $model = new Tb04;
        $this->render('report', array(
            'model' => $model,
        ));
    }

    public function actionRepAll() {
        if (isset($_POST['start_date'])):
            $sdate = SiteController::ConDate2DB($_POST['start_date']);
            $edate = SiteController::ConDate2DB($_POST['end_date']);
        endif;

        $criteria = new CDbCriteria();
        $criteria->addBetweenCondition('o_date', $sdate, $edate);
        if (isset($_POST['Posi'])):
            $res = 'posi';
            $criteria->condition('afb_res like "pos%"');
            $sql.= ' AND afb_res like "POS%"';
        else:
            $res = 'false';
            $countpos = '';
        endif;


        $count = Yii::app()->db->createCommand('SELECT count(*) FROM tb_04 WHERE tb_04.o_date BETWEEN "' . $sdate . '" AND "' . $edate . '" ')->queryScalar();
        $countper = Yii::app()->db->createCommand('SELECT COUNT(distinct(hn)) FROM tb_04 WHERE tb_04.o_date BETWEEN "' . $sdate . '" AND "' . $edate . '" ')->queryScalar();
        $countpos = Yii::app()->db->createCommand('SELECT COUNT(distinct(hn)) 
            FROM tb_04 
            WHERE tb_04.o_date BETWEEN "' . $sdate . '" AND "' . $edate . '" '
                        . ' AND afb_res like "POSITIVE%"')->queryScalar();
        $countposnew = Yii::app()->db->createCommand('SELECT COUNT(distinct(hn)) 
            FROM tb_04 
            WHERE tb_04.o_date BETWEEN "' . $sdate . '" AND "' . $edate . '" '
                        . ' AND n_o = "N" AND afb_res like "POSITIVE%"')->queryScalar();
        $countposold = Yii::app()->db->createCommand('SELECT COUNT(distinct(hn)) 
            FROM tb_04 
            WHERE tb_04.o_date BETWEEN "' . $sdate . '" AND "' . $edate . '" '
                        . ' AND n_o = "O" AND afb_res like "POSITIVE%"')->queryScalar();
        $cpos = Yii::app()->db->createCommand('SELECT COUNT(*) 
            FROM tb_04 
            WHERE tb_04.o_date BETWEEN "' . $sdate . '" AND "' . $edate . '" '
                        . ' AND afb_res like "POSITIVE%"')->queryScalar();
        $dataProvider = new CActiveDataProvider('Tb04', array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 10000,
            ),
        ));
        $model = new Tb04;
        $this->render('report', array(
            'model' => $model,
            'res' => $res,
            'dataProvider' => $dataProvider,
            'countpos' => $countpos,
            'countposnew' => $countposnew,
            'countposold' => $countposold,
            'countper' => $countper,
            'count' => $count,
            'sdate' => $sdate,
            'edate' => $edate,
            'cpos' => $cpos,
        ));
    }

    public function ConDate2DB($datestr) {
        $tt = explode('-', $datestr);
        $ret = $tt[2] . '-' . $tt[1] . '-' . $tt[0];
        return $ret;
    }

    public function substr1($str) {
        $ret = substr($str, 4);
        $ret = ltrim($ret, 0);
        return $ret;
    }

    public function DateThai($strDate) {
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strMonthCut = Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }

    public function sexCon($sex) {
        if ($sex == 1) {
            return "ชาย";
        } else {
            return "หญิง";
        }
    }

    public function newCon($new) {
        if ($new == 'N') {
            return "ใหม่";
        } else {
            return "เก่า";
        }
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}