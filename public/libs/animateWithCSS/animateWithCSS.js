/* Copyright (c) 2011 Aza Raskin
 |
 | Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated
 | documentation files (the "Software"), to deal in the Software without restriction, including
 | without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 | copies of the Software, and to permit persons to whom the Software is furnished to do so, subject
 | to the following conditions:
 |
 | The above copyright notice and this permission notice shall be included in all copies or substantial portions
 | of the Software.
 |
 | THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED
 | TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 | THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF
 | CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER
 | DEALINGS IN THE SOFTWARE.
 |
 */

(function($){

	var rupper = /([A-Z])/g;

// ----------
// Function: stopCssAnimation
// Stops an animation in its tracks!
	$.fn.stopCssAnimation = function(){
		this.each(function(){
			// When you remove the CSS Transition properties
			// it doesn't just end the animation where it was,
			// instead it jumps the animation to the end state.
			// Thus, to stop an animation, you first have to get
			// its current computed values, remove the transition
			// properties, and then finally set the elements
			// values appropriatly.

			// Get the computed values of the animated properties
			var $el = $(this);
			var props = $el.data("cssAnimatedProps");
			var cStyle = window.getComputedStyle(this, null);
			var cssValues = {};
			for(var prop in props){
				prop = prop.replace( rupper, "-$1" ).toLowerCase();
				cssValues[prop] = cStyle.getPropertyValue(prop);
			}

			// Remove the CSS Transition CSS
			$el.css({
				'-moz-transition-property': 'none',
				'-moz-transition-duration': '',
				'-moz-transition-timing-function': '',
				'-webkit-transition-property': 'none',
				'-webkit-transition-duration': '',
				'-webkit-transition-timing-function': ''
			});

			// Set the saved computed properties
			for( var prop in cssValues ){
				$el.css(prop, cssValues[prop]);
			}

			// Cancel any onComplete function
			$el.data("cssAnimatedProps", null);
			var timeoutId = $el.data("cssTimeoutId");
			if( timeoutId != null ) {
				clearTimeout(timeoutId);
				$el.data("cssTimeoutId", null);
			}
		});
	};

// ----------
// Function: animateWithCSS
// Uses CSS transitions to animate the element. 
// 
// Parameters: 
//   Takes the same properties as jQuery's animate function.
//
//   The only difference is that the easing paramater can now be:
//   bounce, swing, linear, ease-in, ease-out, cubic-bezier, or
//   manually defined as cubic-bezier(x1,y1,x2,y2);
	$.fn.animateWithCSS = function(props, speed, easing, callback) {
		var optall = jQuery.speed(speed, easing, callback);

		if ( jQuery.isEmptyObject( props ) ) {
			return this.each( optall.complete );
		}

		var easings = {
			bounce: 'cubic-bezier(0.0, 0.35, .5, 1.3)',
			linear: 'linear',
			swing: 'ease-in-out',
		};

		optall.easing = optall.easing || "swing";
		optall.easing = easings[optall.easing] ? easings[optall.easing] : optall.easing;

		// The latest versions of Firefox do not animate from a non-explicitly set
		// css properties. So for each element to be animated, go through and
		// explicitly define 'em.
		this.each(function(){
			$(this).data("cssAnimatedProps", props);
			var cStyle = window.getComputedStyle(this, null);
			for(var prop in props){
				prop = prop.replace( rupper, "-$1" ).toLowerCase();
				$(this).css(prop, cStyle.getPropertyValue(prop));
			}
		});

		this.css({
			'-moz-transition-property': 'all', // TODO: just animate the properties we're changing
			'-moz-transition-duration': optall.duration + 'ms',
			'-moz-transition-timing-function': optall.easing,
			'-webkit-transition-property': 'all', // TODO: just animate the properties we're changing
			'-webkit-transition-duration': optall.duration + 'ms',
			'-webkit-transition-timing-function': optall.easing,
		});

		this.css(props);

		var self = this;
		var timeoutId = setTimeout(function() {
			self.css({
				'-moz-transition-property': 'none',
				'-moz-transition-duration': '',
				'-moz-transition-timing-function': '',
				'-webkit-transition-property': 'none',
				'-webkit-transition-duration': '',
				'-webkit-transition-timing-function': ''
			});

			self.data("cssAnimatedProps", null);
			self.data("cssTimeoutId", null);

			if(jQuery.isFunction(optall.complete))
				optall.complete.apply(self);
		}, optall.duration);
		this.data( "cssTimeoutId", timeoutId );


		return this;
	}

})(jQuery);

jQuery.fn.extend({
	animateWithCSS: function (b, c) {
		var a;
		a = $.Deferred();
		this.each(function (h, e) {
			var m, j, g, l, d, f, k;
			m = $(e);
			l = b.match(/[\d\.]+s/g);
			j = l[1];
			g = $.Deferred();
			d = m.css("display") === "none";
			f = b.match(/(?:forwards|backwards|both)/) !== null;
			if (j) {
				k = b.lastIndexOf(j);
				b = b.substr(0, k) + b.substr(k + (j.length + 1));
				setTimeout(g.resolve, parseFloat(j) * 1000)
			} else {
				g.resolve()
			}
			m.on("animationend.animationTracker webkitAnimationEnd.animationTracker mozAnimationEnd.animationTracker oanimationend.animationTracker MSAnimationEnd.animationTracker", function (n) {
				var i;
				m = $(this);
				i = m.css("opacity") === "0";
				m.off(".animationTracker");
				if (f) {
					m.css("opacity", m.css("opacity"))
				}
				m.css({
					"-webkit-animation": "none",
					"-moz-animation": "none",
					"-o-animation": "none",
					"-ms-animation": "none",
					animation: "none"
				});
				if (c) {
					c.call(m)
				}
				return a.resolve()
			});
			g.done(function () {
				if (d) {
					m.show()
				}
				return m.css({
					"-webkit-animation": b,
					"-moz-animation": b,
					"-o-animation": b,
					"-ms-animation": b,
					animation: b
				})
			});
			return this
		});
		return a
	}
});