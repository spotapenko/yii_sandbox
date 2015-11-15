<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Books');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Book'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
      'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
      'columns' => [

        'id',
        'name',
        'preview:image',
        'author.firstname',
/*        [
          'attribute' => 'author_id',
          'label' => 'author',
          'value' => function($model) { return $model->author->firstname  . " " . $model->author->lastname ;},
        ],*/
        [
          'attribute' => 'date',
          'format' => ['date', 'php:Y'],
        ],
//        'date_create',
//        'date_update',
        ['class' => 'yii\grid\ActionColumn'],
      ],
    ]); ?>

</div>
