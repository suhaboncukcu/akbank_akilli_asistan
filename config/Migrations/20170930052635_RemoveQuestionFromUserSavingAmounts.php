<?php
use Migrations\AbstractMigration;

class RemoveQuestionFromUserSavingAmounts extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('user_saving_amounts');
        $table->removeColumn('question');
        $table->update();
    }
}
