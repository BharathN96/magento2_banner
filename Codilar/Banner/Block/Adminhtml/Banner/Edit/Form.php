<?php
/**
 * Created by PhpStorm.
 * User: bharath
 * Date: 12/9/18
 * Time: 11:01 AM
 */

namespace Codilar\Banner\Block\Adminhtml\Banner\Edit;

class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;
    protected $_wysiwygConfig;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry             $registry
     * @param \Magento\Framework\Data\FormFactory     $formFactory
     * @param array                                   $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        array $data = []
    )
    {
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form.
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(
            ['data' => [
                'id' => 'edit_form',
                'enctype' => 'multipart/form-data',
                'action' => $this->getData('action'),
                'method' => 'post'
            ]
            ]
        );

        $form->setHtmlIdPrefix('codilar_');
        if ($model->getEntityId()) {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Edit Row Data'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('entity_id', 'hidden', ['name' => 'entity_id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Add Row Data'), 'class' => 'fieldset-wide']
            );
        }

        $selectArray = array(1 => 'Enable', 0 => 'Disable');

        $fieldset->addField(
            'status',
            'select',
            [
                'name' => 'status',
                'label' => __('Status'),
                'id' => 'status',
                'class' => 'required-entry',
                'required' => true,
                'values' => $selectArray,
            ]
        );

        $fieldset->addField(
            'desktop_image',
            'image',
            [
                'name' => 'desktop_image',
                'label' => __('Desktop Image'),
                'id' => 'desktop_image',
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'mobile_image',
            'image',
            [
                'name' => 'mobile_image',
                'label' => __('Mobile Image'),
                'id' => 'mobile_image',
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'tablet_image',
            'image',
            [
                'name' => 'tablet_image',
                'label' => __('Tablet Image'),
                'id' => 'tablet_image',
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'details',
            'editor',
            [
                'name' => 'details',
                'label' => __('Details'),
                'id' => 'details',
                'class' => 'required-entry',
                'required' => true,
                'config'    => $this->_wysiwygConfig->getConfig(),
                'wysiwyg'   => true,
            ]
        );

        $fieldset->addField(
            'start_date',
            'date',
            [
                'name' => 'start_date',
                'label' => __('Start Date'),
                'id' => 'start_date',
                'class' => 'required-entry',
                'required' => true,
                'date_format' => 'yyyy-MM-dd',
                'time_format' => 'hh:mm:ss'
            ]
        );

        $fieldset->addField(
            'stop_date',
            'date',
            [
                'name' => 'stop_date',
                'label' => __('Stop Date'),
                'id' => 'stop_date',
                'class' => 'required-entry',
                'required' => true,
                'date_format' => 'yyyy-MM-dd',
                'time_format' => 'hh:mm:ss'
            ]
        );
        $fieldset->addField(
            'sale_start_date',
            'date',
            [
                'name' => 'sale_start_date',
                'label' => __('Sale Start Date'),
                'id' => 'sale_start_date',
                'class' => 'required-entry',
                'required' => true,
                'date_format' => 'yyyy-MM-dd',
                'time_format' => 'hh:mm:ss'
            ]
        );

        $fieldset->addField(
            'sale_stop_date',
            'date',
            [
                'name' => 'sale_stop_date',
                'label' => __('Sale Stop Date'),
                'id' => 'sale_stop_date',
                'class' => 'required-entry',
                'required' => true,
                'date_format' => 'yyyy-MM-dd',
                'time_format' => 'hh:mm:ss'
            ]
        );

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}