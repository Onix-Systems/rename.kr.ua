<?php

use Phinx\Migration\AbstractMigration;

class ChangeNameForDekabrystivStreet extends AbstractMigration
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
                ->set('new_name','Володимира Панченка')
                ->set('eponim','https://uk.wikipedia.org/wiki/%D0%92%D1%83%D0%BB%D0%B8%D1%86%D1%8F_%D0%92%D0%BE%D0%BB%D0%BE%D0%B4%D0%B8%D0%BC%D0%B8%D1%80%D0%B0_%D0%9F%D0%B0%D0%BD%D1%87%D0%B5%D0%BD%D0%BA%D0%B0')
                ->where(['old_name' => 'Декабристів'])
                ->execute();
    }
}
