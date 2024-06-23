<?php declare(strict_types=1);
/**
 * @author Kim Phung - kimphung@buro210.nl
 * @date 11-04-2024
 * @category BURO210
 * @package Buro210_CustomCheckout
 * @copyright Copyright © BURO210 (www.buro210.nl)
 */

namespace Buro210\CustomCheckout\Model\Config\Source;

/**
 * Class AddressClassification 
 *
 * @package Buro210\CustomCheckout\Model\Config\Source\AddressClassification 
 */
Class AddressClassification extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * Get AllOptions.
     *
     * @return null|array
     */
    public function getAllOptions(): ?array
    {
        return [
            [
                'value' => 0,
                'label' => __('Residential'),
            ],
            [
                'value' => 1,
                'label' => __('Commercial'),
            ],
        ];
    }
}
