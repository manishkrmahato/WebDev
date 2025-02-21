let movieArray = [];

const movieInput = document.getElementById('movieInput');
const addMovieBtn = document.getElementById('addMovieBtn');
const movieList = document.getElementById('movieList');
const clearListBtn = document.getElementById('clearListBtn');
const movieCount = document.getElementById('movieCount');

function updateMovieList() {
  movieList.innerHTML = '';
  
  movieArray.forEach((movie, index) => {
    const li = document.createElement('li');
    li.textContent = movie;
    li.setAttribute('data-index', index);
    
    li.addEventListener('click', removeMovie);

    movieList.appendChild(li);
  });

  movieCount.textContent = movieArray.length;
}

function addMovie() {
  const movieName = movieInput.value.trim();
  
  if (movieName === '') {
    alert('Please enter a valid movie name!');
    return;
  }

  movieArray.push(movieName);
  updateMovieList();
  movieInput.value = '';
}

function removeMovie(event) {
  const index = event.target.getAttribute('data-index');
  movieArray.splice(index, 1);
  updateMovieList();
}

function clearMovieList() {
  movieArray = [];
  updateMovieList();
}

addMovieBtn.addEventListener('click', addMovie);
clearListBtn.addEventListener('click', clearMovieList);

updateMovieList();
