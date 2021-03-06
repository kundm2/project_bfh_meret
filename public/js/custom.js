/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";


$( document ).ready(function() {

    // Scroll to next question
    $("[name^=question]").each( function() {
        $(this).on( "click", function() {
            var num = parseInt($( this ).attr('id').replace(/\D/g,'')) + 1;
            var position = $('#question-block' + num).offset().top - 25;

            $("body, html").animate({
                scrollTop: position
            }, 800 );
        });
    });


    if($("#searchInstitution"). length){
        $('input:radio[name="selectedInstitution"]').change( function() {
            iM.filterMap( $(this).val() )
        });
        $('#searchInstitution').change(function() {
            iM.searchMap( $( this ).val() );
        });
        $('#searchInstitutionBtn').click(function() {
            iM.searchMap( $('#searchInstitution').val() );
        });
    };

    if ($('.services-card')) {
        $('.services-card').click(function() {
            $('.card-body', this).toggle(100);
        });
        $('#filterServiceSelect').change(function() {
            if ($( this ).val() == -1) {
                $('.services-cards .card').show();
            } else {
                $('.services-cards .card').hide();
                $('.services-cards .cat-' +$( this ).val()).show();
            }
        });
        $('#searchService').on('keyup', function () {
            var value = this.value;
            $('.services-cards .card h4').parent().parent().hide().each(function () {
                if ($(this).text().search(value) > -1) {
                    $(this).show();
                }
            });
        });
    }

    $('#searchPostcode').change(function() {
        $('#city').val(  cap.getCityByPostcode( $( this ).val() ) ) ;
    });

});

function institutesMap(element, institutes, lat, lon, zoom) {
    var baseurl = window.location.origin + '/';
    var element = element;
    var institutes = institutes;
    var hospitalIcon = new L.icon({ iconUrl: baseurl + "img/markers/hospital.png", iconSize: [38, 44], iconAnchor: [19, 45], popupAnchor:  [0, -40] });
    var drugIcon = new L.icon({ iconUrl: baseurl + "img/markers/drugstore.png", iconSize: [38, 44], iconAnchor: [19, 45], popupAnchor:  [0, -40] });
    var pharmacieIcon = new L.icon({ iconUrl: baseurl + "img/markers/pharmacy.png", iconSize: [38, 44], iconAnchor: [19, 45], popupAnchor:  [0, -40] });
    var emsIcon = new L.icon({ iconUrl: baseurl + "img/markers/ems.png", iconSize: [38, 44], iconAnchor: [19, 45], popupAnchor:  [0, -40] });
    var defaultIcon = new L.icon({ iconUrl: baseurl + "img/markers/default.png", iconSize: [38, 44], iconAnchor: [19, 45], popupAnchor:  [0, -40] });
    var map;

    this.initMap = function (lat, lon, zoom) {
        this.renderMap(lat, lon, zoom, institutes);
    }

    this.renderMap = function (lat, lon, zoom, places) {
        map = new L.map(element).setView([lat, lon], zoom);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
        places.forEach(place => {
            switch (place.type) {
                case "Hôpitaux":
                    L.marker([place.lat, place.lon], {icon: hospitalIcon}).addTo(map).bindPopup(templateInstituteHTML(place));
                    break;
                case "Droguerie":
                    L.marker([place.lat, place.lon], {icon: drugIcon}).addTo(map).bindPopup(templateInstituteHTML(place));
                    break;
                case "Pharmacie":
                    L.marker([place.lat, place.lon], {icon: pharmacieIcon}).addTo(map).bindPopup(templateInstituteHTML(place));
                    break;
                case "EMS":
                    L.marker([place.lat, place.lon], {icon: emsIcon}).addTo(map).bindPopup(templateInstituteHTML(place));
                    break;
                default:
                    L.marker([place.lat, place.lon], {icon: defaultIcon}).addTo(map).bindPopup(templateInstituteHTML(place));
                    break;
            }
        });
    }

    this.filterMap = function (type) {
        map.remove();
        switch (type) {
            case 'hospital': type = "Hôpitaux"; break;
            case 'drugstore': type = "Droguerie"; break;
            case 'pharmacie': type = "Pharmacie"; break;
            case 'ems': type = "EMS"; break;
            default: type = ""; break;
        }
        if (type == "") {
            this.initMap(this.getLat(), this.getLon(), this.getZoom());
        }
        else {
            var filteredInstitutes = $.grep( institutes , function( n, i ) {
                return n.type===type;
            });
            this.renderMap(this.getLat(), this.getLon(), this.getZoom(), filteredInstitutes);
        }
    }

    this.searchMap = function (search) {
        map.remove();
        var searchedInstitutes = $.grep( institutes , function( n, i ) {
            return (n.company.match(new RegExp(search, 'i'))) || (n.city.match(new RegExp(search, 'i'))) || (n.type.match(new RegExp(search, 'i'))) || (n.address.match(new RegExp(search, 'i'))) || n.postcode == parseInt(search);
        });
        this.renderMap(this.getLat(), this.getLon(), this.getZoom(), searchedInstitutes);
    }

    this.getZoom = function () { return map.getZoom() }
    this.getLat = function () { return map.getCenter().lat }
    this.getLon = function () { return map.getCenter().lng }

    this.initMap(lat, lon, zoom);
}

function citiesAndPostcodes(cities) {
    var cities = cities;

    this.getCityByPostcode = function (postcode) {
        var searchedCitites = $.grep( cities , function( n, i ) {
            return n.postcode==postcode;
        });
        if (searchedCitites === undefined || searchedCitites.length == 0)
            return '';
        else
            return searchedCitites[0].city;
    }
}

function templateInstituteHTML(institute) {
    var retVal = '<b>' + institute.company + '</b><br>';
    retVal += institute.postcode + ' '  + institute.city + '<br>';
    retVal += '<a href="' + window.location.origin + '/institutes/' + institute.id + '">Plus</a>'
    return retVal;
}
