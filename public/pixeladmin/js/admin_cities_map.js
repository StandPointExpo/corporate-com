
ymaps.ready(init);
var citiesMap,cityPlacemark;

function init() {
    var center = [55.753994, 37.622093];
    if ( typeof mapCenterCoordinates !== "undefined" )
        center = mapCenterCoordinates;

    citiesMap = new ymaps.Map('address-map', {
            center: center,
            zoom: 9
        }, {
            searchControlProvider: 'yandex#search'
        });

    cityPlacemark = createPlacemark(center);
    citiesMap.geoObjects.add(cityPlacemark);
    // Слушаем событие окончания перетаскивания на метке.
    cityPlacemark.events.add('dragend', function () {
        getAddress(cityPlacemark.geometry.getCoordinates());
    });

    // Слушаем клик на карте.
    citiesMap.events.add('click', function (e) {
        var coords = e.get('coords');

        // Если метка уже создана – просто передвигаем ее.
        if (cityPlacemark) {
            cityPlacemark.geometry.setCoordinates(coords);
        }
        getAddress(coords);
    });

    // Создание метки.
    function createPlacemark(coords) {
        return new ymaps.Placemark(coords, {
            iconCaption: ''
        }, {
            preset: 'islands#violetDotIconWithCaption',
            draggable: true
        });
    }

    // Определяем адрес по координатам (обратное геокодирование).
    function getAddress(coords) {
        cityPlacemark.properties.set('iconCaption', 'поиск...');
        ymaps.geocode(coords).then(function (res) {
            var firstGeoObject = res.geoObjects.get(0);
            var localities = firstGeoObject.getLocalities();
            var city = localities[0] || firstGeoObject.getAdministrativeAreas().join(', ');

            $('#entity-address').val(city);
            $('#entity-coordinate').val(coords);

            cityPlacemark.properties
                .set({
                    // Формируем строку с данными об объекте.
                    iconCaption: [
                        // Название населенного пункта или вышестоящее административно-территориальное образование.
                        firstGeoObject.getLocalities().length ? firstGeoObject.getLocalities() : firstGeoObject.getAdministrativeAreas(),
                        // Получаем путь до топонима, если метод вернул null, запрашиваем наименование здания.
                        firstGeoObject.getThoroughfare() || firstGeoObject.getPremise()
                    ].filter(Boolean).join(', '),
                    // В качестве контента балуна задаем строку с адресом объекта.
                    balloonContent:city
                });
        });
    }
}

$('#entity-address').change(function (e){
    setCityFromText(e.target.value);
});

function setCityFromText(address){
    ymaps.geocode(address).then(function (res) {
        var firstGeoObject = res.geoObjects.get(0);
        var localities = firstGeoObject.getLocalities();
        var city = localities[0] || firstGeoObject.getAdministrativeAreas().join(', ');
        var coords = firstGeoObject.geometry.getCoordinates();

        $('#entity-coordinate').val(coords);
        citiesMap.setCenter(coords);

        if (cityPlacemark) {
            cityPlacemark.geometry.setCoordinates(coords);
        }
        cityPlacemark.properties
            .set({
                // Формируем строку с данными об объекте.
                iconCaption: [
                    // Название населенного пункта или вышестоящее административно-территориальное образование.
                    firstGeoObject.getLocalities().length ? firstGeoObject.getLocalities() : firstGeoObject.getAdministrativeAreas(),
                    // Получаем путь до топонима, если метод вернул null, запрашиваем наименование здания.
                    firstGeoObject.getThoroughfare() || firstGeoObject.getPremise()
                ].filter(Boolean).join(', '),
                // В качестве контента балуна задаем строку с адресом объекта.
                balloonContent:city
            });

    });
}