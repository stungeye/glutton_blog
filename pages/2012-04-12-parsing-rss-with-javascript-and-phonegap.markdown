I just released an [RSS news reader app](https://market.android.com/details?id=com.stungeye.winnipegnews) built with HTML5 and Phonegap. During the development of the app I encountered the following three problems when loading RSS feeds using the Javascript XMLHttpRequest object:

1. Certain RSS feeds were being sent out without an XML MIME type, causing Javascript to interpret them as text.

2. Some servers were detecting the AJAX RSS requests as coming from a mobile browser and redirecting to a mobile friendly HTML page.

3. When testing outside of PhoneGap I needed a proxy script to fetch the feeds to overcome the browser's cross-domain restrictions.

###Overriding Incorrect MIME Types

The XMLHttpRequest object has an `overrideMimeType` function that can be used to override a requested documents MIME type. Here's an example of a simple AJAX call where the MIME type is being forced to text/xml.

~~~
var xhr      = new XMLHttpRequest(),
    feed_url = 'http://some.madeupdomain.ca/feed.xml';

xhr.onerror = function() {
  alert('Error loading the RSS document.');
};

xhr.onload = function() {
  var xml   = xhr.responseXML.documentElement,
      items = xml.getElementsByTagName('item'),
      title = items[0].querySelector('title').firstChild.data;
  alert('The first item title: ' + title);
};

xhr.open('GET', feed_url);
xhr.responseType = 'document';
xhr.overrideMimeType('text/xml');
xhr.send();
~~~

###Fooling Mobile Browser Redirections

Certain web-servers will perform a blanket mobile-device redirect, no matter what document you are trying to load. I found a few news sites that redirected me to a mobile landing page when I tried to use XMLHttpRequest to load their RSS feed. Most mobile redirects of this nature are triggered by [User Agent sniffing](http://en.wikipedia.org/wiki/User_agent#User_agent_sniffing), so I needed some way to have my application self-identify as a non-mobile browser.

PhoneGap doesn't allow us to spoof the User-Agent using Javascript. Instead I had to modify the wrapper application. Here are the required modifications to the main .java file for an Android PhoneGap application. I imagine that the WebView of an iOS PhoneGap Objective-C wrapper app could be similarily modified.

~~~
package com.yourdomain.feedtest;

import org.apache.cordova.DroidGap;
import android.os.Bundle;
import android.webkit.WebSettings; // Added.

public class FeedTestActivity extends DroidGap {
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        super.loadUrl("file:///android_asset/www/index.html");
        // Added the following two lines to spoof the user-agent to self-identify as a non-mobile browser.
        WebSettings w = this.appView.getSettings();      
        w.setUserAgentString("Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.1 (KHTML, like Gecko) Chrome/14.0.835.202 Safari/535.1");
    }
}
~~~

###Testing in the Browser Using a Proxy

When I was working on my app I did most of the initial testing using my desktop browser. The only problem is that unlike PhoneGap, browsers do not let you make cross-domain AJAX request. To overcome this I built a simple PHP proxy script that I placed on the same server as my HTML5 mobile app. I then routed all my AJAX calls through this script.

~~~
<?php
  header('Content-type: application/xml');
  $file = file_get_contents($_GET['url']);
  $file = preg_replace('/\s+/',' ', $file); // Replace repeated whitespace with single spaces.
  echo $file;
?>
~~~

With this script present in the same folder as my HTML5 web app, I could make cross-domain AJAX request like this:

~~~
var xhr       = new XMLHttpRequest(),
    feed_url  = 'http://some.madeupdomain.ca/feed.xml',
    proxy_url = 'proxy.php?url=';
/* Omitting the xhr.onerror and xhr.onload callbacks. */
xhr.open('GET', proxy_url + feed_url);
xhr.responseType = 'document';
xhr.send();
~~~

**P.S.** Part two of my [HTML5 Mobile Tumblr App post](http://mobilehtml5.stungeye.com/2012/03/05/html5-tumblr-mobile-app-part-one) is coming soon.