<?php

use Phinx\Migration\AbstractMigration;

class AddAdditionalDataToPachenkoStreet extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    addCustomColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Any other destructive changes will result in an error when trying to
     * rollback the migration.
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $builder = $this->getQueryBuilder();
        $builder->update('data')
            ->set('old_name','Леніна вулиця / Дворцова (від Великої Перспективної вул. до вул. Кропивницького та далі до вул. Світлої)')
            ->where(['new_name' => 'Архітектора Паученка'])
            ->execute();
    }
}
