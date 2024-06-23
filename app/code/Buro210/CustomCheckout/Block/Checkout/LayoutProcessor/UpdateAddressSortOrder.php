<?php declare(strict_types=1);
/**
 * @author Kim Phung - kimphung@buro210.nl
 * @date 12-12-2023
 * @category BURO210
 * @package Buro210_CustomCheckout
 * @copyright Copyright © BURO210 (www.buro210.nl)
 */

namespace Buro210\CustomCheckout\Block\Checkout\LayoutProcessor;

/**
 * Class UpdateAddressSortOrder
 *
 * @package Buro210\CustomCheckout\Block\Checkout\LayoutProcessor\UpdateAddressSortOrder
 */
Class UpdateAddressSortOrder implements \Magento\Checkout\Block\Checkout\LayoutProcessorInterface
{
    /**
     * Process js Layout of block
     *
     * @param array $jsLayout
     * @return null|array
     */
    public function process($jsLayout): ?array
    {
        foreach ($jsLayout['components']['checkout']['children']
            ['steps']['children']
            ['billing-step']['children']
            ['payment']['children']
            ['payments-list']['children'] as &$paymentMethod) {
            $fields = &$paymentMethod['children']['form-fields']['children'];
            if ($fields === null) {
                continue;
            }
            $fields['city']['sortOrder'] = '72';
            $fields['region_id']['sortOrder'] = '74';
            $fields['postcode']['sortOrder'] = '76';
        }

        return $jsLayout;
    }
}
