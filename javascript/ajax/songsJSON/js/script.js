const songRow = document.getElementById('songRow');
const getSongs = document.getElementById('getSongs');

const loadSongs = () => {
  const xhr = new XMLHttpRequest();
  xhr.onload = function() {
    const songData = JSON.parse(this.responseText);
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
  }
  xhr.open('POST', 'getSongsAjax.php');
  xhr.setRequestHeader('Content-type', 'application/json');
  xhr.send();
}

getSongs.addEventListener('click', () => {
  songRow.innerHTML = '';
  loadSongs();
})