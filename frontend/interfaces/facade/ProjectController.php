<?php


namespace frontend\interfaces\facade;


use frontend\interfaces\dto\ProjectCreateForm;
use frontend\models\ContactForm;
use Yii;
use yii\base\BaseObject;
use yii\rest\Controller;
use frontend\interfaces\assembler\ProjectAssembler;

class ProjectController extends Controller
{
	public function actionView() {
		print_r("324");
	}

	public function actionCreate() {

		$model = new ContactForm();

		$model->load(\Yii::$app->request->post());


		//print_r(Yii::$app->request->bodyParams);


		if ( ! $model->validate()) {
			print_r("错误");
		} else {
			print_r($model);
			exit;
		}
		//$posts = Yii::$app->request->bodyParams;
		//
		//
		//$modle = new ContactForm();
		//
		//print_r($modle->load($posts));
		////print_r($modle->load($posts , 'ProjectCreateForm'));
		//
		//
		//$project = (new ProjectAssembler())->toEntity(new ProjectCreateForm());
		////print_r($project);
	}
}
