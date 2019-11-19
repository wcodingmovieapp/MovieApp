let userQuery = document.getElementById('title').value;
let movieId = "";
let movieTitle = "";
let movieReleaseDate = "";
let movieDirector = "";
let movieActors = "";
let moviePoster = "http://image.tmdb.org/t/p/w185/"

function fetchData(e) {

  console.log(e);
  fetch(`https://api.themoviedb.org/3/search/movie?api_key=a7a2be31391543b1180047cd25bd3045&language=en-US&query=${userQuery}`)
  .then(response => {
    return response.json()
  })
  .then(data => {
    // Work with JSON data here
    movieId = data.results[0].id;
    movieTitle = data.results[0].title;
    movieReleaseDate = data.results[0].release_date;
    moviePoster += data.results[0].poster_path;
    searchMovie();

  })
  .catch(err => {
    // Do something for an error here
  })
 

}




  function searchMovie() {


  fetch(`https://api.themoviedb.org/3/movie/${movieId}/credits?api_key=a7a2be31391543b1180047cd25bd3045`)
  .then(response => {
    return response.json()
  })
  .then(data => {
    // Work with JSON data here
    for (let i = 0; i < data.crew.length; i++){
        if (data.crew[i].job === "Director") {
            movieDirector = data.crew[i].name;
        }
    } 
    for (let i = 0; i < data.cast.length; i++){
        movieActors = data.cast[0].name + " " + data.cast[1].name + " " + data.cast[2].name;
    }

    let movieData = {
      "movieId": movieId,
      "title": movieTitle,
      "releaseDate": movieReleaseDate,
      "director": movieDirector,
      "actors": movieActors,
      "poster": moviePoster,
      "action" : "addMovie"
    }

    

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'index.php?action=addMovie');//trying to globalize the action between FB and GMAIL
    xhr.onreadystatechange = function() { //폴백
            if (xhr.readyState == 4 && xhr.status == 200) {
              //todo
              console.log(xhr.responseText);
              // let obj = JSON.parse(xhr.responseText);
              
            }
    }
    xhr.send(JSON.stringify(movieData));


  })
  .catch(err => {
    // Do something for an error here
  })
  }

 