'use strict';

var editProfile = function editProfile(userData, userEmail) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open('GET', '../components/updateDB.php?q= + ' + userData + ' + &email= + ' + userEmail, true);
  xmlhttp.send();
};