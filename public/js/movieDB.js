//let userQuery = document.getElementById('title');
let movieId = "";
let movieTitle = "";
let movieReleaseDate = "";
let movieDirector = "";
let movieActors = "";
let moviePoster = "http://image.tmdb.org/t/p/w185/";
// let user_id = 12;// SHOULD LINK USERID USING SESSION OR LINK IT WHEN WE GENERATE EVENTS.
var divCardPlus = document.querySelector('#cardPlus');



function fetchData(user_id) {
  
  //let movie = userQuery.value;
  let movie = document.getElementById('title').value;
  fetch(`https://api.themoviedb.org/3/search/movie?api_key=a7a2be31391543b1180047cd25bd3045&language=en-US&query=${movie}`)
  .then(response => {
    return response.json()
  })
  .then(data => {
    // Work with JSON data here
    
    movieId = data.results[0].id;
    movieTitle = data.results[0].title;
    movieReleaseDate = data.results[0].release_date;
    moviePoster += data.results[0].poster_path;
    searchMovie(user_id);
  })
  .catch(err => {
    // Do something for an error here
  })
}

  function searchMovie(userId) {
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
      "action" : "addMovie",
      "userId" : userId,
    }

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'index.php');//trying to globalize the action between FB and GMAIL
    xhr.onreadystatechange = function() { //폴백
            if (xhr.readyState == 4 && xhr.status == 200) {
             var newMovie = JSON.parse(xhr.responseText);

             showNewMovie(newMovie);

             
            }
    }
    xhr.send(JSON.stringify(movieData));

  })
  .catch(err => {
    // Do something for an error here
  })
  }
  /*show a new movie data*/ 
  function showNewMovie(newMovie){

    var divList = document.querySelector('.list');
    //<div class="cards">
    var divNewCard = document.createElement('div');
        target = document.getElementById("cardPlus")
        divNewCard.className="cards";//<div class="cards">
        divList.insertBefore(divNewCard, target );
       // divList.appendChild(divNewCard);
    //[x]button: <input type="button" class="delete" name="delete" id="delete">
    var delBtn = document.createElement('input');
        delBtn.type = "button";
        delBtn.className = "delete";
        delBtn.name = "delete";
        delBtn.id = "delete";
        delBtn.value = "X";
        delBtn.disabled = "true";
        divNewCard.appendChild(delBtn);
    //<span><h1></h1></span>
    var span = document.createElement('span');
        divNewCard.appendChild(span);
    var h1 = document.createElement('h1');
        span.appendChild(h1);
    //show title from obj[newMovie]
    var title = newMovie['title'];
        h1.innerHTML = title;
    //show img from [newMovie]
    var img = document.createElement('img');
        img.src = newMovie['poster'];
        divNewCard.appendChild(img);
    //<div id="infoNew" class="children-container"></div>
    var divInfo = document.createElement('div');
        divInfo.className = "children-container";
        divInfo.id = "infoNew";
        divNewCard.appendChild(divInfo);
    //show director, actors
    var p = document.createElement('p');
        p.innerHTML = "Director: " + newMovie['director'] + "<br>" 
                      + "Actors: " + newMovie['actors'];
        divInfo.appendChild(p);
  }