var config = {
    "config": {
        "mixins": {
            "Magento_Ui/js/lib/validation/validator": {
                "Buro210_CustomCheckout/js/lib/validation/validator-mixin": true
            },
            "Magento_Checkout/js/action/set-shipping-information": {
                "Buro210_CustomCheckout/js/action/set-shipping-information-mixin": true
            },
            'Magento_Checkout/js/view/billing-address': {
                'Buro210_CustomCheckout/js/view/billing-address-mixin': true
            }
        }
    },
    deps: [
        "Buro210_CustomCheckout/js/mask-telephone-inputs"
    ],
    map: {
        '*': {
            'Magento_Checkout/template/sidebar.html':
                'Buro210_CustomCheckout/template/sidebar.html'
        }
    }
}
