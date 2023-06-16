const fName = document.getElementById('firstname');
const lName = document.getElementById('lastname');
const out = document.getElementById('out');
const send = document.getElementById('send');
const sendFormData = async () => {
  try {
    const formData = new FormData();
    formData.append('fName', fName.value)
    formData.append('lName', lName.value)
    const response = await fetch('//localhost:63342/FIAE-IT-Systemtechnik/javascript/ajax/ajaxAsync/ajax.php',
      {
        body: formData,
        method: 'POST'
      });
    const result = await response.text();
    out.innerText = result;
  } catch (err) {
    out.innerText = err;
  }
}

send.addEventListener('click', () => sendFormData())