const fetchData2 = async () => {
    try {
        // Build formData object.
        let formData = new FormData();
        formData.append('name', 'John');
        formData.append('passwd', 'Doe');
        const response =
            await fetch("http://localhost:63342/asyncAwaitFetch/ajaxPost.php",
                {
                    body: formData,
                    method: "post"
                });
        let data = await response.text();
        console.log(data);
        // und als Ausgabe:
        document.querySelector('#id1').innerHTML = data;
    } catch (e) {
        console.log(e);
    }
}

const promise = fetchData2();