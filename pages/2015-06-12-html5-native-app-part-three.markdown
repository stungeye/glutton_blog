This is the third installment of our tutorial on building a native mobile app using web technologies. We have been building a simple photo gallery app using images from the [Tumblr](http://tumblr.com) microblogging service. In part one [we built the user-interface framework](http://mobilehtml5.stungeye.com/2012/03/05/html5-tumblr-mobile-app-part-one), and in part two [we built the touch-enabled photo gallery](http://mobilehtml5.stungeye.com/2012/05/11/html5-tumblr-mobile-app-part-two).

<img src="http://chart.apis.google.com/chart?cht=qr&chs=150x150&choe=UTF-8&chld=L|1&chl=http://goo.gl/vJMcC" alt="http://goo.gl/vJMcC"
class="image_wrap" />

The demo from part two can be [tested using your web browser](http://mobilehtml5.stungeye.com/experiments/tumblr_app/), or by scanning this QR Code with your smartphone. All three menu items are now working, including the "Reading Cats Gallery" which was implemented using the [Photoswipe library](http://www.photoswipe.com/).

**In this post we'll be using [Cordova](https://cordova.apache.org/) to package our project as a native Android app.**

### Game Plan

* Introduction
* Installing Cordova
* Cordova-izing Our App
* Emulating for Android
* Adding Native Functionality
* Adding a Cordova Plugin
* Uploading to the Google Play Store

Things get complicated, so hold on to your cats! I've listed some alternative and potentially simplier approaches in the conclusion.

###Introduction - From PhoneGap to Cordova

This post is three years late. My interest in HTML5 native apps is re-kindling. ;)

In earlier posts I mentioned that we'd be using PhoneGap to convert our [MeowReader HTML5 app](http://mobilehtml5.stungeye.com/experiments/tumblr_app/) into a native app. Since I wrote those earlier posts PhoneGap was purchased by Adobe, with the core technology becoming the open-source [Apache Cordova](https://cordova.apache.org/). Cordova is a framework and API for creating cross-platform native HTML5 apps.

In this post we'll start with the app developed in [part 1](http://mobilehtml5.stungeye.com/2012/03/05/html5-tumblr-mobile-app-part-one) & [part 2](http://mobilehtml5.stungeye.com/2012/05/11/html5-tumblr-mobile-app-part-two) and  we'll compile it into an Android app. Then we'll deploy it to [the Google Play store](https://play.google.com/store/apps/details?id=com.stungeye.meowreader&hl=en). 

If you have an Android device [install the sample MeowReader app now](https://play.google.com/store/apps/details?id=com.stungeye.meowreader&hl=en).


### Installing Cordova

The installation of Cordova will be different depending on your OS. I used a Windows 8 laptop with the Cordova Command Line Interface (CLI). 

Regardless of the OS the following will need to be installed and configured.

  * [Node.js](http://nodejs.org)
  * [Java Development Kit](http://www.oracle.com/technetwork/java/javase/downloads/index.html) (JDK)
  * [Apache Ant](http://ant.apache.org/)
  * [Android Stand-alone SDK Tools](https://developer.android.com/sdk/installing/index.html?pkg=tools)
  * Android SDK Build Tools - Via the Android SDK Manager
  * Target Android API - Via the Android SDK Manager (I targetted API 14, which is Android 4.0 and up.)
  * [Cordova CLI](https://cordova.apache.org/docs/en/5.0.0/guide_cli_index.md.html#The%20Command-Line%20Interface)

OS Specific Installation Instructions:

  * [Cordova on Windows](http://evothings.com/doc/build/cordova-install-windows.html)
  * [Cordova on Windows Walkthrough Video](http://learn.ionicframework.com/videos/windows-android/)
  * [Cordova on OS X](http://evothings.com/doc/build/cordova-install-osx.html)
  * [Cordova on Linux](http://evothings.com/doc/build/cordova-install-linux.html)

###The MeowReader HTML5 App

The app we've been working on is a combination of HTML, CSS and Javascipt files. Since last time, I've upgraded to a newer version of [Photoswipe](http://photoswipe.com/), but the core functionality is the same. The app pulls images from my [Meow Reader Tumblr](http://meow-reader.tumblr.com/) making them available in a swipeable image gallery. 

[The code is available as Open Source on GitHub](https://github.com/stungeye/HTML5-Tumblr-Mobile-App).

###Preparing the App for Cordova

**1)** To create a native Android app the first step is creating a cordova project. From the command line:

    cordova create meowreader com.stungeye.meowreader MeowReader

This will create a skeleton Cordova project in a `meowreader` folder.

**2)** We then add the Cordova Device plugin:

    cordova plugin add org.apache.cordova.device

*Only required if you wish to use the [device api](https://cordova.apache.org/docs/en/3.0.0/cordova_device_device.md.html).*
    
**3)** Place our app files (index.html, css folder, js folder) in to the `meowreader\www` folder. Ensuring that our [index.html](https://github.com/stungeye/HTML5-Tumblr-Mobile-App/blob/master/www/index.html) file includes the following script tag:
  
    <script type="text/javascript" src="cordova.js"></script>
  
###Testing Using an Android Emulator 

**1)** From the command line again, add project support for the Android platform:

    cordova platform add android

You may need to following the [Cordova Android Platform Guide](https://cordova.apache.org/docs/en/4.0.0/guide_platforms_android_index.md.html#Android%20Platform%20Guide) to ensure that all your tooling is properly configured.

**2)** Fill in the core configuration elements in the [config.xml](https://github.com/stungeye/HTML5-Tumblr-Mobile-App/blob/master/config.xml) file found in the project root folder. [Config.xml Documentation](https://cordova.apache.org/docs/en/4.0.0/config_ref_index.md.html#The%20config.xml%20File)

**3)** Test the application using the stock Android emulator:

    cordova emulate android

I prefer to use the [GenyMotion Android Emulator](https://www.genymotion.com/), which needs to be used like this:

    cordova run android --device=device-name

The device name can be found once a GenyMotion emulator is running using:

    adb devices
    
### Adding Some Native Functionality

Our Meow Reader app doesn't require any native functionality, but imagine we wanted to make use of the device's back button. This is something we normally cannot access from an HTML 5 app. In our Javascript setup code we could add the following:

    document.addEventListener("deviceready", onDeviceReady, false);
    
    function onDeviceReady() { 
        document.addEventListener("backbutton", backKeyPressed, false);
    }
    
    function backKeyPressed() {
       console.log("The back key was pressed!");
    }

### Adding a Cordova Plugin

Extra native functional can be added to a Cordova app through plugins.  If, for example, we want our app to be able to detect a network connect we'd install the [Connection Plugin](http://docs.phonegap.com/en/edge/cordova_connection_connection.md.html):

    cordova plugin add cordova-plugin-network-information

Our Javascript can now perform network detections:

    function network_is_present() {
        return navigator.connection.type != Connection.NONE;
    }

*If `navigator.connection` isn't working you may have to apply the Android specific `config.xml` tweaks* [described here](http://docs.phonegap.com/en/edge/cordova_connection_connection.md.html).

Take some time to [explore what's available in the Cordova Plugin Ecosystem](http://plugins.cordova.io/). 

### Google Play Store

Our final task is deployment of our Android application to the [Google Play Store](http://play.google.com). 

**1)** Before you deploy you'll need to produce the [Play Store Required Graphic Assets](https://support.google.com/googleplay/android-developer/answer/1078870), such as app screenshots, app store icons, promo & banner graphics.

**2)** Your app will also require launcher icons. These will be used as the app icon once it has been installed on an Andoird device. 

I built my icons using the [Android Asset Studio Tools](https://romannurik.github.io/AndroidAssetStudio/), placing the generated `mipmap` folders into `meowreader\platforms\android\res` and adjusting the `AndroidManifest.xml` file:

    <application android:hardwareAccelerated="true" android:icon="@mipmap/ic_launcher" android:label="@string/app_name">


**3)** [Android requires that all apps be digitally signed with a certificate before they can be installed](https://developer.android.com/tools/publishing/app-signing.html). Android uses this certificate to identify the author of an app.

I followed [the official instructions on manually creating a keystore/private key](https://developer.android.com/tools/publishing/app-signing.html#signing-manually).

I then added a `ant.properties` file to the `platform\android\` folder:

    key.store=/Users/username/Documents/my-release-key.keystore
    key.alias=meowreader

[Details here](http://ilee.co.uk/Sign-Releases-with-Cordova-Android/).

Don't lose this keystore! [You can't upgrade your app without it](https://stackoverflow.com/questions/4843212/the-apk-must-be-signed-with-the-same-certificates-as-the-previous-version).


**4)** Build the signed application (APK) file from the command line:

    cordova build android --release

**5)** Create a developer account for the Google Play Store and add a new app (with the assets from step 1). Lastly, upload the APK file from step 4 to the APK section of the Play Store app listing.
  
### Conclusion

And so ends part three of our HTML5 native app tutorial. I hope you found it helpful. [Follow me on Twitter](http://twitter.com/stungeye) if you want to hear about future tutorials. Don't forget to [install the demo Meow Reader app from the app store](https://play.google.com/store/apps/details?id=com.stungeye.meowreader&hl=en).

I've described but one way to build a Cordova application, one that depends heavily on command line tools. If you aren't comfortable at the command line you might want to look into [Adobe's PhoneGap Desktop app](http://phonegap.com/blog/2015/03/02/phonegap-app-desktop-0-1-2/) or their paid [PhoneGap build service](https://build.phonegap.com/).

Since deploying the Meow Reader application I developed and deployed a second HTML5 app to the Android store, [the Winnipeg New app](https://play.google.com/store/apps/details?id=com.stungeye.winnipegnews&hl=en). If you live in Winnipeg and are interested in learning more about Cordova, check out the [Winnipeg Android Meetup on June 23, 2015](http://www.meetup.com/Winnipeg-Android/events/221783607/).
