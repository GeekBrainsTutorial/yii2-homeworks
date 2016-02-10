<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Calendar */

$this->title = Yii::t('app', 'Create Calendar Note');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Schedule'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="calendar-create">

    <h1><?= Html::encode($this->title) ?></h1></br></br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
