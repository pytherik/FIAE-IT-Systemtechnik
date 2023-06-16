const sendForm = async (username) => {
  try {
    const formData = new FormData();
    formData.append('username', username);
    const response = await fetch('//localhost:63342/FIAE-IT-Systemtechnik/bbq-arbeit-3/sessionAjax/sessionAjax/ajax.php', {
      body: formData,
      method: 'POST'
    })
    return await response.json();
  } catch (err) {
    console.log(err);
  }
}
if (username === '') {
  const btnSubmit = document.getElementById('submit');
  btnSubmit.addEventListener('click', async () => {
    console.log('click')
    const user = document.getElementById('username').value
    let username = await sendForm(user);
    document.querySelector('.form').setAttribute('hidden', 'true');
    document.querySelector('.heading').innerText = username;
    document.getElementById('submit2').removeAttribute('hidden');
  })
}
