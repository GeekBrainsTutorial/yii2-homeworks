<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Scheduler',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => array_merge(
                                [
                                    ['label' => 'Home', 'url' => ['/site']], //TODO: на хостинге jino убрать </index>
                                ],
                                !Yii::$app->user->isGuest ?
                                [
                                    ['label' => 'I was invited to', 'url' => ['/access/friendslist']],
                                    //['label' => 'My friends Schedules', 'url' => ['/calendar/view']],
                                    ['label' => 'Add friend & Share Schedules on Date', 'url' => ['/access/create']],
                                    [
                                        'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                                        'url' => ['/site/logout'],
                                        'linkOptions' => ['data-method' => 'post']
                                    ],
                                ]
                                :
                                [
                                    ['label' => 'Login', 'url' => ['/site/login']]
                                ],
                                [
                                    ['label' => 'About', 'url' => ['/site/about']],
                                    ['label' => 'Contact', 'url' => ['/site/contact']],
                                ]
        ),
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Scheduler <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
