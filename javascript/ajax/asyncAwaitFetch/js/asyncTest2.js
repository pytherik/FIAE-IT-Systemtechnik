const fetchData2 = async () => {
    try {
        const response = await fetch("http://localhost:63342/asyncAwaitFetch/ajax.php");
        let data = await response.text();
        console.log(data);
    } catch (e) {
        console.log(e);
    }
}

const promise = fetchData2();