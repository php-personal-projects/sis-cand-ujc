<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%candidato}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m220915_224559_create_candidato_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->createTable('{{%candidato}}', [
			'id' => $this->primaryKey(),
			'nome' => $this->string(255),
			'sexo' => $this->string(15)->notNull(),
			'tipo_documento' => $this->string(50)->notNull(),
			'numero_documento' => $this->string(50)->notNull(),
			'nuit' => $this->integer(15)->notNull(),
			'data_nascimento' =>$this->date()->notNull(),
			'naturalidade' => $this->string()->notNull(),
			'provincia' => $this->string()->notNull(),
			'contacto_actual' => $this->integer(9)->notNull(),
			'nivel_academico' => $this->string()->notNull(),
			'nome_escola' => $this->string()->notNull(),
			'created_at' => $this->datetime(),
			'updated_at' => $this->datetime(),
			'created_by' => $this->integer(11),
		]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-candidato-created_by}}',
            '{{%candidato}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-candidato-created_by}}',
            '{{%candidato}}',
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
            '{{%fk-candidato-created_by}}',
            '{{%candidato}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-candidato-created_by}}',
            '{{%candidato}}'
        );

        $this->dropTable('{{%candidato}}');
    }
}
