'use strict';

/**
* @ngdoc module
* @name cartogram_scroll
* @description
* This module houses all reusible Cartogram Directives. Prefixed with cg
*/

angular.module('cartogram.scroll', [
'cartogram.dimensions'
])

/**
* @ngdoc directive
* @name cg_scroll_on_click
* @description
*
* Simple Directive to handle clicking and scrolling to elements on a long page.
* Targets the href (ie:#footer) or scrolls to the top of the page.
*
*/


.directive('cgScrollOnClick', function (cgDimensions) {
	return {
		restrict: 'A',
		link: function(scope, $elm, attrs) {
			var idToScroll = attrs.cgScrollOnClick,
				distance = attrs.distance,
				wrapper = attrs.wrapper || 'html',
				$html = $(wrapper)
				;

			$elm.on('click', function() {
				var $target;

				if (idToScroll) {
					$target = $(idToScroll).offset().top;
				} else if (distance) {
					$target = distance;
				} else {
					$target = cgDimensions.getViewportHeight();
				}

				$html.animate({scrollTop: $target}, 450, 'easeInOutExpo');
			});
		}
	};
})
