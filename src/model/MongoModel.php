<?php
/**
 * Class Model
 *
 * @package jobbyDb
 * @author Dmitri Cherepovski <codernumber1@gmail.com>
 */
namespace jobbyDb\model;

use yii\mongodb\ActiveRecord;

/**
 * Jobby task model for MongoDb
 *
 * @package jobbyDb
 * @author Dmitri Cherepovski <codernumber1@gmail.com>
 *
 * @property string $_id
 * @property bool $enabled
 * @property string $host
 * @property string $description
 * @property string $schedule
 * @property string $command
 * @property string $output
 */
class MongoModel extends ActiveRecord implements JobbyModelInterface
{
    public static function collectionName()
    {
        return 'jobby';
    }

    public function attributes()
    {
        return [
            '_id',
            'enabled',
            'host',
            'description',
            'schedule',
            'command',
            'output',
        ];
    }

    public function getJobbyCommand()
    {
        return (string) $this->command;
    }

    public function getJobbySchedule()
    {
        return (string) $this->schedule;
    }

    public function getJobbyOutput()
    {
        return (string) $this->output;
    }

    public function getJobbyEnabled()
    {
        return (bool) $this->enabled;
    }
}