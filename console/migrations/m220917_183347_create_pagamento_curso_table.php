<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pagamento_curso}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%pagamento}}`
 * - `{{%curso}}`
 */
class m220917_183347_create_pagamento_curso_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pagamento_curso}}', [
            'id' => $this->primaryKey(),
            'pagamento_id' => $this->integer(11)->notNull(),
            'curso_id' => $this->integer(11)->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
        ]);

        // creates index for column `pagamento_id`
        $this->createIndex(
            '{{%idx-pagamento_curso-pagamento_id}}',
            '{{%pagamento_curso}}',
            'pagamento_id'
        );

        // add foreign key for table `{{%pagamento}}`
        $this->addForeignKey(
            '{{%fk-pagamento_curso-pagamento_id}}',
            '{{%pagamento_curso}}',
            'pagamento_id',
            '{{%pagamento}}',
            'id',
            'CASCADE'
        );

        // creates index for column `curso_id`
        $this->createIndex(
            '{{%idx-pagamento_curso-curso_id}}',
            '{{%pagamento_curso}}',
            'curso_id'
        );

        // add foreign key for table `{{%curso}}`
        $this->addForeignKey(
            '{{%fk-pagamento_curso-curso_id}}',
            '{{%pagamento_curso}}',
            'curso_id',
            '{{%curso}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%pagamento}}`
        $this->dropForeignKey(
            '{{%fk-pagamento_curso-pagamento_id}}',
            '{{%pagamento_curso}}'
        );

        // drops index for column `pagamento_id`
        $this->dropIndex(
            '{{%idx-pagamento_curso-pagamento_id}}',
            '{{%pagamento_curso}}'
        );

        // drops foreign key for table `{{%curso}}`
        $this->dropForeignKey(
            '{{%fk-pagamento_curso-curso_id}}',
            '{{%pagamento_curso}}'
        );

        // drops index for column `curso_id`
        $this->dropIndex(
            '{{%idx-pagamento_curso-curso_id}}',
            '{{%pagamento_curso}}'
        );

        $this->dropTable('{{%pagamento_curso}}');
    }
}
