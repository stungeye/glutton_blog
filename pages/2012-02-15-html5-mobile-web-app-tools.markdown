Hi there. I hear that **you want to build native mobile apps using only web technologies.** Me too. Before we begin we need to define our required toolset. For the sake of simplicity, I will assume you are already a proficient HTML/CSS/Javascript developer.

### Phonegap

> "PhoneGap is an HTML5 app platform that allows you to author native applications with web technologies and get access to APIs and app stores. PhoneGap leverages web technologies developers already know best... HTML, [CSS], and JavaScript." -- From the [PhoneGap website](http://phonegap.com/)

<iframe width="526" height="305" src="http://www.youtube.com/embed/E0UV5i5jY50?rel=0" frameborder="0" allowfullscreen></iframe>

PhoneGap allows us to write our applications once and deploy to multiple mobile platforms including Android, iPhone/iPad, Windows Phone 7, Blackberry, WebOS, Symbian, and Bada. It also gives our apps access to [native features](http://phonegap.com/about/features) like the accelerometer, the camera, notifications, and location services to name a few.

Phonegap is free (as in [beer and speech](http://en.wikipedia.org/wiki/Gratis_versus_libre#.22Free_beer.22_vs_.22free_speech.22_distinction)) and can be used under Windows, Linux, and Mac OS X. 

[Download PhoneGap](http://phonegap.com/download-thankyou) and then follow the [Getting Started Tutorial](http://phonegap.com/start) for your intended target device. Alternatively you can use the [PhoneGap Build](https://build.phonegap.com/) service instead of a local install. It's currently free while in beta, but will eventually be a pay for use service.

### HTML5

The markup for our applications will be written in HTML5. If you need a quick HTML5 introduction or review you should head over to [Dive into HTML5](http://diveintohtml5.info/) by Mark Pilgrim.

The base markup we will be using is a stripped down version of the [Mobile HTML5 Boilerplate](http://html5boilerplate.com/mobile). In future posts I will explore what those `meta` elements do, and how the `viewport` one can be tweaked.

~~~
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width">
</head>
<body>
  <div id="container">
    <header>
    </header>
    <div id="main" role="main">
    </div>
    <footer>
    </footer>
  </div>
</body>
</html>
~~~

### CSS3

For our CSS we will also be using the Mobile HTML5 Boilerplate as our starting place. For now we will simply grab the ["reset"](http://www.cssreset.com/what-is-a-css-reset/) portion of [Mobile Boilerplate CSS file](https://github.com/h5bp/mobile-boilerplate/blob/master/css/style.css). When targeting all phone types we will grab the CSS from the top of that file up until the section labeled "primary styles". If you are not planning on developing for Windows Phones you can safely remove all the sections that mention fixes for IE. Doing that, we are left with [this generic mobile CSS reset](https://gist.github.com/1837760).

Before we use any fancy CSS3 properties in our app, we will always check the incredible [When Can I Use](http://caniuse.com/#cats=CSS) resource to see if the phone we are targeting supports the property we wish to use. For Android development, for example, we will ensure that all the CSS3 we use is supported in Android 2.1 and greater.

### Javascript

For our first few apps we will not be using a Javascript framework. We will be writing plain-old Javascript/DOM code. This will keep our code fast and our app size small. If you are a jQuery addict, take a quick look at this [jQuery to Vanilla Javascript](http://sharedfil.es/js-48hIfQE4XK.html) translation guide.

Just like with our CSS, we will check for platform support of new Javascript features using [When Can I Use](http://caniuse.com). A quick visit to this site shows us that for Android development we cannot use the "classList" DOM property shown in the above jQuery to Vanilla Javascript link, unless we are okay with only targeting Android v3+.

There are a number of Javascript frameworks built specifically for mobile development. We will explore a number of these in future blog posts, starting with [Zepto](http://zeptojs.com/) (the webkit-optimized jQuery clone) and [jQTouch](http://jqtouch.com/) a Zepto plugin for mobile web development.

### Emulators

To test your applications you will need a smartphone emulator, especially if you are like me and [you don't actually own a smartphone](http://mobilehtml5.stungeye.com/2012/02/10/the-journey-begins). There are [official simulators and/or emulators](https://github.com/h5bp/mobile-boilerplate/wiki/Mobile-Emulators-%26-Simulators) available for the full suite of mobile web-browsers. However, we want an emulator that includes support for the PhoneGap API. Luckily, a company called tinyHippos (recently acquired by RIM) makes such an emulator. It's called [Ripple](https://bdsc.webapps.blackberry.com/html5/download/ripple). Ripple supports PhoneGap built mobile applications, allows you to emulated GPS and Accelerometer events, and includes a web inspector for debugging purposes.

### What's Next?

In our next blog post we will use these tools to build our very first mobile app and deploy it to the [Android Market](https://market.android.com/?hl=en).