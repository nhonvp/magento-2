<?php

namespace Magenest\Movie\Setup;

use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if (!$installer->tableExists('magenest_director')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('magenest_director')
            )
                ->addColumn(
                    'director_id',
                    Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true]
                )
                ->addColumn(
                    'name',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false, 'default' => '']
                );
            $installer->getConnection()->createTable($table);
        }
        if (!$installer->tableExists('magenest_actor')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('magenest_actor')
            )
                ->addColumn(
                    'actor_id',
                    Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true]
                )
                ->addColumn(
                    'name',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false, 'default' => '']
                );
            $installer->getConnection()->createTable($table);
        }
        if (!$installer->tableExists('magenest_movie')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('magenest_movie')
            )
                ->addColumn(
                    'movie_id',
                    Table::TYPE_INTEGER,
                    null,
                    ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true]
                )
                ->addColumn(
                    'name',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false, 'default' => '']
                )
                ->addColumn(
                    'description',
                    Table::TYPE_TEXT,
                    '2M',
                    ['nullable' => false, 'default' => '']
                )
                ->addColumn(
                    'rating',
                    Table::TYPE_INTEGER,
                    null,
                    ['nullable' => false]
                )
                ->addColumn(
                    'director_id',
                    Table::TYPE_INTEGER,
                    null,
                    ['unsigned' => true, 'nullable' => false]
                )
                ->setComment('magenest_movie')
                ->addForeignKey(
                    $installer->getFkName('magenest_director', 'director_id', 'magenest_movie', 'director_id'),
                    'director_id',
                    $installer->getTable('magenest_director'),
                    'director_id',
                    \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
                )
                ->setOption('charset', 'utf8');
            $installer->getConnection()->createTable($table);

        }
        if (!$installer->tableExists('magenest_movie_actor')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('magenest_movie_actor')
            )
                ->addColumn(
                    'movie_id',
                    Table::TYPE_INTEGER,
                    null,
                    ['unsigned' => true, 'nullable' => false]
                )
                ->addColumn(
                    'actor_id',
                    Table::TYPE_INTEGER,
                    null,
                    ['nullable' => false, 'unsigned' => true]
                )
                ->addForeignKey(
                    $installer->getFkName('magenest_movie', 'movie_id', 'magenest_movie_actor', 'movie_id'),
                    'movie_id',
                    $installer->getTable('magenest_movie'),
                    'movie_id',
                    \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
                )
                ->addForeignKey(
                    $installer->getFkName('magenest_actor', 'actor_id', 'magenest_movie_actor', 'actor_id'),
                    'actor_id',
                    $installer->getTable('magenest_actor'),
                    'actor_id',
                    \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
                )
                ->setComment('magenest_movie_actor')
                ->setOption('charset', 'utf8');
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}
