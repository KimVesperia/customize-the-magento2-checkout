<?php declare(strict_types=1);
/**
 * @author Kim Phung - kimphung@buro210.nl
 * @date 11-04-2024
 * @category BURO210
 * @package Buro210_CustomCheckout
 * @copyright Copyright © BURO210 (www.buro210.nl)
 */

namespace Buro210\CustomCheckout\Setup\Patch\Data;

/**
 * Class AddressClassificationAttribute
 *
 * @package Buro210\CustomCheckout\Setup\Patch\Data\AddressClassificationAttribute
 */
Class AddressClassificationAttribute implements \Magento\Framework\Setup\Patch\DataPatchInterface
{
    const ATTRIBUTE_CODE = 'address_classification';

    /**
     * attribute constructor.
     *
     * @param \Magento\Customer\Model\ResourceModel\Attribute $attribute
     * @param \Magento\Eav\Model\Config $config
     * @param \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory
     * @param \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup
     */
    public function __construct(
        private \Magento\Customer\Model\ResourceModel\Attribute $attribute,
        private \Magento\Eav\Model\Config $config,
        private \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory,
        private \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup
    ) {}

    /**
     * {@inheritdoc}
     */
    public static function getDependencies(): ?array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases(): ?array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function apply(): ?self
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $eavSetup->addAttribute(
            \Magento\Customer\Api\AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            self::ATTRIBUTE_CODE,
            [
                'type' => 'int',
                'label' => 'Address Classification',
                'input' => 'select',
                'source' => \Buro210\CustomCheckout\Model\Config\Source\AddressClassification::class,
                'required' => true,
                'default' => 0,
                'system' => false,
                'position' => 150,
                'sort_order' => 150,
            ]
        );
        $attribute = $this->config->getAttribute(
            \Magento\Customer\Api\AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            self::ATTRIBUTE_CODE
        );
        $attribute->setData('used_in_forms', [
            'adminhtml_customer_address',
            'customer_address_edit',
            'customer_register_address',
        ]);
        $this->attribute->save($attribute);

        return $this;
    }
}
