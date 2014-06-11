<?php
/**
 * Class JobbyModule
 *
 * @package jobbyDb
 * @author Dmitri Cherepovski <codernumber1@gmail.com>
 */
namespace jobbyDb;

use jobbyDb\model\MongoDbModel;
use yii\base\Module;

/**
 * Package module class
 *
 * @package jobbyDb
 * @author Dmitri Cherepovski <codernumber1@gmail.com>
 */
class JobbyModule extends Module
{
    const MODEL_INTERFACE = '\jobbyDb\model\JobbyModelInterface';

    public $controllerNamespace = '\jobbyDb\controller';
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
                echo "Jobby task model class given in \"{$this->id}\" must implement {$interface}!\n";
                \Yii::$app->end(1);
            }
        } else {
            $this->modelClass = MongoDbModel::className();
        }
    }
}