<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Dishes;
use app\models\Search;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    /**
     * Search action.
     *
     * @return Response|string
     */
    
    public function actionSearch()
{       
       $dishes = new Dishes();
        
       if ($dishes->load(Yii::$app->request->post())) {
    
       // get input array
        $string = Yii::$app->request->post();
        
       // try regexp for input data. Not to find if less than 2 ingredients selected
        $input = preg_grep("/^1{0,1}$/",$string["Dishes"]);
        $count_input = count($input);
        if ($count_input >= 4) {
            return $this->render('select_more');
            //var_dump('Please select more ingredients!');
            exit();
        }
         
        // to render the dishes with the all appropriate ingredients selected
        
        $sql_all = Search::sql_all($dishes);
             
        if($sql_all != null) {
            return $this->render('result', ['items' => $sql_all]);
        } else {
        
        // to render the dishes with 4 of 5 coincidenced ingredients
        $sql_4 = Search::sql_4($dishes);
   
        // to render the dishes with 3 of 5 coincidenced ingredients        
        $sql_3 = Search::sql_3($dishes);
            
        // to render the dishes with 2 of 5 coincidenced ingredients        
        $sql_2 = Search::sql_2($dishes);
        
        // Get union result 
        $sql_result = $sql_4->union($sql_3)->union($sql_2)->orderBy('dish')->all();    
     
            if($sql_result != null) {
              return $this->render('result', ['items' => $sql_result]);  
            } 
            else {
              return $this->render('nothing');
                //var_dump('Nothing is found!');
            }
              
        }
     
   }
    else {
        return $this->render('search', ['items' => $dishes]);
        throw new NotFoundHttpException('Input data not found' );
         }
 }

}
