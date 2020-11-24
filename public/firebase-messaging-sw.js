importScripts('https://www.gstatic.com/firebasejs/7.15.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.15.1/firebase-messaging.js');

// Initialize the Firebase app in the service worker by passing in the
// messagingSenderId.
firebase.initializeApp({
    apiKey: "AIzaSyCqzy0MS5uc22Ankb_Io1AquV8Z-xV24KI",
    authDomain: "fcm-test-546ae.firebaseapp.com",
    databaseURL: "https://fcm-test-546ae.firebaseio.com",
    projectId: "fcm-test-546ae",
    storageBucket: "fcm-test-546ae.appspot.com",
    messagingSenderId: "1096314956222",
    appId: "1:1096314956222:web:1ed7e6449304258f"
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();

// If you would like to customize notifications that are received in the
// background (Web app is closed or not in browser focus) then you should
// implement this optional method.
// [START background_handler]

messaging.setBackgroundMessageHandler(function (payload) {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);
    // Customize notification here
    const {title, ...options} = payload.notification;

    return self.registration.showNotification(title, options);
});
// [END background_handler]

