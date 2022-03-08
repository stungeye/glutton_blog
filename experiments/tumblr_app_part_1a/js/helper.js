// Hide any DOM element by adding the CSS class "hidden",
// unless the class is already present.
function hide(el) {
  if (el.className.indexOf('hidden') === -1) {
    el.className+= ' hidden';
  }
}

// Unhide any DOM element that was previously hidden using
// the CSS class "hidden".
function show(el) {
  el.className = el.className.replace(/ ?hidden/gi, '');
}

// Hide all div.screen elements and then show the div with
// the requested id.
function switch_screen(id) {
  // Remove the hash sign from the start of the id.
  id = id.substring(1);
  
  var current_screen = document.getElementById(id),
      back_button = document.getElementById('back_button');
      
  // Find all div.screen elements and hide them.
  [].forEach.call(document.querySelectorAll("div.screen"), function(el) {
    hide(el);
  });
  
  show(current_screen);
  
  if (id !== "home") {
    show(back_button);
  } else {
    hide(back_button);
  }
}

// Helper function the simplify setting click events on elements.
// The callback_fnc provided should be defined with one parameter,
// which will be set to the clicked element when executed.
function set_click(el, callback_fnc) {
  el.addEventListener('click', function(event) {
    // Supress the default click action of links.
    event.preventDefault();
    callback_fnc(el); // Hand off the element in case it's required in our callback.
  }, false);
}
