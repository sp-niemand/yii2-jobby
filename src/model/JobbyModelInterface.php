<?php
/**
 * Interface IJobbyModel
 *
 * @package jobbyDb\model
 * @author Dmitri Cherepovski <dmitrij.cherepovskij@murka.com>
 */

namespace jobbyDb\model;

use yii\db\ActiveRecordInterface;

/**
 * Interface for a task model stored in DB
 *
 * @package jobbyDb\model
 * @author Dmitri Cherepovski <dmitrij.cherepovskij@murka.com>
 */
interface JobbyModelInterface extends ActiveRecordInterface
{
    /**
     * Returns all the tasks to be executed
     *
     * @return JobbyModelInterface[]
     */
    public static function findAllToRun();

    /**
     * Returns "command" for Jobby
     *
     * @return string
     */
    public function getJobbyCommand();

    /**
     * Returns "schedule" for Jobby
     *
     * @return string
     */
    public function getJobbySchedule();

    /**
     * Returns "output" for Jobby
     *
     * @return mixed
     */
    public function getJobbyOutput();

    /**
     * Returns "enabled" flag for Jobby
     *
     * @return boolean
     */
    public function getJobbyEnabled();
}