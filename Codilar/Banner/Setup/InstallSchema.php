<?php
/**
 * Created by PhpStorm.
 * User: bharath
 * Date: 11/9/18
 * Time: 5:11 PM
 */

namespace Codilar\Banner\Setup;


use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     *
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @throws \Zend_Db_Exception
     */
    public function install (SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        /*
         * ProductPost table 'banner_data'
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable('banner_data'))
            ->addColumn(
                'entity_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Entity ID'
            )
            ->addColumn(
                'state',
                \Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
                null,
                ['unsigned' => true, 'nullable' => false],
                'State'
            )
            ->addColumn(
                'desktop_image',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                ['unsigned' => true, 'nullable' => false],
                'Desktop Image'
            )
            ->addColumn(
                'mobile_image',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                40,
                ['unsigned' => true, 'nullable' => false],
                'Mobile Image'
            )
            ->addColumn(
                'tablet_image',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                40,
                ['unsigned' => true, 'nullable' => false],
                'Tablet Image'
            )
            ->addColumn(
                'details',
                \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                null,
                [],
                'Details'
            )
            ->addColumn(
                'start_date',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                ['unsigned' => true, 'nullable' => false],
                'Start Date'
            )
            ->addColumn(
                'stop_date',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                20,
                ['unsigned' => true, 'nullable' => false],
                'Stop Date'
            )
            ->addColumn(
                'sale_start_date',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                [],
                'Sale Start Date'
            )
            ->addColumn(
                'sale_stop_date',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                null,
                [],
                'Sale Stop Date'
            )
            ->setComment('Banner Data');
        $installer->getConnection()->createTable($table);
    }
}