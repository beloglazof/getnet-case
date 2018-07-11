function changePage (page) {
    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.open("GET", "balance.php?p=" + page, true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            window = this.responseText;
        }
    }
}