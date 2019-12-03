let saveRanking = document.getElementById('save'); //[save] button

 let movieArr = [];
     movieArr.push(''); 
     //To use movieArr index from 1 ==> movieArr[0] = null, movieArr[1] = 1st movie card title


    saveRanking.addEventListener('click', () => {
        //select elements of cards -> array
        let cards = document.querySelectorAll('.cards');
            //get title of each card after drag&drop
            for (let i = 0; i < cards.length; i++) {
                movieArr.push(cards[i].firstElementChild.nextElementSibling.textContent);
            }
    //Generate an object about movie lists to be updated
    //common properties: action & userId
    var movieRanking = {
        "action": "updateRanking",
        "userId": userId,
        ranking: {},
        updateRanking: function(rank, title){
            this.ranking[rank] = {
                title: title
            };
        }
    }

    for(let i = 1; i < movieArr.length; i++){
        movieRanking.updateRanking(i, movieArr[i]);
    }
             console.log(movieRanking);

    var xhr = new XMLHttpRequest();
        xhr.open('POST', 'index.php');
        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4 && xhr.status == 200){
                console.log("send new movieRanking to index.php");
            }
        }
        xhr.send(JSON.stringify(movieRanking));

})







