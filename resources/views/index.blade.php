<html>
<title>Firebase Messaging Demo</title>
<style>
    div {
        margin-bottom: 15px;
    }
</style>
<body>
<div id="token"></div>
<div id="msg"></div>
<div id="notis"></div>
<div id="err"></div>
<script src="https://www.gstatic.com/firebasejs/7.15.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.15.1/firebase-messaging.js"></script>

<script>
    MsgElem = document.getElementById("msg");
    TokenElem = document.getElementById("token");
    NotisElem = document.getElementById("notis");
    ErrElem = document.getElementById("err");

    window.onload = function () {

        // Initialize Firebase
        var firebaseConfig = {
            apiKey: "AIzaSyCqzy0MS5uc22Ankb_Io1AquV8Z-xV24KI",
            authDomain: "fcm-test-546ae.firebaseapp.com",
            databaseURL: "https://fcm-test-546ae.firebaseio.com",
            projectId: "fcm-test-546ae",
            storageBucket: "fcm-test-546ae.appspot.com",
            messagingSenderId: "1096314956222",
            appId: "1:1096314956222:web:1ed7e6449304258f"
        };
        firebase.initializeApp(firebaseConfig);

        const messaging = firebase.messaging();

        messaging
            .requestPermission()
            .then(function () {
                MsgElem.innerHTML = "Notification permission granted."
                console.log("Notification permission granted.");

                // get the token in the form of promise
                return messaging.getToken()
            })
            .then(function (token) {
                TokenElem.innerHTML = "token is : " + token;
                // send token to server here
            })
            .catch(function (err) {
                ErrElem.innerHTML = ErrElem.innerHTML + "; " + err
                console.log("Unable to get permission to notify.", err);
            });

        messaging.onMessage(function (payload) {
            console.log("Message received. ", payload);
            NotisElem.innerHTML = NotisElem.innerHTML + JSON.stringify(payload) + "<br />";

            // foreground notifications
            const {title, ...options} = payload.notification;
            navigator.serviceWorker.ready.then(registration => {
                registration.showNotification(title, options);
            });
        });
    }
</script>

</body>

</html>
