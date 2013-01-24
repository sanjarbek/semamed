<?php

class RegistrationController extends Controller
{
    /**
     * @var private property containing the associated Patient model instance.
     */
    private $_patient = null;

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
            'patientContext + create index gettemplate', //check to ensure valid patient context
            'postOnly + delete', // we only allow deletion via POST request
            array(
                'application.filters.GridViewHandler' //path to GridViewHandler.php class
            )
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
		$model=new Registration;

        if (!$this->_patient->isStatusChangeable())
        {
            if(Yii::app()->request->isAjaxRequest)
            {
                echo CJSON::encode( array(
                    'status' => 'success',
                    'div' => 'You cannot make any actions with this patient',
                ));
                Yii::app()->end();
            }
            throw new CHttpException(400,'Invalid request. You cannot to make any actions with this patient.');
        }

        $model->reg_patient = $this->_patient->patient_id;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Registration']))
		{
			$model->attributes=$_POST['Registration'];
			if($model->save())
            {
                if( Yii::app()->request->isAjaxRequest )
                {
                    echo CJSON::encode( array(
                        'status' => 'success',
                        'div' => 'Registration successfully updated',
                    ));
                    Yii::app()->end();
                }
                else
                {
                    $this->redirect(array('view','id'=>$model->reg_id));
                }
            }
		}

