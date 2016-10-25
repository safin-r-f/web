<?php

namespace app\models;

use Yii;
use yii\base\Model; // foto
use yii\web\UploadedFile; // foto
use yii\imagine\Image;

class Images extends \yii\db\ActiveRecord
{
    public $image;
}