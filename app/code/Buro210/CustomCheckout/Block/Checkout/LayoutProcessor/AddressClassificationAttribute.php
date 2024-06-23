<?php declare(strict_types=1);
/**
 * @author Kim Phung - kimphung@buro210.nl
 * @date 23-06-2024
 * @category BURO210
 * @package Buro210_CustomCheckout
 * @copyright Copyright © BURO210 (www.buro210.nl)
 */

namespace Buro210\CustomCheckout\Block\Checkout\LayoutProcessor;

/**
 * Class AddressClassificationAttribute
 *
 * @package Buro210\CustomCheckout\Block\Checkout\LayoutProcessor\AddressClassificationAttribute
 */
Class AddressClassificationAttribute implements \Magento\Checkout\Block\Checkout\LayoutProcessorInterface
{
    /**
     * Process js Layout of block
     *
     * @param array $jsLayout
     * @return null|array
     */
    public function process($jsLayout): ?array
    {
        $attributeCode = 'address_classification';
        $attributeData = &$jsLayout['components']['checkout']['children']
            ['steps']['children']
            ['shipping-step']['children']
            ['shippingAddress']['children']
            ['shipping-address-fieldset']['children']
            [$attributeCode];

        $attributeData['config']['customScope'] = 'shippingAddress.custom_attributes';
        $attributeData['dataScope'] = "shippingAddress.custom_attributes.$attributeCode";

        foreach ($jsLayout['components']['checkout']['children']
                ['steps']['children']
                ['billing-step']['children']
                ['payment']['children']
                ['payments-list']['children'] as &$paymentMethod) {
            $fields = &$paymentMethod['children']['form-fields']['children'];
            if (isset($fields[$attributeCode])) {
                unset($fields[$attributeCode]);
            }
        }

        return $jsLayout;
    }
}
