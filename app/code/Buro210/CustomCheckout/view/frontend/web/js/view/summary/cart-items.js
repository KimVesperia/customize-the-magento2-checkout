define([
    'Magento_Checkout/js/view/summary/cart-items'
], function(
    Component
) {
    'use strict';
    
    return Component.extend({
        maxCartItemsToDisplay: 0,
        
        isItemsBlockExpanded: function() {
            return true;
        }
    });
});
