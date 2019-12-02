// const list_items = document.querySelectorAll('.cards');
// const lists = document.querySelectorAll('.list');
// const edit = document.querySelector('#edit');
// const save = document.querySelector('#save');
// const del = document.querySelectorAll('#delete')
// const childCon = document.querySelectorAll('.children-container')


let edit = document.querySelector('#edit');
let save = document.querySelector('#save');


save.addEventListener('click', () => { 
let del = document.querySelectorAll('#delete')
let list_items = document.querySelectorAll('.cards'); // when i click save i don't want items to be editable or deletable
	for (let i = 0; i < list_items.length; i++) { //loops through boxes
		let delItem = del[i] // each delete button is selected
		delItem.disabled = true; // each delete button is now disabled - will not work
		list_items[i].setAttribute("draggable", "false"); // each box item can not be dragged
	}

	
})

edit.addEventListener('click', () => { // when i click edit i want every item to be editable and deletable
let del = document.querySelectorAll('#delete')
let list_items = document.querySelectorAll('.cards');
let lists = document.querySelectorAll('.list');


let childCon = document.querySelectorAll('.children-container')


	for (let i = 0; i < del.length; i++) { // loop through delete boxes
		let delItem = del[i] // select each individual delete box
		delItem.disabled = false; // it is not disabled anymore, can be clicked
		delItem.addEventListener('click', deleteMovie)
	}

	for (let i = 0; i < list_items.length-1; i++) { // i go through all of the cards
        let item = list_items[i]; // i select each card

		item.setAttribute("draggable", "true") // each card can now be dragged
		
		item.addEventListener('dragstart', function () { 
            draggedItem = item;
            for (let x = 0; x < childCon.length; x++) {
				childCon[x].style.display = "none";
			}
			setTimeout(function () {
				item.style.display = 'none';
			}, 0)
		});
	
		item.addEventListener('dragend', function () {
            for (let x = 0; x < childCon.length; x++) {
				childCon[x].style.display = "block";
			}
			setTimeout(function () {
				draggedItem.style.display = 'block';
			}, 0);
		})

		
	
		for (let j = 0; j < lists.length; j ++) {
			const list = lists[j];



			list.addEventListener('dragover', function (e) {
				e.preventDefault();
			});
			
			list.addEventListener('dragenter', function (e) {
                
				e.preventDefault();
				this.style.backgroundColor = 'rgba(0, 0, 0, 0.2)';
			});
	
			list.addEventListener('dragleave', function (e) {
       
				this.style.backgroundColor = 'rgba(0, 0, 0, 0.1)';
			});
	
			list.addEventListener('drop', function (e) {
                this.insertBefore(draggedItem, e.target);
				this.style.backgroundColor = 'rgba(0, 0, 0, 0.1)';
			});
		}
	}
	
})


function deleteMovie(e) {

	let delThis = e.target.parentElement; // i select the parent element of the del button (which is the whole card)
	delThis.remove(); // i remove that card

	
	var movieTitle = e.target.nextSibling.nextSibling.firstChild.textContent;

	let delData = {
		"userId": userId,
		"title": movieTitle,
		"action": "deleteMovie"
	}


	var xhr = new XMLHttpRequest();
		xhr.open('POST', 'index.php');
		xhr.onreadystatechange = function() { //폴백
            if (xhr.readyState == 4 && xhr.status == 200) {
             console.log("success delete ajax");
            }
    }
    xhr.send(JSON.stringify(delData));

}