(function ($, window, document, undefined) {
	'use strict';
	var pluginName = "weather";

	var defaults = {
		city: null,
		tempUnit: 'C',
		autocompleteMinLength: 3,
		displayDescription: false,
		displayMinMaxTemp: true,
		displayWind: false,
		displayHumidity: false,
		fixLocation: true,
		url: 'http://api.openweathermap.org/data/2.5/forecast',
		urlParams: {
			appid: 'bd709310652698e58077005edc935eac',
			cnt: 1,
			units: 'metric',
			lang: 'kr'
		}
	};

	function Plugin (element, options) {
		var _this = this;
		this.element = element;
		this.settings = $.extend({}, defaults, options, this._loadStorage());
		this._options = options;
		this._name = pluginName + $(this.element).index();
		this._icons = icons;
		this._init();
	}

	$.fn[pluginName] = function (options) {
		this.each(function() {
			if (!$.data(this, "plugin_" + pluginName)) 
				$.data(this, "plugin_" + pluginName, new Plugin(this, options));
		});
		return this;
	};

	var icons = {		
		'01d': 'w_sunny',		
		'01n': 'w_moon',		
		'02d': 'w_cloudy_day',		
		'02n': 'w_cloudy_night',		
		'03d': 'w_cloudy_day',		
		'03n': 'w_cloudy_night',		
		'04d': 'w_overcast',		
		'04n': 'w_overcast',		
		'09d': 'w_rain',		
		'09n': 'w_rain',		
		'10d': 'w_rain',		
		'10n': 'w_rain',		
		'11d': 'w_thunderstorm',		
		'11n': 'w_thunderstorm',		
		'13d': 'w_snowy',		
		'13n': 'w_snowy',		
		'50d': 'w_fog',		
		'50n': 'w_fog'		
	};

	$.extend(Plugin.prototype, {

		_init: function() {
			var promise = $.Deferred();
			var location = this._getLocation(promise);
			this._mainChain(location);
		},

		_mainChain: function(promise) {
			promise
			.fail(this._withoutGetLocation.bind(this), this._render.bind(this, null))
			.then(this._getWeather.bind(this))
			.then(this._parseData.bind(this))
			.then(this._render.bind(this))
			.then(this._addMainEventListeners.bind(this))
			.fail(this._errorData.bind(this))
		},

		_getLocation: function(promise) {
			if (!this.settings.city) {
				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(pos =>	promise.resolve(pos.coords), e => promise.reject(e));
				} else {
					promise.reject(new Error('No support Geolocation'));
				}
				return promise;
			} else {
				return promise.resolve( {city: this.settings.city} );
			}
		},

		_withoutGetLocation: function() {
			var element = $(this.element);
			var promise = $.Deferred();
			var autocompleteSettings = {
				url: "http://gd.geobytes.com/AutoCompleteCity", 
				minChars: 3,
				autocompleteOnSelect: this._onSelect.bind(this, promise)
			}
			element.find('.weather__input').autocomplete(autocompleteSettings);
			return promise.promise();
		},

		_parseURL(data) {
			var newData = $.extend({}, this.settings.urlParams, data);
			return this.settings.url + '?' + $.map(newData, (val, key) => key + '=' + val).join('&');
		},

		_getWeather: function(data) {
			var request = '';
			if (!data) 
				request = this._parseURL({q: 'Kharkiv'}); else
			if ('city' in data)	
				request = this._parseURL({q: data.city}); else
			if ('latitude' in data && 'longitude' in data) 
				request = this._parseURL({lat: data.latitude, lon: data.longitude}); else
			request = this._parseURL({q: 'Kharkiv'});
			return $.get(request)
		},

		_parseData: function(data) {
			const KELVIN = 273.15;
			var sub = this.settings.tempUnit === 'K' ? KELVIN : 0;

			var today = new Date();
			var dd = today.getDate();
			var mm = today.getMonth()+1; 
			var yyyy = today.getFullYear();
			if(dd<10) {
				dd='0'+dd
			} 
			if(mm<10) {
				mm='0'+mm
			} 
			today = yyyy+'.' + mm+'.'+dd;

			if ('city' in data) {
				var city = data.city;
				var main = data.list[0].main;
				var weather = data.list[0].weather[0];
				var obj = {
					name: city.name,
					country: city.country,
					main: weather.main,
					description: weather.description,
					icon: weather.icon,
					tempCur: (main.temp + sub).toFixed(1),
					tempMin: (main.temp_min + sub).toFixed(0),
					tempMax: (main.temp_max + sub).toFixed(0),
					humidity: main.humidity,
					aa :today,
					wind: data.list[0].wind
				};
				return obj;
			} else 
			return $.Deferred().reject('City not found');
		},

		_errorData: function(data) {
			console.log('Error:', data);
			var dataFromInput = this._withoutGetLocation.call(this);
			this._mainChain(dataFromInput);
		},

		_addMainEventListeners: function() {
			var element = $(this.element);
			element.find('.weather__name-city').click(() => {
				this.settings.fixLocation = false;
				this._saveStorage({});
				var promise = $.Deferred().reject();
				this._mainChain(promise);
			});
			element.find('.weather__checkbox').click(() => {
				this.settings.fixLocation = !this.settings.fixLocation; 
				this.settings.fixLocation ? this._saveStorage(this.settings) : this._saveStorage({});
				this._renderCheckBox(this.element)});
		},

		_onSelect: function(promise, el) {
			this.settings.city = el;
			promise.resolve({city: el});
		},

		_saveStorage: function(settings) {
			localStorage.setItem(this._name, JSON.stringify(settings));
		},

		_loadStorage: function() {
			return JSON.parse(localStorage.getItem(pluginName + $(this.element).index()));
		},

		_renderCheckBox: function() {
			$(this.element).find('.weather__checkbox').attr('src', `img/dialog_checkbox${this.settings.fixLocation ? '_selected' : ''}.png`);
		},
		
			
		_render: function(obj) {
			

			var element = $(this.element);
			
			if (obj) {
				var template = `
				<div class="icon_cloud" style="background:url('img/${this._icons[obj.icon]}.png') no-repeat"></div>
				<div class="weather_1">${obj.aa}</div>
				<div class="weather_2">서울<p class="weather_3">${obj.tempMin}/${obj.tempMax}℃<br/>습도 ${obj.humidity}%</p></div>`;
				element.html($(template));
				/*element.find('.weather__widget')
				.css(`background`, `url("img/${obj.icon}.jpg")`)
				.css('background-size', '100%');
				<div class="icon_cloud" style="background:url('img/${this._icons[obj.icon]}.png') no-repeat"></div>
				*/
			}
			else {
				var template = `<div class="weather__sub">
				<label class="weather__input__label">Input city:</label>
				<input class="weather__input" type="text" autofocus>
				</div>`;	
				element.html($(template));
				element.find('.weather__input').focus();
			}
		}
	});

})( jQuery, window, document );
