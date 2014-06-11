<?php
/**
 * Class Model
 *
 * @package jobbyDb
 * @author Dmitri Cherepovski <codernumber1@gmail.com>
 */
namespace jobbyDb;

use MGC\Core\General\ActiveRecord;

/**
 * Scheduler task model
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
class JobbyModel extends ActiveRecord
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
} 