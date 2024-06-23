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
 * Class SaveShippingAddressExtensionAttributes
 *
 * @package Buro210\CustomCheckout\Plugin\SaveShippingAddressExtensionAttributes
 */
Class SaveShippingAddressExtensionAttributes
{
    /**
     * Plugin to add additional data to the shipping address before saving.
     *
     * @param \Magento\Checkout\Api\ShippingInformationManagementInterface $subject
     * @param int $cartId
     * @param \Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation
     *
     * @return void
     */
    public function beforeSaveAddressInformation(
        \Magento\Checkout\Api\ShippingInformationManagementInterface $subject,
        int $cartId,
        \Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation
    ) {
        $shippingAddress = $addressInformation->getShippingAddress();

        if ($extensionAttributes = $shippingAddress->getExtensionAttributes()) {
            $shippingAddress->setData('address_classification', $extensionAttributes->getAddressClassification());
        }
    }
}
