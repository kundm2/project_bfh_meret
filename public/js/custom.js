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
            var lat = iM.getLat();
            var lon = iM.getLon();
            var zoom = iM.getZoom();
            iM.filterMap(lat, lon, zoom, $(this).val())
        });
        $('#searchInstitution').change(function() {
            iM.searchMap( $( this ).val() );
        });
        $('#searchInstitutionBtn').click(function() {
            iM.searchMap( $('#searchInstitution').val() );
        });
    };

    $('#searchPostcode').change(function() {
        $('#city').val(  cap.getCityByPostcode( $( this ).val() ) ) ;
    });

});

function institutesMap(element, institutes) {
    var element = element;
    var institutes = institutes;
    var hospitalIcon = new L.icon({ iconUrl: "img/markers/hospital.png", iconSize: [47, 44], iconAnchor: [24, 45], popupAnchor:  [0, -40] });
    var drugIcon = new L.icon({ iconUrl: "img/markers/drugstore.png", iconSize: [47, 44], iconAnchor: [24, 45], popupAnchor:  [0, -40] });
    var pharmacieIcon = new L.icon({ iconUrl: "img/markers/pharmacy.png", iconSize: [47, 44], iconAnchor: [24, 45], popupAnchor:  [0, -40] });
    var emsIcon = new L.icon({ iconUrl: "img/markers/ems.png", iconSize: [47, 44], iconAnchor: [24, 45], popupAnchor:  [0, -40] });
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
                    L.marker([place.lat, place.lon], {icon: hospitalIcon}).addTo(map).bindPopup('<b>' + place.company + '</b><br>');
                    break;
                case "Droguerie":
                    L.marker([place.lat, place.lon], {icon: drugIcon}).addTo(map).bindPopup('<b>' + place.company + '</b><br>');
                    break;
                case "Pharmacie":
                    L.marker([place.lat, place.lon], {icon: pharmacieIcon}).addTo(map).bindPopup('<b>' + place.company + '</b><br>');
                    break;
                case "EMS":
                    L.marker([place.lat, place.lon], {icon: emsIcon}).addTo(map).bindPopup('<b>' + place.company + '</b><br>');
                    break;

                default:
                    L.marker([place.lat, place.lon]).addTo(map).bindPopup(templateInstituteHTML(place));
                    break;
            }
        });
    }

    this.filterMap = function (lat, lon, zoom, type) {
        switch (type) {
            case 'hospital': type = "Hôpitaux"; break;
            case 'drugstore': type = "Droguerie"; break;
            case 'pharmacie': type = "Pharmacie"; break;
            case 'ems': type = "EMS"; break;
            default: type = ""; break;
        }
        if (type == "") {
            this.removeMap();
            this.initMap(lat, lon, zoom);
        }
        else {
            var filteredInstitutes = $.grep( institutes , function( n, i ) {
                return n.type===type;
            });
            this.removeMap();
            this.renderMap(lat, lon, zoom, filteredInstitutes);
        }
    }

    this.searchMap = function (search) {
        this.removeMap();
        var searchedInstitutes = $.grep( institutes , function( n, i ) {
            return (n.company.match(new RegExp(search, 'i'))) || (n.city.match(new RegExp(search, 'i'))) || (n.type.match(new RegExp(search, 'i'))) || (n.address.match(new RegExp(search, 'i'))) || n.postcode == parseInt(search);
        });
        this.renderMap(this.getLat(), this.getLon(), this.getZoom(), searchedInstitutes);
    }

    this.removeMap = function () {
        map.remove();
    }

    this.getZoom = function () { return map.getZoom() }
    this.getLat = function () { return map.getCenter().lat }
    this.getLon = function () { return map.getCenter().lng  }
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
