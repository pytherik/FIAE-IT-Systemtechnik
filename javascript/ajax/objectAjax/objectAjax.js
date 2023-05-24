const btn1 = document.getElementById('btn1');
const id1 = document.getElementById('id1');
const id2 = document.getElementById('id2');

class User {
  constructor(name) {
    this.name = name;
    const date = new Date();
    const h = `0${date.getHours()}`.slice(-2);
    const m = `0${date.getMinutes()}`.slice(-2);
    const s = `0${date.getSeconds()}`.slice(-2);
    this.time = `${h}:${m}:${s}`;
    console.log(this);
  }
}

function loadDoc(user) {
  const xhr = new XMLHttpRequest();
  xhr.onload = function() {
    const data = JSON.parse(this.responseText);
    id2.innerHTML = `${data.name} um ${data.time}`;
  }

  xhr.open("POST", `objectAjax.php`);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded' );
  xhr.send(`user=${JSON.stringify(user)}`);
}


const sendAjax = () => {
  let name = id1.innerHTML;
  const user = new User(name);
  loadDoc(user);
}

btn1.addEventListener('click', sendAjax)