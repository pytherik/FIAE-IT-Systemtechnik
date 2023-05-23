const input = document.getElementById('programmiersprache');


function loadDoc() {
  const answer = input.value;
  const params = `answer=${answer}`;
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("demo").innerHTML = this.responseText;
  }

  xhttp.open("POST", `ajaxPost.php`);
  xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded' );
  xhttp.send(params);
}
