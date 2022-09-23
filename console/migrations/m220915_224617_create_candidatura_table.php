<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%candidatura}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%candidato}}`
 * - `{{%curso}}`
 * - `{{%user}}`
 */
class m220915_224617_create_candidatura_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%candidatura}}', [
            'id' => $this->primaryKey(),
            'candidato_id' => $this->integer(11)->notNull(),
            'curso_id' => $this->integer(11)->notNull(),
            'regime' => $this->string(20)->notNull(),
            'estado' => $this->string(100)->notNull(),
            'created_at' => $this->datetime(),
            'updated_at' => $this->datetime(),
            'created_by' => $this->integer(11),
        ]);

        // creates index for column `candidato_id`
        $this->createIndex(
            '{{%idx-candidatura-candidato_id}}',
            '{{%candidatura}}',
            'candidato_id'
        );

        // add foreign key for table `{{%candidato}}`
        $this->addForeignKey(
            '{{%fk-candidatura-candidato_id}}',
            '{{%candidatura}}',
            'candidato_id',
            '{{%candidato}}',
            'id',
            'CASCADE'
        );

        // creates index for column `curso_id`
        $this->createIndex(
            '{{%idx-candidatura-curso_id}}',
            '{{%candidatura}}',
            'curso_id'
        );

        // add foreign key for table `{{%curso}}`
        $this->addForeignKey(
            '{{%fk-candidatura-curso_id}}',
            '{{%candidatura}}',
            'curso_id',
            '{{%curso}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-candidatura-created_by}}',
            '{{%candidatura}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-candidatura-created_by}}',
            '{{%candidatura}}',
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
            '{{%fk-candidatura-candidato_id}}',
            '{{%candidatura}}'
        );

        // drops index for column `candidato_id`
        $this->dropIndex(
            '{{%idx-candidatura-candidato_id}}',
            '{{%candidatura}}'
        );

        // drops foreign key for table `{{%curso}}`
        $this->dropForeignKey(
            '{{%fk-candidatura-curso_id}}',
            '{{%candidatura}}'
        );

        // drops index for column `curso_id`
        $this->dropIndex(
            '{{%idx-candidatura-curso_id}}',
            '{{%candidatura}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-candidatura-created_by}}',
            '{{%candidatura}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-candidatura-created_by}}',
            '{{%candidatura}}'
        );

        $this->dropTable('{{%candidatura}}');
    }
}
