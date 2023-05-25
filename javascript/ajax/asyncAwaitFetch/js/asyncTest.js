const fetchData = async () => {
  try{
      const response = await fetch("http://localhost:63342/asyncAwaitFetch/ajax.php");
      if (response.status === 200){
          let data = await response.text();
          console.log(data);
      }
  } catch (e) {
      console.log(e);
  } finally {
      console.log('done');
  }
}

const promise = fetchData();