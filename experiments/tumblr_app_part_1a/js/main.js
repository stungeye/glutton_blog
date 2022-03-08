// Execute the provided anonymous function when the DOM is ready.
document.addEventListener("DOMContentLoaded", function() {
  var back_button = document.getElementById('back_button');
  // Set the switch_screen callback for the toolbar back button.
  set_click(back_button, function(e) { switch_screen(e.getAttribute('href')); });
  // Bind each of the buttons on the home screen to a switch_screen callback.
  [].forEach.call(document.querySelectorAll("ul.buttons a.switch_screen"), function(el) {
    set_click(el, function(e) { switch_screen(e.getAttribute('href')); });
  });
});