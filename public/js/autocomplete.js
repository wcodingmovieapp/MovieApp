//set event listener on search box
let char = document.getElementById("title");
char.focus();
char.addEventListener("keyup", e => {
  //add replacement of value inside  and else fetch data add if statements of keyup and down
  movieTitleRequest(e.target.value);
});

//ajax request
function movieTitleRequest(inputVal) {
  let input = inputVal;
  var searchList = [];
  fetch(
    `https://api.themoviedb.org/3/search/movie?api_key=a7a2be31391543b1180047cd25bd3045&language=en-US&query=${input}`
  )
    .then(response => {
      return response.json();
    })
    .then(data => {
      //retrieve movie title and date and push to list
      //** GET RID OF MONTH/DAY IN RELEASE_DATE **
      let titleDate;
      for (let i = 0; i < data.results.length; i++) {
        titleDate = {
          movieTitle: "",
          movieReleaseDate: ""
        };
        let movie = data.results[i];
        titleDate.movieTitle = movie.title;
        titleDate.movieReleaseDate = movie.release_date;
        searchList.push(titleDate);
      }

      // **FILTER ONLY THOSE WITH START OF STRING MATCHING PUT

      //sort titles alphabetically; **tweak sort to add if a.movieTitle = b.movieTitle**
      searchList.sort(function(a, b) {
        if (a.movieTitle < b.movieTitle) {
          return -1;
        }
        if (a.movieTitle > b.movieTitle) {
          return 1;
        }
        return 0;
      });

      createList(searchList);
    });
}

//create html div with search suggestions list
function createList(searchList) {
  let mainDiv = document.querySelector("#autocomplete");
  mainDiv.innerHTML = "";

  for (let i = 0; i < searchList.length; i++) {
    let item = document.createElement("div");
    item.classList.add("itemList");
    item.textContent =
      searchList[i].movieTitle + "    " + searchList[i].movieReleaseDate;
    mainDiv.appendChild(item);
    //add mouse click listener if statement
  }
}
