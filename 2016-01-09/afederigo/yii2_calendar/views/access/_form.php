<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Access */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="access-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_owner')->textInput() ?>

    <?= $form
            ->field($model, 'user_gest')
            ->dropDownList(ArrayHelper::map($all_users, 'id', 'username'))
    ?>

    <?= $form
            ->field($model, 'date')
            ->dropDownList(ArrayHelper::map($all_mynotes, 'date_event', 'date_event'))
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
