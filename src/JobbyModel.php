<?php
/**
 * Class Model
 *
 * @package MGC\Core\General\Jobby
 * @author Dmitri Cherepovski <dmitrij.cherepovskij@murka.com>
 */
namespace MGC\Core\General\Jobby;

use MGC\Core\General\ActiveRecord;

/**
 * Модель задачи для планировщика
 *
 * @package MGC\Core\General\Jobby
 * @author Dmitri Cherepovski <dmitrij.cherepovskij@murka.com>
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