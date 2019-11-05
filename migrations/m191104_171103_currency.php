<?php

use yii\db\Migration;
use yii\db\mssql\Schema;

/**
 * Class m191104_171103_currency
 */
class m191104_171103_currency extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('currency', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'rate' => Schema::TYPE_FLOAT,
            'insert_dt' => Schema::TYPE_TIME
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('currency');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191104_171103_currency cannot be reverted.\n";

        return false;
    }
    */
}
