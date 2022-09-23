<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%curso_disciplina}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%curso}}`
 * - `{{%disciplina}}`
 */
class m220917_221220_create_curso_disciplina_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%curso_disciplina}}', [
            'id' => $this->primaryKey(),
            'curso_id' => $this->integer(11)->notNull(),
            'disciplina_id' => $this->integer(11)->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
        ]);

        // creates index for column `curso_id`
        $this->createIndex(
            '{{%idx-curso_disciplina-curso_id}}',
            '{{%curso_disciplina}}',
            'curso_id'
        );

        // add foreign key for table `{{%curso}}`
        $this->addForeignKey(
            '{{%fk-curso_disciplina-curso_id}}',
            '{{%curso_disciplina}}',
            'curso_id',
            '{{%curso}}',
            'id',
            'CASCADE'
        );

        // creates index for column `disciplina_id`
        $this->createIndex(
            '{{%idx-curso_disciplina-disciplina_id}}',
            '{{%curso_disciplina}}',
            'disciplina_id'
        );

        // add foreign key for table `{{%disciplina}}`
        $this->addForeignKey(
            '{{%fk-curso_disciplina-disciplina_id}}',
            '{{%curso_disciplina}}',
            'disciplina_id',
            '{{%disciplina}}',
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
            '{{%fk-curso_disciplina-curso_id}}',
            '{{%curso_disciplina}}'
        );

        // drops index for column `curso_id`
        $this->dropIndex(
            '{{%idx-curso_disciplina-curso_id}}',
            '{{%curso_disciplina}}'
        );

        // drops foreign key for table `{{%disciplina}}`
        $this->dropForeignKey(
            '{{%fk-curso_disciplina-disciplina_id}}',
            '{{%curso_disciplina}}'
        );

        // drops index for column `disciplina_id`
        $this->dropIndex(
            '{{%idx-curso_disciplina-disciplina_id}}',
            '{{%curso_disciplina}}'
        );

        $this->dropTable('{{%curso_disciplina}}');
    }
}
