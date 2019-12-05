let saveRanking = document.getElementById('save'); //[save] button

 let movieArr = [];

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
            updateRanking: function(rankNb, title){
                    let rank= {};
                    rank.number = rankNb+1;
                    rank.title = title;
                    return rank;
            }
        }
        let ranks = [];
        for(let i = 0; i < movieArr.length; i++){
            let rank= movieRanking.updateRanking(i, movieArr[i]);
            ranks.push(rank);
        }
        movieRanking['ranks'] = ranks;
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







