<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%curso}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m220912_020441_create_curso_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%curso}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(60)->notNull(),
            'duracao' => $this->string(10)->notNull(),
            'numero_vagas' => $this->integer()->notNull(),
            'regime' => $this->string(55)->notNull(),
            'descricao' => $this->string(255),
            'plano_curso' => $this->string(255),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-curso-created_by}}',
            '{{%curso}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-curso-created_by}}',
            '{{%curso}}',
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
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-curso-created_by}}',
            '{{%curso}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-curso-created_by}}',
            '{{%curso}}'
        );

        $this->dropTable('{{%curso}}');
    }
}
