<?php
/**
 * Class JobbyController
 *
 * @package jobbyDb
 * @author Dmitri Cherepovski <codernumber1@gmail.com>
 */
namespace jobbyDb\controller;

use Jobby\Jobby;
use jobbyDb\model\JobbyModelInterface;
use yii\console\Controller;

/**
 * Jobby scheduler controller
 *
 * @package jobbyDb
 * @author Dmitri Cherepovski <codernumber1@gmail.com>
 */
class JobbyController extends Controller
{
    public $defaultAction = 'run';

    /**
     * Jobby scheduler entry point
     */
    public function actionRun()
    {
        $jobby = new Jobby();

        $modelClass = $this->module->modelClass;
        /** @var JobbyModelInterface $modelClass */
        $tasks = $modelClass::findAllToRun();
        foreach ($tasks as $task) {
            $output = $task->getJobbyOutput();
            $jobby->add($task->getPrimaryKey(), [
                'command'  => $task->getJobbyCommand(),
                'schedule' => $task->getJobbySchedule(),
                'output'   => $output ? $output : null,
                'enabled'  => $task->getJobbyEnabled(),
                // Debug mode
                'debug'  => false,
            ]);
        }
        $jobby->run();
        echo count($tasks) . ' jobby tasks found' . PHP_EOL;
    }
}