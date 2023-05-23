const zahl1 = document.getElementById('zahl1');
const zahl2 = document.getElementById('zahl2');
const operators = document.querySelectorAll('.operator');
const output = document.getElementById('output');

function loadDoc(op) {
  const z1 = zahl1.value;
  const z2 = zahl2.value;
  const operator = op;
  const params = `zahl1=${z1}&zahl2=${z2}&operator=${op}`;
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    output.innerHTML = this.responseText;
  }

  xhttp.open("POST", `calcAjax.php`);
  xhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded' );
  xhttp.send(params);
}

operators.forEach((op) => {
  op.addEventListener('click', () => loadDoc(op.dataset.op));
})