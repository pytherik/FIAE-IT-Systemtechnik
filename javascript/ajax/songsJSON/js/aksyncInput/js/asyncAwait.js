const fetchData2 = async () => {
    console.log('hehhe')
    const vorname=document.getElementById('vorname').value;
    const nachname=document.getElementById('nachname').value;
    console.log(vorname);
    console.log(nachname);
    try {
        // Build formData object.
        let formData = new FormData();
        formData.append('vorname', `${vorname}`);
        formData.append('nachname', `${nachname}`);
        const response =
            await fetch("http://localhost:63342/asyncInput/ajaxName.php",
                {
                    body: formData,
                    method: "post"
                });
        let data = await response.text();
        console.log(data);
        // und als Ausgabe:
        document.querySelector('#ergebnis').innerHTML = data;
    } catch (e) {
        console.log(e);
    }
}

// const promise = fetchData2();

const btn=document.getElementById('btn1');
btn.addEventListener('click',fetchData2);