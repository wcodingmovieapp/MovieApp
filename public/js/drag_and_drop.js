const list_items = document.querySelectorAll('.cards');
const lists = document.querySelectorAll('.list');
const edit = document.querySelector('#edit');
const save = document.querySelector('#save');
const del = document.querySelectorAll('#delete')



save.addEventListener('click', () => {
	for (let i = 0; i < list_items.length; i++) {
		const delItem = del[i]
		delItem.disabled = true;
		list_items[i].setAttribute("draggable", "false");
	}

	
})

edit.addEventListener('click', () => {

	for (let i = 0; i < del.length; i++) {
		const delItem = del[i]
		delItem.disabled = false;
		delItem.addEventListener('click', (e) => {
			const delThis = e.target.parentElement;
			delThis.remove();
		})
	}

	for (let i = 0; i < list_items.length-1; i++) {
        const item = list_items[i];

		item.setAttribute("draggable", "true")
		
		item.addEventListener('dragstart', function () {
			draggedItem = item;
			setTimeout(function () {
				item.style.display = 'none';
			}, 0)
		});
	
		item.addEventListener('dragend', function () {
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
                console.log(e.target)
				this.insertBefore(draggedItem, e.target);
				this.style.backgroundColor = 'rgba(0, 0, 0, 0.1)';
			});
		}
	}
	
})


