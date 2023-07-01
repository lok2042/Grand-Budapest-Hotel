function changeMenu(menu_id) {
    if (menu_id == "") {
      return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("menu").innerHTML = this.responseText;
      }
    }
    xmlhttp.open("GET", "includes/changeMenu.php?q="+menu_id, true);
    xmlhttp.send();
}
  
  