

// When the DOM is ready we need to set up our various click events.
document.addEventListener("DOMContentLoaded", function() {
  var main_division   = document.getElementById('main'),
      back_button     = document.getElementById('back_button'),
      button_list     = document.querySelector('ul.buttons'),
      about_li        = document.querySelector('ul.buttons li'),
      i, li, a;
      
  for (i = 0; i < feeds.length; i++) {
    li = document.createElement('li');
    a  = document.createElement('a');
    a.setAttribute('href','#feed');
    a.setAttribute('class','switch_feed');
    a.setAttribute('data-feed-num',i);
    a.innerHTML = feeds[i].name;
    li.appendChild(a);
    button_list.insertBefore(li, about_li);
  }
  
  // Set the switch_screen callback for the toolbar back button.
  set_click(back_button, function(e) { switch_screen(e.getAttribute('href'), 'Winnipeg News'); });
  
  // Bind each of the switch_screen buttons on the home screen to a switch_screen callback.
  [].forEach.call(document.querySelectorAll("ul.buttons a.switch_screen"), function(el) {
    set_click(el, function(e) { switch_screen(e.getAttribute('href'), e.innerHTML); });
  });
  
  // Bind each of the switch_feed buttons on the home screen to a switch_screen callback.
  [].forEach.call(document.querySelectorAll("ul.buttons a.switch_feed"), function(el) {
    set_click(el, function(e) {
      switch_screen(e.getAttribute('href'), e.innerHTML);
      if (network_enabled()) {
        load_feed(feeds, e.getAttribute('data-feed-num'));
      } else {
        no_network_screen(e.getAttribute('href'));  
      }
    });
  });
  
});

function no_network_screen(id) {
  var screen = document.getElementById(id);
  img = document.create('img');
  img.setAttribute('src','no_connection_w300.png');
  img.setAttribute('class','no_connection');
  screen.innerHTML = '';
  screen.appendChild(img);
}

function network_enabled() {
  return true;
  var network_state = navigator.network.connection.type;
  return (network_state != Connection.NONE);
}
