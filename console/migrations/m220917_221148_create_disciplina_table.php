<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%disciplina}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%curso}}`
 * - `{{%user}}`
 */
class m220917_221148_create_disciplina_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%disciplina}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(255),
            'preco' => $this->double()->notNull(),
            'curso_id' => $this->integer(11)->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(11),
        ]);

        // creates index for column `curso_id`
        $this->createIndex(
            '{{%idx-disciplina-curso_id}}',
            '{{%disciplina}}',
            'curso_id'
        );

        // add foreign key for table `{{%curso}}`
        $this->addForeignKey(
            '{{%fk-disciplina-curso_id}}',
            '{{%disciplina}}',
            'curso_id',
            '{{%curso}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-disciplina-created_by}}',
            '{{%disciplina}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-disciplina-created_by}}',
            '{{%disciplina}}',
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
        // drops foreign key for table `{{%curso}}`
        $this->dropForeignKey(
            '{{%fk-disciplina-curso_id}}',
            '{{%disciplina}}'
        );

        // drops index for column `curso_id`
        $this->dropIndex(
            '{{%idx-disciplina-curso_id}}',
            '{{%disciplina}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-disciplina-created_by}}',
            '{{%disciplina}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-disciplina-created_by}}',
            '{{%disciplina}}'
        );

        $this->dropTable('{{%disciplina}}');
    }
}
