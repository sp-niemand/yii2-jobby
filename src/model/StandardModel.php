<?php
/**
 * Class StandardModel
 *
 * @package jobbyDb\model
 * @author Dmitri Cherepovski <dmitrij.cherepovskij@murka.com>
 */
namespace jobbyDb\model;

use jobbyDb\exception\WrongSchemaException;
use yii\db\ActiveRecord;

/**
 * Inherits standard Yii2 ActiveRecord to persist Jobby tasks
 *
 * @package jobbyDb\model
 * @author Dmitri Cherepovski <dmitrij.cherepovskij@murka.com>
 */
class StandardModel extends ActiveRecord implements JobbyModelInterface
{
    protected static $columnsRequired = ['command', 'schedule', 'output', 'enabled', 'host'];

    /**
     * @throws \jobbyDb\exception\WrongSchemaException If not all required columns are present in the table
     */
    public function init()
    {
        parent::init();

        // check if all the column names needed are present
        $schema = parent::getTableSchema();
        $columnsPresent = $schema->getColumnNames();
        foreach (static::$columnsRequired as $required) {
            if (! in_array($required, $columnsPresent)) {
                throw new WrongSchemaException("No {$required} column found in '{$this->getTableSchema()}''");
            }
        }
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jobby';
    }

    /**
     * Returns "command" for Jobby
     *
     * @return string
     */
    public function getJobbyCommand()
    {
        return (string) $this->command;
    }

    /**
     * Returns "schedule" for Jobby
     *
     * @return string
     */
    public function getJobbySchedule()
    {
        return (string) $this->schedule;
    }

    /**
     * Returns "output" for Jobby
     *
     * @return mixed
     */
    public function getJobbyOutput()
    {
        return (string) $this->output;
    }

    /**
     * Returns "enabled" flag for Jobby
     *
     * @return boolean
     */
    public function getJobbyEnabled()
    {
        return (bool) $this->enabled;
    }
}