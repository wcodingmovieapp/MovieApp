let cards = document.querySelectorAll('.cards');
let saveRanking = document.getElementById('save')
 

let movieArr = []
saveRanking.addEventListener('click', () => {
    for (let i = 0; i < cards.length; i++) {
        let card = cards[i];
        movieArr.push(card.firstElementChild.nextElementSibling.textContent)
    }

    let movieRanking = {
        1: movieArr[0],
        2: movieArr[1],
        3: movieArr[2],
        4: movieArr[3],
        5: movieArr[4],
        "action": "updateRanking"
    }

    var xhr = new XMLHttpRequest();
        xhr.open('POST', 'index.php');
        xhr.onreadystatechange = function(){
            if(xhr.readyState == 4 && xhr.status == 200){
                console.log("send new movieRanking to index.php");
            }
        }
        xhr.send(JSON.stringify(movieRanking));

})







