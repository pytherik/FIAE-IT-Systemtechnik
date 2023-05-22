
const tuwas = (e) => {
    const zahl1 = Number(document.getElementsByTagName('input')[0].value);
    const zahl2 = Number(document.getElementsByTagName('input')[1].value);
    document.getElementsByTagName('input')[2].value = String(zahl1 * zahl2);
    console.log(e.target.value);
    console.log(e);
}
