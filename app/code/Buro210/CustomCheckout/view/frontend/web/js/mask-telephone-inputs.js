define([
    'domReady',
    'Magento_Ui/js/lib/view/utils/dom-observer',
    'jquery',
    'Buro210_CustomCheckout/js/jquery.inputmask.min'
], function(
    domReady,
    domObserver,
    $
) {
    'use strict';
    
    domReady(function() {
        domObserver.get('input[name="telephone"]', function (el) {
            $(el).inputmask("9999999999");
        });
    })
});
