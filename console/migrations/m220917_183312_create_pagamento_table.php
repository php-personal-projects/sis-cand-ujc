<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pagamento}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%candidato}}`
 * - `{{%user}}`
 */
class m220917_183312_create_pagamento_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pagamento}}', [
            'id' => $this->primaryKey(),
            'modo_pagamento' => $this->string(255),
			'contacto' => $this->integer(9)->notNull(),
            'valor' => $this->double()->notNull(),
            'data' => $this->datetime()->notNUll(),
            'candidato_id' => $this->integer(11)->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(11),
        ]);

        // creates index for column `candidato_id`
        $this->createIndex(
            '{{%idx-pagamento-candidato_id}}',
            '{{%pagamento}}',
            'candidato_id'
        );

        // add foreign key for table `{{%candidato}}`
        $this->addForeignKey(
            '{{%fk-pagamento-candidato_id}}',
            '{{%pagamento}}',
            'candidato_id',
            '{{%candidato}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-pagamento-created_by}}',
            '{{%pagamento}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-pagamento-created_by}}',
            '{{%pagamento}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%candidato}}`
        $this->dropForeignKey(
            '{{%fk-pagamento-candidato_id}}',
            '{{%pagamento}}'
        );

        // drops index for column `candidato_id`
        $this->dropIndex(
            '{{%idx-pagamento-candidato_id}}',
            '{{%pagamento}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-pagamento-created_by}}',
            '{{%pagamento}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-pagamento-created_by}}',
            '{{%pagamento}}'
        );

        $this->dropTable('{{%pagamento}}');
    }
}
