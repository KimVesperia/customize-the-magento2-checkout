define([], function() {
    'use strict';

    return function(subject) {
        return subject.extend({
            defaults: {
                detailsTemplate: 'Buro210_CustomCheckout/billing-address/details'
            }
        });
    };
});