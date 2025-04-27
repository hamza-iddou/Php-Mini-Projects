function filterPosts(str) {
    if (str == -1) {
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("posts").innerHTML = this.responseText;
        }
      };
      xmlhttp.open('GET', 'index.php?q=' + str, true);
      xmlhttp.send();
    }
  }