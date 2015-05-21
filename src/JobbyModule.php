<?php
/**
 * Class JobbyModule
 *
 * @package jobbyDb
 * @author Dmitri Cherepovski <codernumber1@gmail.com>
 */
namespace jobbyDb;

use jobbyDb\model\MongoModel;
use jobbyDb\model\StandardModel;
use yii\base\Module;

defined('jobbyDb') || \Yii::setAlias('jobbyDb', __DIR__);

/**
 * Package module class
 *
 * @package jobbyDb
 * @author Dmitri Cherepovski <codernumber1@gmail.com>
 */
class JobbyModule extends Module
{
    const EXIT_CODE_WRONG_MODEL_CLASS = 1;

    const MODEL_INTERFACE = '\jobbyDb\model\JobbyModelInterface';

    public $controllerNamespace = 'jobbyDb\controller';
    public $defaultRoute = 'jobby';

    /** @var string Class of the ActiveRecord model used to hold scheduled tasks */
    public $modelClass;

    /**
     * Sets the default values by expressions
     */
    public function init()
    {
        parent::init();
        if ($this->modelClass) {
            if (! is_subclass_of($this->modelClass, self::MODEL_INTERFACE)) {
                $interface = self::MODEL_INTERFACE;
                echo "Jobby task model class given in \"{$this->id}\" must implement {$interface}.\n";
                \Yii::$app->end(self::EXIT_CODE_WRONG_MODEL_CLASS);
            }
        } else {
            $this->modelClass = StandardModel::className();
        }
    }
}