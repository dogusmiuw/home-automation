function renderWeatherByLocation() {
    // const apiKey = 'a1f9dbe69aa1cf96c8dec4633c032ca5';
  
    $.when(getCoordByCurrentLocation()).then((location) => {
      $.ajax({
        url: "https://fcc-weather-api.glitch.me/api/current",
        method: "GET",
        data: {
          lat: location.latitude,
          lon: location.longitude,
        },
      })
        .done((response) => showDataWeather(response))
        .fail((err) => showFeedback(err));
    });
  }
  
  function getCoordByCurrentLocation() {
    return $.ajax({
      url: "https://ipapi.co/json/",
    });
  }
  
  function showFeedback(response) {
    console.log("error");
  }
  
  function showDataWeather(data) {
    const local = data.name + ", " + data.sys.country;
    const clime = data.weather[0].main;
    const icon = getIcon(clime);
    const fahrenheit = Math.round((data.main.temp * 9) / 5 + 32);
    const celsius = Math.round(data.main.temp);
  
    $('[data-weather="icon"]').attr("src", icon);
    $('[data-weather="local"]').text(local);
    $('[data-weather="clime"]').text(clime);
    $('[data-weather="celsius"]').text(celsius);
    $('[data-weather="fahrenheit"]').text(fahrenheit);
  }
  
  function getIcon(name) {
    let clime = name.toLowerCase();
    return isClimeValid(clime) ? getIconByClime(clime) : null;
  }
  
  function isClimeValid(clime) {
    const climes = climeOptions();
    return !!$.inArray(clime, climes);
  }
  
  function climeOptions() {
    return ["drizzle", "clouds", "rain", "snow", "clear", "thunderstom"];
  }
  
  function getIconByClime(clime) {
    const iconClimeOptions = getIconsClime();
    return iconClimeOptions[clime];
  }
  
  function getIconsClime() {
    return {
      drizzle:
        "https://cdn2.iconfinder.com/data/icons/weather-color-2/500/weather-30-256.png",
      clouds:
        "https://cdn2.iconfinder.com/data/icons/weather-color-2/500/weather-22-256.png",
      rain: "https://cdn2.iconfinder.com/data/icons/weather-color-2/500/weather-32-256.png",
      snow: "https://cdn2.iconfinder.com/data/icons/weather-color-2/500/weather-24-256.png",
      clear:
        "https://cdn2.iconfinder.com/data/icons/weather-color-2/500/weather-01-256.png",
      thunderstom:
        "https://cdn2.iconfinder.com/data/icons/weather-color-2/500/weather-23-256.png",
    };
  }
  
  renderWeatherByLocation();
  
  // Events
  // ––––––––––––––––––––––––––––––––––––––––––––––––––
  
  var $doc = $(document);
  $doc.on("click", '[data-weather-action="show-celcius"]', change);
  $doc.on("click", '[data-weather-action="show-fahrenheit"]', change);
  
  function change() {
    const $el = $(this);
    if ($el.hasClass("is-active")) return;
  
    const $actionCelcius = $('[data-weather-action="show-celcius"]');
    const $tempCelcius = $(".is-celsius");
    const $action$tempFahrenheit = $('[data-weather-action="show-fahrenheit"]');
    const $tempFahrenheit = $(".is-fahrenheit");
  
    if ($el.data("weatherAction") == "show-fahrenheit") {
      $tempCelcius.addClass("is-hidden");
      $actionCelcius.removeClass("is-active");
  
      $tempFahrenheit.removeClass("is-hidden");
      $action$tempFahrenheit.addClass("is-active");
    } else {
      $tempFahrenheit.addClass("is-hidden");
      $action$tempFahrenheit.removeClass("is-active");
  
      $tempCelcius.removeClass("is-hidden");
      $actionCelcius.addClass("is-active");
    }
  }