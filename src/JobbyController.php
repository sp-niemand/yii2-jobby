<?php
/**
 * Class JobbyController
 *
 * @package MGC\Core\General\Jobby
 * @author Dmitri Cherepovski <dmitrij.cherepovskij@murka.com>
 */
namespace MGC\Core\General\Jobby;

use Jobby\Jobby;
use yii\console\Controller;

/**
 * Контроллер планировщика Jobby
 *
 * @package MGC\Core\General\Jobby
 * @author Dmitri Cherepovski <dmitrij.cherepovskij@murka.com>
 */
class JobbyController extends Controller
{
    public $defaultAction = 'run';

    /**
     * Запускает точку входа Jobby
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