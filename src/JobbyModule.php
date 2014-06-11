<?php
/**
 * Class JobbyModule
 *
 * @package jobbyDb
 * @author Dmitri Cherepovski <codernumber1@gmail.com>
 */
namespace jobbyDb;

use yii\base\Module;

/**
 * Package module class
 *
 * @package jobbyDb
 * @author Dmitri Cherepovski <codernumber1@gmail.com>
 */
class JobbyModule extends Module
{
    public $controllerNamespace = '';
    public $defaultRoute = 'jobby';
    public $modelClass;

    public function init()
    {
        parent::init();
        $this->modelClass = JobbyModel::className();
    }
}