define([
    'jquery'
], function($) {
    'use strict';
    
    return function (validator) {
        validator.addRule(
            'validate-phoneStrictNL',
            function (v) {
                return $.mage.isEmptyNoTrim(v) || /^(?:\+31|0)(?:[1-9][0-9]?)(?:[\s-]?[0-9]){8}$/.test(v);
            },
            $.mage.__('Please enter a valid Dutch phone number. For example, 0612345678 or 0791234567.')
        );
        return validator;
    }
});
