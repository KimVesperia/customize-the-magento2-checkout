<?php declare(strict_types=1);
/**
 * @author Kim Phung - kimphung@buro210.nl
 * @date 11-04-2024
 * @category BURO210
 * @package Buro210_CustomCheckout
 * @copyright Copyright © BURO210 (www.buro210.nl)
 */

namespace Buro210\CustomCheckout\Model;

/**
 * Class CheckoutConfigProvider
 *
 * @package Buro210\CustomCheckout\Model\CheckoutConfigProvider
 */
Class CheckoutConfigProvider implements \Magento\Checkout\Model\ConfigProviderInterface
{
    /**
     * LayoutInterface constructor.
     *
     * @param \Magento\Framework\View\LayoutInterface $layout
     */
    public function __construct(
        private \Magento\Framework\View\LayoutInterface $layout
    ) {
        $this->fulfillmentStatus = $layout->createBlock('Magento\Cms\Block\Block')
            ->setBlockId('fulfillment_status')
            ->toHtml();
    }

    /**
     * Get config.
     *
     * @return null|array
     */
    public function getConfig(): ?array
    {
        $config = [];
        $config['fulfillment_status'] = $this->fulfillmentStatus;

        return $config;
    }
}
