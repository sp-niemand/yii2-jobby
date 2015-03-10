<?php
/**
 * @author Dmitri Cherepovski <codernumber1@gmail.com>
 */

use yii\db\Schema;

class m010100_000000_create_jobby_table extends \yii\db\Migration
{
    private static $tableName = 'jobby';

    public function safeUp()
    {
        $this->createTable(static::$tableName, [
            'id' => Schema::TYPE_PK,
            'schedule' => Schema::TYPE_STRING . ' NOT NULL DEFAULT \'\'',
            'command' => Schema::TYPE_STRING . ' NOT NULL DEFAULT \'\'',
            'output' => Schema::TYPE_STRING . ' NOT NULL DEFAULT \'\'',
            'enabled' => Schema::TYPE_BOOLEAN . ' NOT NULL DEFAULT FALSE',
            'host' => Schema::TYPE_STRING . ' NOT NULL DEFAULT \'\'',
        ]);
    }

    public function safeDown()
    {
        $this->dropTable(static::$tableName);
    }
}
