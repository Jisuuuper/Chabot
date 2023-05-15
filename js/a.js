document.getElementById("myEditor").addEventListener("input", function() {
    var content = document.getElementById("myEditor").innerHTML;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "save.php");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("content=" + encodeURIComponent(content));
  });