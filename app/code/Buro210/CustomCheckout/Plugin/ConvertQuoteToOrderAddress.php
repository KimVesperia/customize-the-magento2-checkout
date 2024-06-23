<?php declare(strict_types=1);
/**
 * @author Kim Phung - kimphung@buro210.nl
 * @date 23-06-2024
 * @category BURO210
 * @package Buro210_CustomCheckout
 * @copyright Copyright © BURO210 (www.buro210.nl)
 */

namespace Buro210\CustomCheckout\Plugin;

/**
 * Class ConvertQuoteToOrderAddress
 *
 * @package Buro210\CustomCheckout\Plugin\ConvertQuoteToOrderAddress
 */
Class ConvertQuoteToOrderAddress
{
    /**
     * Plugin to add additional data to the order address after conversion from quote address.
     *
     * @param \Magento\Quote\Model\Quote\Address\ToOrderAddress $subject
     * @param \Magento\Sales\Api\Data\OrderAddressInterface $result
     * @param \Magento\Quote\Model\Quote\Address $address
     *
     * @return \Magento\Sales\Api\Data\OrderAddressInterface
     */
    public function afterConvert(
        \Magento\Quote\Model\Quote\Address\ToOrderAddress $subject,
        \Magento\Sales\Api\Data\OrderAddressInterface $result,
        \Magento\Quote\Model\Quote\Address $address
    ): \Magento\Sales\Api\Data\OrderAddressInterface
    {
        if ($addressClassification = $address->getData('address_classification')) {
            $result->setData('address_classification', $addressClassification);
        }

        return $result;
    }
}
