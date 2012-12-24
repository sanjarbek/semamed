<?php

class PatientController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
        return CMap::mergeArray(parent::filters(),array(
//			'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
            array( // handle gridview ajax update
               'application.filters.GridViewHandler', //path to GridViewHandler.php class
            ),
        ));

	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Patient;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Patient']))
		{
			$model->attributes=$_POST['Patient'];

//            $model->patient_birthday = $this->toMysqlDate($_POST['Patient']['birthday']);

			if($model->save())
            {
                if (Yii::app()->request->isAjaxRequest)
                {
                    echo CJSON::encode(array(
                        'status'=>'success',
                        'div'=>Yii::t('text','Patient successfully added'),
                    ));
                    Yii::app()->end();
                }
                else
                {
                    $this->redirect(array('view','id'=>$model->patient_id));
                }
            }
		}
        if (Yii::app()->request->isAjaxRequest)
        {
            // To prevent js files conflict on client side.
            Yii::app()->clientscript->scriptMap['jquery.js'] = false;
            Yii::app()->clientscript->scriptMap['bootstrap.js'] = false;
            Yii::app()->clientscript->scriptMap['jquery.min.js'] = false;
            Yii::app()->clientscript->scriptMap['bootstrap.min.js'] = false;
            Yii::app()->clientscript->scriptMap['bootstrap.bootbox.min.js'] = false;
//            Yii::app()->clientscript->scriptMap['bootstrap.datepicker.js'] = true;

            echo CJSON::encode(array(
                'status'=>'failure',
                'div'=>$this->renderPartial('_form', array('model'=>$model), true, true)
            ));
            Yii::app()->end();
        }
        else
        {
            $this->render('create',array(
                'model'=>$model,
            ));
        }

	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Patient']))
		{
			$model->attributes=$_POST['Patient'];

//            $model->patient_birthday = $this->toMysqlDate($_POST['Patient']['patient_birthday']);

			if($model->save())
            {
                if( Yii::app()->request->isAjaxRequest )
                {
                    echo CJSON::encode( array(
                        'status' => 'success',
                        'content' => 'Patient successfully updated',
                    ));
                    Yii::app()->end();
                }
                else
                {
                    $this->redirect( array( 'view', 'id' => $model->patient_id ) );
                }
            }
		}

        if( Yii::app()->request->isAjaxRequest )
        {
            // To prevent js files conflict on client side.
            Yii::app()->clientscript->scriptMap['jquery.js'] = false;
            Yii::app()->clientscript->scriptMap['jquery.min.js'] = false;
            Yii::app()->clientscript->scriptMap['bootstrap.js'] = false;
            Yii::app()->clientscript->scriptMap['bootstrap.bootbox.min.js'] = false;

            echo CJSON::encode( array(
                'status' => 'failure',
                'content' => $this->renderPartial( '_form', array(
                    'model' => $model ), true, true ),
            ));
            Yii::app()->end();
        }
        else
        {
            $this->render( 'update', array( 'model' => $model ) );
        }
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Patient');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Patient('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Patient']))
			$model->attributes=$_GET['Patient'];

        $this->render('admin',array(
            'model'=>$model,
        ));
	}

    /**
     * Manages all models.
     */
    public function actionManage()
    {
        $model=new Patient('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Patient']))
            $model->attributes=$_GET['Patient'];

        $this->render('manage',array(
            'model'=>$model,
        ));
    }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Patient::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='patient-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    /**
     * Returns valid mysql date value
     * @param date the birthday of the model to be loaded
     */
    protected function toMysqlDate($date)
    {
        $birthday = explode('.', $date);
        return $birthday[2].'-'.$birthday[0].'-'.$birthday[1];
    }

    /**
     * Ajax request:
     * Returns nothing in success case,if not, return error message
     * @param integer the
     */
    public function actionEditable()
    {
        $r = Yii::app()->getRequest();

        // needed to check model attribute name. !!!
        $id=$r->getParam('pk');
        $name = $r->getParam('name');
        $value = $r->getParam('value');

        $model=Patient::model()->findByPk($id);

        if($model!==NULL)
        {
            $model->$name = $value;
            if(!$model->save())
            {
                echo $model->getError($name);
            }
        }
        Yii::app()->end();

    }
    
    public function _getGridViewPatientGrid(){ 
        //create data provider and renderPartial CGridView widget
        $model=new Patient('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Patient']))
			$model->attributes=$_GET['Patient'];

//        Yii::app()->clientscript->scriptMap['jquery.js'] = false;
//        Yii::app()->clientscript->scriptMap['jquery.min.js'] = false;
//        Yii::app()->clientscript->scriptMap['bootstrap.js'] = false;
//        Yii::app()->clientscript->scriptMap['bootstrap.bootbox.min.js'] = false;
    
        $this->renderPartial('_gridview',array(
            'model'=>$model)
        );
    }

    public function _getGridViewManagePatientGrid(){
        //create data provider and renderPartial CGridView widget
        $model=new Patient('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Patient']))
            $model->attributes=$_GET['Patient'];

        $this->renderPartial('_manage_gridview',array(
            'model'=>$model, true, false
        ));
    }

    public function actionReport()
    {
        $model=new Patient();
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Patient']))
            $model->attributes=$_GET['Patient'];

        $this->widget('ext.EExcelView', array(
            'dataProvider'=> $model->report(), //new CActiveDataProvider(NetClientType),
            'grid_mode'=>'export',
            'exportType'=> 'Excel2007',
            'columns'=> array(
                array(
                    'name'=>'patient',
                    'value'=>'CHtml::encode($data->patient_fullname . " " . $data->patient_birthday)',
                ),
//                'patient_fullname',
                'patient_phone',
//                'patient_birthday',
                array(
                    'name'=>'patient_doctor',
                    'value'=>'CHtml::encode($data->patientDoctor->doctor_fullname . " "
                                . $data->patientDoctor->doctorHospital->hospital_name)',
                ),
                array(
                    'name'=>'hospital_phone',
                    'value'=>'CHtml::encode($data->patientDoctor->doctorHospital->hospital_phone)',
                ),
//                'created_at',
            ),
        ));
        Yii::app()->end();
    }

    public function actionManagerView()
    {
        $model=new Patient('search');

        $model->unsetAttributes();  // clear any default values

        if(isset($_GET['Patient']))
            $model->attributes=$_GET['Patient'];

//        $this->render('manager_view',array(
//            'model'=>$model,
//        ));
        $this->render('highchartwidget');
    }

}
