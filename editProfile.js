function editProfile(userData, userEmail) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open("GET", "updateDB.php?q=" + userData + "&email=" + userEmail, true);
  xmlhttp.send();
}