let username = '';
// const sendForm = async (username) => {
//   try {
//     const formData = new FormData();
//     formData.append('username', username);
//     const response = await fetch('//localhost:63342/FIAE-IT-Systemtechnik/bbq-arbeit-3/sessionAjax/sessionAjax/ajax.php', {
//       body: formData,
//       method: 'POST'
//     })
//     return await response.text();
//   } catch (err) {
//     console.log(err);
//   }
// }
//
// const sendRequest = async (username) => {
//   try {
//     const formData = new FormData();
//     formData.append('check', username);
//     const response = await fetch ('//localhost:63342/FIAE-IT-Systemtechnik/bbq-arbeit-3/sessionAjax/sessionAjax/ajax.php', {
//       body: formData,
//       method: 'POST'
//     });
//     return await response.text();
//   } catch (error) {
//     console.log(error);
//   }
// }

const sendUserData = async (username, passwd) => {
  try {
    const formData = new FormData();
    formData.append('passwd', passwd);
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

const btnSubmit = document.getElementById('submit');
const btnSubmit2 = document.getElementById('submit2');
const heading = document.querySelector('.heading');
heading.innerText = 'Login';
btnSubmit.addEventListener('click', async () => {
  console.log('click')
  const user = document.getElementById('username').value;
  const passwd = document.getElementById('password').value;
  const respData = await sendUserData(user, passwd);
  console.log(respData);
  document.querySelector('.form').classList.add('hide');
  let respTxt = '';
  if(respData.name) {
    respTxt = `Du bist ${respData.name} mit der UserId ${respData.id}`;
  } else {
    respTxt = respData;
  }
  heading.innerText = respTxt;
  // document.getElementById('submit2').removeAttribute('hidden');
})

// btnSubmit.addEventListener('click', async () => {
//   console.log('click')
//   const user = document.getElementById('username').value
//   username = await sendForm(user);
//   document.querySelector('.form').setAttribute('hidden', 'true');
//   document.querySelector('.heading').innerText = username;
//   document.getElementById('submit2').removeAttribute('hidden');
// })
//
//
// btnSubmit2.addEventListener('click', async() => {
//   document.querySelector('.heading').innerText = await sendRequest(username);
//   console.log(username);
// })