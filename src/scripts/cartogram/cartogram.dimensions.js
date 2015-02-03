'use strict';
/**
 * @ngdoc module
 * @name cartogram_events
 * @description
 * This module houses all reusible Cartogram Directives. Prefixed with cg
 */


angular.module('cartogram.dimensions', [])


/**
 * @ngdoc factory
 * @name cg_dimensions
 *
 */

.factory('cgDimensions', function() {

    var docElem = document.documentElement;

    return {
        getViewportHeight : function() {
            var client = docElem.clientHeight,
            inner = window.innerHeight;
            if( client < inner ) {
                return inner;
            } else {
                return client;
            }
        },

        scrollY : function() {
            return window.pageYOffset || docElem.scrollTop;
        },

        // http://stackoverflow.com/a/5598797/989439
        getOffset : function( el ) {
            var offsetTop = 0, offsetLeft = 0;
            do {
                if ( !isNaN( el.offsetTop ) ) {
                    offsetTop += el.offsetTop;
                }
                if ( !isNaN( el.offsetLeft ) ) {
                    offsetLeft += el.offsetLeft;
                }
            } while( el = el.offsetParent );

            return {
                top : offsetTop,
                left : offsetLeft
            }
        },
        inViewport : function( el, h ) {
            var elH = el.offsetHeight,
            scrolled = this.scrollY(),
            viewed = scrolled + this.getViewportHeight(),
            elTop = this.getOffset(el).top,
            elBottom = elTop + elH,
            // if 0, the element is considered in the viewport as soon as it enters.
            // if 1, the element is considered in the viewport only when it's fully inside
            // value in percentage (1 >= h >= 0)
            h = h || 0;

            return (elTop + elH * h) <= viewed && (elBottom - elH * h) >= scrolled;
        }

    };
})
