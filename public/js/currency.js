( function( root, factory ) {

	var pluginName = 'Currency';

	if ( typeof define === 'function' && define.amd ) {
		define( [], factory( pluginName ) );
	} else if ( typeof exports === 'object' ) {
		module.exports = factory( pluginName );
	} else {
		root[ pluginName ] = factory( pluginName );
	}
}( this, function( pluginName ) {

	'use strict';

	var defaults = {
		selector: '.js-input-decimal'
	};

	/**
	 * Merge defaults with user options
	 * @param {Object} defaults Default settings
	 * @param {Object} options User options
	 */
	var extend = function( target, options ) {
		var prop, extended = {};
		for ( prop in defaults ) {
			if ( Object.prototype.hasOwnProperty.call( defaults, prop ) ) {
				extended[ prop ] = defaults[ prop ];
			}
		}
		for ( prop in options ) {
			if ( Object.prototype.hasOwnProperty.call( options, prop ) ) {
				extended[ prop ] = options[ prop ];
			}
		}
		return extended;
	};

	/**
	 * Plugin Object
	 * @param {Object} options User options
	 * @constructor
	 */
	function Plugin( options ) {
		this.options = extend( defaults, options );
		this.init();
	}

	/**
	 * Plugin prototype
	 * @public
	 * @constructor
	 */
	Plugin.prototype = {
		init: function() {

			var self = this;

			this.selectors = document.querySelectorAll( this.options.selector );

			for ( var i = 0; i < this.selectors.length; i++ ) {

				var selector = this.selectors[ i ];

				selector.addEventListener("blur", function(event){
					self.formatValue(this);
				});

				selector.addEventListener("keydown", function(event){
					self.filterNumbers(event, selector);
				});

				selector.addEventListener("focus", function(event){
					self.selectAll(event);
				});
			}
		},
		filterNumbers: function(event, selector){

			event = event ? event : window.event;

			let charCode = event.which ? event.which : event.keyCode;

			if(
				(charCode == 13 || charCode == 8 || charCode == 188 || charCode == 110 || charCode == 108 || charCode == 9 || charCode == 16 || charCode == 18 || charCode == 116 || charCode == 37 || charCode == 39) ||
				(charCode >= 48 && charCode <= 57) ||
				(charCode >= 44 && charCode <= 46) ||
				(charCode >= 96 && charCode <= 105) ||
				(charCode >= 35 && charCode <= 36)
			){
				return true;
			}

			event.preventDefault();
		},
		formatValue: function(element){
			if(element.value != ''){

				let places = element.getAttribute('data-places');

				let value = accounting.unformat(element.value, ",");

				let n = accounting.formatNumber(value, places !== null ? places : 2, ".", ",");

				element.value = n;
			}
			else {
				element.value = "";
			}
		},
		selectAll: function(event){
			setTimeout(function(){
				event.target.select();
			}, 10);
		}
	};

	return Plugin;
}));