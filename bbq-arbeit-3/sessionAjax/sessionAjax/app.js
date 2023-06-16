const btnSubmit = document.getElementById('submit');
const sendForm = async (username) => {
  try {
    const formData = new FormData();
    formData.append('username', username);
    const response = await fetch('http://localhost:63342/FIAE-IT-Systemtechnik/bbq-arbeit-3/sessionAjax/index.php', {
      body: formData,
      method: 'POST'
    })
    return await response.json();
  } catch (err) {
    console.log(err);
  }
}
if (username === '') {
  btnSubmit.addEventListener('click', () => {
    const user = document.getElementById('username').value
    sendForm(user);
  })
}
