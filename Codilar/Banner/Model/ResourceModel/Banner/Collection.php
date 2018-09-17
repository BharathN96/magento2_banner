<?php
/**
 * Created by PhpStorm.
 * User: bharath
 * Date: 11/9/18
 * Time: 6:21 PM
 */

namespace Codilar\Banner\Model\ResourceModel\Banner;


use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';

    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init('Codilar\Banner\Model\Banner', 'Codilar\Banner\Model\ResourceModel\Banner');
    }
}