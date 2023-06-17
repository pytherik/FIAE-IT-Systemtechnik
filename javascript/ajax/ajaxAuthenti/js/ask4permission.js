let user = null; // wird nach Authentifizieren mit Werten gefüllt

document.querySelector('#f1').onsubmit = async function (evt) {

    evt.preventDefault(); // submit verhindern

    let formData = new FormData(this); // alle Daten des Formulars auslesen
    try {
        const response =
            await fetch("http://localhost:63342/ajaxAuthenti/ajax.php",
                {
                    body: formData,
                    method: "post"
                });
        let data = await response.text();
        console.log(data);
        user = JSON.parse(data);
        // user.id = data.id;
        // user.name = data.name;
        //console.log(data);
    } catch (e) {
        console.log(e);
    }

}

document.querySelector('#btn1').addEventListener('click',
    () => document.querySelector('#div1').innerHTML = user.name);

