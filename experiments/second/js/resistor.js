"use strict";

var resistance_value, band_elements, visual_bands;

document.addEventListener('DOMContentLoaded', function () {
    resistance_value = document.getElementById('resistance');
    band_elements = [];
    band_elements[0] = document.getElementById('band_1');
    band_elements[1] = document.getElementById('band_2');
    band_elements[2] = document.getElementById('band_3');
    visual_bands = [];
    visual_bands[0] = document.getElementById('b1');
    visual_bands[1] = document.getElementById('b2');
    visual_bands[2] = document.getElementById('b3');
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

function calculate_resistance() {
    var bands = [],
        show_resistance = true,
        selected_index,
        selected_option,
        selected_class,
        i,
        resistance,
        multiplier;

    for (i = 0; i < band_elements.length; i++) {
        bands[i] = band_elements[i].value;
        if (bands[i] !== 'n') {
            selected_index = band_elements[i].selectedIndex;
            selected_option = band_elements[i].options[selected_index];
            selected_class = selected_option.classList[0];
            visual_bands[i].className = selected_class;
        } else {
            show_resistance = false;
        }
    }

    if (!show_resistance) {
        resistance_value.innerHTML = 'Please select a colour for all bands.';
    } else {
        resistance  = parseInt(bands[0] + bands[1], 10);
        multiplier  = parseInt(bands[2], 10);
        resistance *= Math.pow(10, multiplier);
        resistance_value.innerHTML = format_units(resistance);
    }
}
