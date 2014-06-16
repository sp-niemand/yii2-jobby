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
     * Возвращает список задач для загрузки в движок Jobby
     *
     * @return JobbyModelInterface[]
     */
    private function getTasks()
    {
        $modelClass = $this->module->modelClass;
        /** @var JobbyModelInterface $modelClass */
        $query = $modelClass::find()
            ->where(['enabled' => true, 'host' => ['', gethostname()]]);
        return is_callable([$modelClass, 'getDb'])
            ? $query->all($modelClass::getDb())
            : $query->all();
    }

    /**
     * Jobby scheduler entry point
     */
    public function actionRun()
    {
        $jobby = new Jobby();
        $tasks = $this->getTasks();
        /** @var JobbyModelInterface[] $tasks */
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