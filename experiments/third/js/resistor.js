"use strict";

var resistance_value,
    band_elements,
    visual_bands,
    tolerances = {
        1 : '1',
        2 : '2',
        5 : '0.5',
        6 : '0.25',
        7 : '0.1',
        8 : '0.05',
        10: '5',
        11: '10'
    };

document.addEventListener('DOMContentLoaded', function () {
    var setup = { 'three_bands' : 3, 'four_bands' : 4},
        section,
        i;

    resistance_value = {};
    band_elements = {};
    visual_bands = {};

    for (section in setup) {
        resistance_value[section] = document.querySelector('#' + section + ' .resistance');
        band_elements[section] = [];
        visual_bands[section] = [];
        for (i = 0; i < setup[section]; i++) {
            band_elements[section][i] = document.querySelector('#' + section + ' .band_' + (i + 1));
            visual_bands[section][i] = document.querySelector('#' + section + ' .b' + (i + 1));
        }
    }
});

function format_units(ohmage) {
    var formatted = "";
    if (ohmage >= 1e6) {
        ohmage /= 1e6;
        formatted += ohmage + " M";
    } else {
        if (ohmage >= 1e3) {
            ohmage /= 1e3;
            formatted += ohmage + " K";
        } else {
            formatted += ohmage + " ";
        }
    }
    return formatted + "&#8486;";
}

function calculate_resistance(section_id) {
    var bands = [],
        show_resistance = true,
        selected_index,
        selected_option,
        selected_class,
        i,
        resistance,
        multiplier,
        tolerance;

    for (i = 0; i < band_elements[section_id].length; i++) {
        bands[i] = band_elements[section_id][i].value;
        if (bands[i] !== 'n') {
            selected_index = band_elements[section_id][i].selectedIndex;
            selected_option = band_elements[section_id][i].options[selected_index];
            selected_class = selected_option.classList[0];
            visual_bands[section_id][i].className = selected_class;
        } else {
            show_resistance = false;
        }
    }

    if (!show_resistance) {
        resistance_value[section_id].innerHTML = 'Please select a colour for all bands.';
    } else {
        resistance  = parseInt(bands[0] + bands[1], 10);
        multiplier  = parseInt(bands[2], 10);
        resistance *= Math.pow(10, multiplier);
        if (bands.length === 4) {
            tolerance = " &plusmn;" + tolerances[bands[3]] + "%";
        } else {
            tolerance = "";
        }
        resistance_value[section_id].innerHTML = format_units(resistance) + tolerance;
    }
}
