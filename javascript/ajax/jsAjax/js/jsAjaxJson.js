const input = document.getElementById('programmiersprache');


function loadDoc() {
  const answer = input.value;

  const params = {answer: `${answer}`};
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("demo").innerHTML = this.responseText;
  }

  xhttp.open("POST", `ajaxJson.php`);
  xhttp.setRequestHeader('Content-Type', 'application/json' );
  xhttp.send(JSON.stringify(params));
}
