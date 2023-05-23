const input = document.getElementById('programmiersprache');


function loadDoc() {
  const answer = input.value;
  const xhttp = new XMLHttpRequest();
    // xhttp.onload = function() {
    //   document.getElementById("demo").innerHTML = this.responseText;
    // }

  xhttp.onreadystatechange = function() {
    console.log(this.readyState);
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML =
        this.responseText;
    }
  };
  xhttp.open("GET", `ajaxGet.php?answer=${answer}`);
  xhttp.send();
}
