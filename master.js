const publicKey = 'BGez2V2iHFmCI33TTm5yIfkVX575lvUcXmJjpANGhVL7LuxmOlk76jNYpncUUdmKUoWb08obm2cbilon3bspjr0';

navigator.serviceWorker && navigator.serviceWorker.register('sw.js').then(function(registration) {
  console.log('Excellent, registered with scope: ', registration.scope);
});
navigator.serviceWorker && navigator.serviceWorker.ready.then(function(serviceWorkerRegistration) {
  serviceWorkerRegistration.pushManager.getSubscription()
    .then(function(subscription) {
      if (subscription) {
        console.info('Got existing', subscription);
        window.subscription = subscription;
        return;  // got one, yay
      }

      const applicationServerKey = urlBase64ToUint8Array(publicKey);
      serviceWorkerRegistration.pushManager.subscribe({
          userVisibleOnly: true,
          applicationServerKey,
      })
        .then(function(subscription) {
          console.info('Newly subscribed to push!', subscription);
          window.subscription = subscription;
        });
    });
});

function validate(id) {
    var x = document.getElementById('b1').value;
    if (x == "Book Now") {

        document.getElementById('b1').innerHTML="Booked";
        document.getElementById('b1').value="Booked";
        document.getElementById('lot1').style.backgroundColor = "red";
        document.getElementById('b2').style.display="inline";
        document.getElementById('b3').style.display="inline";
        document.getElementById("p1").innerHTML="Booked";
      // obj = {"status":"Booked" };
      // dbParam = JSON.stringify(obj);

//       xmlhttp = new XMLHttpRequest();
//       xmlhttp.onreadystatechange = function() {
//           if (this.readyState == 4 && this.status == 200) {
//               // document.getElementById("demo").innerHTML = this.responseText;
//           }
//       };
//       xmlhttp.open("GET", "demo.php?x=" + dbParam, true);
//       xmlhttp.send();
// var dataString = JSON.stringify(obj);
// console.log(dataString);

$.ajax({
   url: 'status.php',
   data: {"booked": true,"id":id},
   type: 'POST',
   success: function(response) {
      alert(response);
      console.log(response);
   }
});

    }else if (x == 'Booked') {
      document.getElementById('b1').innerHTML="Book Now";
      document.getElementById('b1').value="Book Now";
      document.getElementById('b2').style.display="none";
      document.getElementById('b3').style.display="none";
      document.getElementById("p1").innerHTML="Free";
    }


}

function park(id) {
  document.getElementById("p1").innerHTML="Parked"
  $.ajax({
     url: 'status.php',
     data: {"park": true,"id":id},
     type: 'POST',
     success: function(response) {
        alert(response);
         console.log(response);
     }
  });
}

function makeFree(id) {
  // document.getElementById("p1").innerHTML="Free";
  // document.getElementById('b1').innerHTML="Book Now";
  // document.getElementById('b1').value="Book Now";
  // document.getElementById('lot1').style.backgroundColor = "#1AF312";
  // document.getElementById('b2').style.visibility="hidden";
  // document.getElementById('b3').style.visibility="hidden";
  location.reload();

  $.ajax({
     url: 'status.php',
     data: {"remove": true,"id":id},
     type: 'POST',
     success: function(response) {
        alert(response);
        console.log(response);
     }
  });
}

function urlBase64ToUint8Array(base64String) {
    var padding = '='.repeat((4 - base64String.length % 4) % 4);
    var base64 = (base64String + padding)
        .replace(/\-/g, '+')
        .replace(/_/g, '/');

    var rawData = window.atob(base64);
    var outputArray = new Uint8Array(rawData.length);

    for (var i = 0; i < rawData.length; ++i) {
        outputArray[i] = rawData.charCodeAt(i);
    }
    return outputArray;
}

function validate1(id) {
    var x = document.getElementById('b4').value;
    if (x == "Book Now") {

        document.getElementById('b4').innerHTML="Booked";
        document.getElementById('b4').value="Booked";
        document.getElementById('lot2').style.backgroundColor = "red";
        document.getElementById('b5').style.display="inline";
        document.getElementById('b6').style.display="inline";
        document.getElementById("p2").innerHTML="Booked";


$.ajax({
   url: 'status.php',
   data: {"booked": true,"id":id},
   type: 'POST',
   success: function(response) {
      alert(response);
      console.log(response);
   }
});

    }else if (x == 'Booked') {
      document.getElementById('b4').innerHTML="Book Now";
      document.getElementById('b4').value="Book Now";
      document.getElementById('b5').style.display="none";
      document.getElementById('b6').style.display="none";
      document.getElementById("p2").innerHTML="Free";
    }


}

function park1(id) {
  document.getElementById("p2").innerHTML="Parked"
  $.ajax({
     url: 'status.php',
     data: {"park": true,"id":id},
     type: 'POST',
     success: function(response) {
        alert(response);
         console.log(response);
     }
  });
}

function makeFree1(id) {

  location.reload();

  $.ajax({
     url: 'status.php',
     data: {"remove": true,"id":id},
     type: 'POST',
     success: function(response) {
        alert(response);
        console.log(response);
     }
  });
}