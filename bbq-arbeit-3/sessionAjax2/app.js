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
const btnSubmit = document.getElementById('submit');
btnSubmit.addEventListener('click', async () => {
  const user = document.getElementById('username').value
  const username = await sendForm(user);
  console.log(username, 'username');
  document.querySelector('.form').setAttribute('hidden', 'true');
  document.querySelector('.heading').innerText = username;
})