        if( Yii::app()->request->isAjaxRequest )
        {
            // To prevent js files conflict on client side.
            Yii::app()->clientscript->scriptMap['jquery.js'] = false;
            Yii::app()->clientscript->scriptMap['bootstrap.js'] = false;
            Yii::app()->clientscript->scriptMap['bootstrap.bootbox.min.js'] = false;
            Yii::app()->clientscript->scriptMap['redactor.min.js'] = true;

            echo CJSON::encode( array(
                'status' => 'failure',
                'div' => $this->renderPartial( '_form', array(
                    'model' => $model), true, true ),
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

		if(isset($_POST['Registration']))
		{
			$model->attributes=$_POST['Registration'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->reg_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
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
			$model = $this->loadModel($id);

            if($model->regPatient->isStatusChangeable())
            {
                $model->delete();
            }

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

    /**
     * Manages all models of specified patient model.
     */
    public function actionIndex()
    {
        $model=new Registration('search');

        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Registration']))
            $model->attributes=$_GET['Registration'];

        $model->reg_patient = $this->_patient->patient_id;

        $this->render('index',array(
            'model'=>$model, 'patient'=>$this->_patient
        ), false, true);
    }


	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Registration('search');

		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Registration']))
			$model->attributes=$_GET['Registration'];

        $this->render('admin',array(
			'model'=>$model
		));
	}

    /**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Registration::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='registration-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function _getGridViewRegistrationGrid()
	{     
        $model=new Registration('search');

		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Registration']))
			$model->attributes=$_GET['Registration'];

        $model->reg_patient = $this->_patient->patient_id;

//        Yii::app()->clientScript->scriptMap['jquery.ba-bbq.js'] = false;

        $this->renderPartial('_gridview',array(
			'model'=>$model, 'patient'=>$this->_patient
		));
    }

    public function _getGridViewAdminRegistrationGrid()
	{
        $model=new Registration('search');

		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Registration']))
			$model->attributes=$_GET['Registration'];

        $this->renderPartial('_admingridview',array(
			'model'=>$model
		));
    }

    /**
     * In-class defined filter method, configured for use in the above filters() method
     * It is called before the actionCreate() action method is run in order to ensure a proper project context
     */

    public function filterPatientContext($filterChain)
    {
        //set the project identifier based on either the GET or POST input
        //request variables, since we allow both types for our actions

        $patientId = null;
        if(isset($_GET['pid']))
            $patientId = $_GET['pid'];
        else if (isset($_POST['pid']))
            $patientId = $_POST['pid'];

        $this->loadPatient($patientId);

        // complete the running of other filters and execute the requested action
        $filterChain->run();
    }

    /**
    * Protected method to load the associated Project model class
    * @project_id the primary identifier of the associated Project
    * @return object the Project data model based on the primary key
    */
    protected function loadPatient($patient_id)
    {
        //if the project property is null, create it based on input id
        if($this->_patient===null)
        {
            $this->_patient=Patient::model()->findbyPk($patient_id);
            if($this->_patient===null)
            {
                throw new CHttpException(404,'The requested patient does not exist.');
            }
        }
        return $this->_patient;
    }

    public function actionRelation()
    {
// partially rendering "_relational" view
        $id = Yii::app()->getRequest()->getParam('id');
        $this->renderPartial('_relation', array(
            'id' => $id,
            'gridDataProvider' => Registration::model()->getGridDataProvider($id),
            'gridColumns' => $this->getGridColumns(),
        ), false, true);
    }

    public function getGridColumns()
    {
        $gridColumns = array(
            //this for the auto page number of cgridview
            array(
                'name'=>'No',
                'type'=>'raw',
                'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                'filter'=>false,
                'sortable'=>false,
            ),
            array(
                'name'=>'reg_id',
                'value'=>'$data->reg_id',
                'filter'=>false,
                'sortable'=>false,
            ),
//            array(
//                'name'=>'reg_patient',
//                'value'=>'CHtml::encode($data->regPatient->patient_fullname)',
//                'filter'=>false,
//            ),
            array(
                'name'=>'reg_mrtscan',
                'value'=>'CHtml::encode($data->regMrtscan->mrtscan_name)',
                'filter'=>false,
                'sortable'=>false,
            ),
            array(
                'name'=>'reg_price',
                'value'=>'$data->reg_price',
                'filter'=>false,
                'sortable'=>false,
            ),
            array(
                'name'=>'reg_discont',
                'value'=>'$data->reg_discont',
                'filter'=>false,
                'sortable'=>false,
            ),
            array(
                'name'=>'reg_total_price',
                'value'=>'$data->reg_total_price',
                'filter'=>false,
                'sortable'=>false,
            ),

        );

        return $gridColumns;
    }

    public function actionReport()
    {
        Yii::import('ext.phpexcel.Classes.*');

        $model=new Registration();
        $model->unsetAttributes();  // clear any default values

//        if(isset($_GET['Patient']))
//            $model->attributes=$_GET['Patient'];

        $this->widget('ext.EExcelView', array(
            'dataProvider'=> $model->report(), //new CActiveDataProvider(NetClientType),
            'grid_mode'=>'export',
            'exportType'=> 'Excel2007',
            'columns'=> array(
                array(
                    'name'=>'patient',
                    'value'=>'CHtml::encode($data->regPatient->patient_fullname . " " . $data->regPatient->patient_birthday)',
                ),
                array(
                    'name'=>'patient_phone',
                    'value'=>'CHtml::encode($data->regPatient->patient_phone)',
                ),
//
                array(
                    'name'=>'patient_doctor',
                    'value'=>'CHtml::encode($data->regPatient->patientDoctor->doctor_fullname . " "
                                . $data->regPatient->patientDoctor->doctorHospital->hospital_name)',
                ),
                array(
                    'name'=>'hospital_phone',
                    'value'=>'CHtml::encode($data->regPatient->patientDoctor->doctorHospital->hospital_phone)',
                ),
                array(
                    'name'=>'mrtscan_name',
                    'value'=>'CHtml::encode($data->regMrtscan->mrtscan_name)',
                ),
//                'created_at',
            ),
        ));
        Yii::app()->end();
    }

    public function actionDoctorReport()
    {
        $model=new Registration();
        $model->unsetAttributes();  // clear any default values

//        if(isset($_GET['Patient']))
//            $model->attributes=$_GET['Patient'];

        $data = $model->getDoctorReport();
        $this->widget('ext.EExcelView', array(
            'dataProvider'=> $data, //new CActiveDataProvider(NetClientType),
            'grid_mode'=>'export',
            'exportType'=> 'Excel2007',
            'columns'=> array(
                array(
                    'name'=>'doctor',
                    'value'=>'$data["doctor_fullname"]',
                ),
                array(
                    'name'=>'doctor_phone',
                    'value'=>'$data["doctor_phone"]',
                ),
                array(
                    'name'=>'date',
                    'value'=>'$data["created_at"]',
                ),
                array(
                    'name'=>'quantity',
                    'value'=>'$data["quantity"]',
                ),
                array(
                    'name'=>'price',
                    'value'=>'$data["price"]',
                ),
            ),
        ));
        Yii::app()->end();
    }

    public function actionExcelTemplate()
    {
//        $model=$this->loadModel($id);

        // Turn off our amazing library autoload
        spl_autoload_unregister(array('YiiBase','autoload'));

        // get a reference to the path of PHPExcel classes
        $phpExcelPath = Yii::getPathOfAlias('ext.phpexcel.Classes');


        // making use of our reference, include the main class
        // when we do this, phpExcel has its own autoload registration
        // procedure (PHPExcel_Autoloader::Register();)
        include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');

        spl_autoload_register(array('YiiBase', 'autoload'));

//        PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);

        $objPHPExcel = new PHPExcel();
        // Set properties
        $objPHPExcel->getProperties()->setCreator("Semamed")
            ->setLastModifiedBy("Semamed")
            ->setTitle("PDF Test Document")
            ->setSubject("PDF Test Document")
            ->setDescription("Test document for PDF, generated using PHP classes.")
            ->setKeywords("pdf php")
            ->setCategory("Test result file");


        // Add some data
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Hello')
            ->setCellValue('B2', 'world!')
            ->setCellValue('C1', 'Hello')
            ->setCellValue('D2', 'world!');

        // Miscellaneous glyphs, UTF-8
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A4', 'Miscellaneous glyphs')
            ->setCellValue('A5', 'kdkdk');

        // Rename sheet
        $objPHPExcel->getActiveSheet()->setTitle('Simple');

        // Set active sheet index to the first sheet,
        // so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        ob_end_clean();
        ob_start();

        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="01simple.xls"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        Yii::app()->end();
    }

    public function actionGetTemplate()
    {
        // Turn off our amazing library autoload
        spl_autoload_unregister(array('YiiBase','autoload'));

        // get a reference to the path of PHPExcel classes
        $phpExcelPath = Yii::getPathOfAlias('ext.phpexcel.Classes');


        // making use of our reference, include the main class
        // when we do this, phpExcel has its own autoload registration
        // procedure (PHPExcel_Autoloader::Register();)
        include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');

        spl_autoload_register(array('YiiBase', 'autoload'));

        $fileType = 'Excel2007';
        $readFileName = 'conclusion_template.xlsx';
        $writeFileName = $this->_patient->patient_fullname .'_('. Date('d.m.Y') .').xlsx';


        // Read the file
        $objReader = PHPExcel_IOFactory::createReader($fileType);
//        $objPHPExcel = $objReader->load(Yii::app()->basePath.'/data/excel_templates/test_xlsx1.xlsx');
//        $objPHPExcel = $objReader->load(Yii::app()->basePath.'/data/excel_templates/conclusion_template.xlsx');
        $objPHPExcel = $objReader->load(Yii::app()->basePath.'/data/excel_templates/'. $readFileName);


//        $objPHPExcel = new PHPExcel();

        // Set properties
        $objPHPExcel->getProperties()->setCreator("Semamed")
            ->setLastModifiedBy("Semamed")
            ->setTitle("Semamed MRT conclution report")
            ->setSubject("Report")
            ->setDescription("Test document for PDF, generated using PHP classes.")
            ->setKeywords("pdf php")
            ->setCategory("Test result file");


        // Add some data
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('D5', Date('d.m.Y'))
            ->setCellValue('I5', Date('d.m.Y'))
            ->setCellValue('D6', $this->_patient->patient_fullname)
            ->setCellValue('D7', $this->_patient->patient_birthday)
            ->setCellValue('J7', Yii::t('value', $this->_patient->patient_sex))
            ->setCellValue('D8', $this->_patient->patientDoctor->doctor_fullname);

//         Miscellaneous glyphs, UTF-8
//        $objPHPExcel->setActiveSheetIndex(0)
//            ->setCellValue('A20', 'Miscellaneous glyphs')
//            ->setCellValue('A25', 'Өнүктүрөйлү деп жатабыз @ Hello World');

        // Rename sheet
//        $objPHPExcel->getActiveSheet()->setTitle('Simple');

        // Set active sheet index to the first sheet,
        // so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);

        ob_end_clean();
        ob_start();

        // Redirect output to a client’s web browser (Excel2007)
        header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
//        header("Content-type: application/vnd.ms-excel");
        header('Content-Disposition: attachment;filename="'. $writeFileName .'"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
//        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        Yii::app()->end();
    }

}
