const songRow = document.getElementById('songRow');
const getSongs = document.getElementById('getSongs');

const loadSongs = async () => {
  try {
    const response = await fetch('http://localhost/FIAE-IT-Systemtechnik/javascript/ajax/songsJSON/getSongsAjax.php');
    const songData = await response.json();
      songData.forEach(song => {
      const row = document.createElement('div');
      row.className = 'row';
      const id = document.createElement('div');
      id.className = 'cell small';
      id.innerHTML = song.id;
      const title = document.createElement('div');
      title.className = 'cell';
      title.innerHTML = song.title;
      const name = document.createElement('div');
      name.className = 'cell';
      name.innerHTML = song.name;
      row.appendChild(id);
      row.appendChild(title);
      row.appendChild(name);
      songRow.appendChild(row);
    })
  } catch (err) {
    console.log(err);
  }
}

getSongs.addEventListener('click', () => {
  songRow.innerHTML = '';
  loadSongs();
})