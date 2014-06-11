<?php
/**
 * Class JobbyController
 *
 * @package jobbyDb
 * @author Dmitri Cherepovski <codernumber1@gmail.com>
 */
namespace jobbyDb;

use Jobby\Jobby;
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
        $query = [
            'enabled' => true,
            'host' => ['$in' => ['', gethostname()]],
        ];
        $tasks = JobbyModel::findAll($query);
        /** @var JobbyModel[] $tasks */
        foreach ($tasks as $task) {
            $jobby->add($task->getPrimaryKey(), [
                'command'  => $task->command,
                'schedule' => $task->schedule,
                'output'   => $task->output ? $task->output : null,
                'enabled'  => $task->enabled,
                // Debug mode
                'debug'  => false,
            ]);
        }
        $jobby->run();
        echo count($tasks) . ' jobby tasks found' . PHP_EOL;
    }
}