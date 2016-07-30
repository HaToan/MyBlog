function openFileDialog(){
	$('#files').click();
}


function sendFile(file){
	var xhr = new XMLHttpRequest();
	var uri = "js/images";
	var token = document.getElementById('csrf-token').value;
	//console.log(token);
	/* packet data */
	var fm = new FormData();
	fm.append('file', file);
	fm.append('_token', token)

	xhr.open('POST', uri, true);

	xhr.onreadystatechange = function(){
		if(xhr.status == 200 && xhr.readyState == 4){
			console.log(xhr.responseText);
			document.getElementById("click_menu1").click();
		}
	}/* end onreadystatechange */


	xhr.send(fm);
}


function getFilesReferences(){
	var files =  document.getElementById('files').files;
	for(i = 0; f = files[i]; i++){
		sendFile(f);

	}/* end for */
}	
/* end getFilesReferences*/

document.getElementById('files').addEventListener('change', getFilesReferences, false);


<!-- Drag - Drop  Listener even-->
function drag(e){
	e.preventDefault();
}

<!-- Drop-->
function drop(e){
	e.preventDefault();

	var files = e.dataTransfer.files;
	
	for(i = 0; f = files[i]; i++)
	{
		sendFile(f);
	}
}

var target = document.getElementById('drag-drop');
target.addEventListener('dragover', drag, false);
target.addEventListener('drop', drop, false);



/**
 * load Images
 */

 function loadImages(){
 	document.getElementById('list-img').innerHTML = "";
 	xhr = new XMLHttpRequest();
 	uri = "js/load-images"
 	xhr.open('GET', uri, true);
 	xhr.onreadystatechange = function(){
		//console.log(xhr.responseText);
		if(xhr.readyState == 4 && xhr.status == 200){
			rpJson = JSON.parse(xhr.responseText);
			
			//
			var out = ""
			for(var i = 0; i < rpJson.length; i++)			{
				out += '<li><img src="uploads/media/' + rpJson[i].name  +  '?id=' + rpJson[i].id +  '" onclick="clickImg(this);"  ></li>\n';
			}
			document.getElementById('list-img').innerHTML += out;
		}
	}

	xhr.send();
}

function clickImg(eve){
	var e = document.getElementById('info-img');
	e.innerHTML = "";
	e.innerHTML = '<img id="select-img"  src="' + eve.src +'" width="200px" height="300px" />\n<a onclick="Imgdelete();">Delete</a>';

}

function Imgdelete(){
	var src = document.getElementById('select-img').src;
	var id = src.match(/\d+/g);
	id = id[id.length - 1];
	var token = document.getElementById('_token').value;
	xhr = new XMLHttpRequest();
	uri = 'js/deleteimages';
	xhr.open('POST', uri, true);

	fm = new FormData();
	fm.append('id', id);
	fm.append('_token', token);

	xhr.onreadystatechange = function(){
		if(xhr.status == 200 && xhr.readyState == 4){
			console.log(xhr.responseText);
			document.getElementById('info-img').innerHTML = "";
			loadImages();
		}
	}

	xhr.send(fm);


}

function chooseImg(){
	var url_img = document.getElementById('select-img').src;
	var img = document.getElementById('featured-images-img');

	img.src = url_img;
	img.width = '120';
	img.height = '120';
	

	var id = url_img.match(/\d+/g);
	document.getElementById('images-id').value = id[id.length-1];


}

/** 
 * add tag
 */

 function addTag(){
 	var tag = document.forms['form-tag']['tag'].value;
 	var token = document.forms['form-tag']['_token'].value;
 	var fm = new FormData();
 	fm.append('tag', tag);
 	fm.append('_token', token);

 	var xhr = new XMLHttpRequest();
 	var uri = "js/addtag";
 	xhr.open("POST", uri, true);
 	xhr.onreadystatechange = function(){
 		if(xhr.status == 200 && xhr.readyState == 4){
 			console.log(xhr.responseText);
			//reset form
			document.forms['form-tag']['tag'].value = "";
		}
	}

	xhr.send(fm);
}

function showTags(){
	document.getElementById('show-tag').innerHTML = "";
	var xhr = new XMLHttpRequest();
	var uri = "js/listtags";
	
	xhr.open('GET', uri, true);
	xhr.onreadystatechange = function(){

		if(xhr.status == 200 && xhr.readyState == 4){
			rpJson = JSON.parse(xhr.responseText);
			var out = ""
			for(var i = 0; i < rpJson.length; i++){
				out += '<input type="checkbox" name="tag[]" value="' +  rpJson[i].id + '"/>\n';
				out += '<span class="label label-warning">' + rpJson[i].name + '</span>';
			}

			document.getElementById('show-tag').innerHTML += out;
		}
	}

	xhr.send();

	var id = window.location.href[ window.location.href.length - 1 ];
	if(!Number.isNaN(id)){
		cbIsCheckedTags();
	}
}

function cbIsCheckedTags(){
 	var id = window.location.href[window.location.href.length - 1];
 	var _token = document.getElementById('csrf-token').value;

 	var xhr = new XMLHttpRequest();
 	var uri = 'js/tagsofpost';
 	var fm = new FormData();
 	fm.append('id', id);
 	fm.append('_token', _token);

 	xhr.open('POST', uri, true);

 	xhr.onreadystatechange = function(){
 		if(xhr.status == 200 && xhr.readyState == 4){
 			rpJson = JSON.parse(xhr.responseText);

			// checked
			var tagByName =	document.getElementsByName('tag[]');
			for(var j = 0; j < rpJson.length; j++){
				for(var i = 0; i < tagByName.length; i++){
					if(rpJson[j].id == tagByName[i].value){

						tagByName[i].checked = true;
					}
				}
			}
		}
	}

	xhr.send(fm);
}

/**
 * categories
 */

 window.onload = function(){
 	document.getElementById('style-default').innerHTML = "";
 	var xhr = new XMLHttpRequest();
 	var uri = "js/listcategory";

 	xhr.open('GET', uri, true);
 	xhr.onreadystatechange = function(){
 		if(xhr.status == 200 && xhr.readyState == 4){
 			rpJson = JSON.parse(xhr.responseText);

			// do du lieu vao category
			var out = "";
			for(var i = 0; i < rpJson.length; i++){
				out += '<input type="checkbox" name="categories[]" value="'  + rpJson[i].id + '"><span> ' + rpJson[i].name + ' </span><br />';
			}

			document.getElementById('style-default').innerHTML += out;

			// do du lu vao parent cate
			out = "";
			for(i = 0; i < rpJson.length; i++){
				out += '<option value="'  + rpJson[i].id +  '">' + rpJson[i].name + '</option>';
			}

			document.getElementById('parent-cate').innerHTML += out;
		}
	}

	xhr.send();

	// id post
	var id = window.location.href[window.location.href.length - 1];
	if(!Number.isNaN(id) ){
		cbIsCheckedCate();
	}
	

}


function listCategory(){
	document.getElementById('style-default').innerHTML = "";
	var xhr = new XMLHttpRequest();
	var uri = "js/listcategory";

	xhr.open('GET', uri, true);
	xhr.onreadystatechange = function(){
		if(xhr.status == 200 && xhr.readyState == 4){
			rpJson = JSON.parse(xhr.responseText);

			// do du lieu vao category
			var out = "";
			for(var i = 0; i < rpJson.length; i++){
				out += '<input type="checkbox" name="categories[]" value="'  + rpJson[i].id + '"><span> ' + rpJson[i].name + ' </span><br />';
			}

			document.getElementById('style-default').innerHTML += out;

			// do du lu vao parent cate
			out = "";
			for(i = 0; i < rpJson.length; i++){
				out += '<option value="'  + rpJson[i].id +  '">' + rpJson[i].name + '</option>';
			}

			document.getElementById('parent-cate').innerHTML += out;
		}
	}

	xhr.send();
}

function addCategory(){
	var xhr = new XMLHttpRequest();
	var uri = "js/addcategory";
	var name = document.getElementById('namecategory').value;
	var parent_id = document.getElementById('parent-cate');
	var _token = document.getElementById('_token').value;
	parent_id = parent_id.options[parent_id.selectedIndex].value;
	

	var fm = new FormData();
	fm.append('categoryname', name);
	fm.append('parent_id', parent_id);
	fm.append('_token', _token);

	xhr.open('POST', uri, true);
	xhr.onreadystatechange = function(){
		console.log(xhr.responseText);
		if(xhr.status == 200 && xhr.readyState == 4){
			rpJson = xhr.responseText;

			console.log(rpJson);
			name.innerHTML = "";
			listCategory();

		}
	}

	xhr.send(fm);

}
/**
 * Tich checkbox is checked
 */
 function cbIsCheckedCate(){
 	document.getElementById('style-default');
 	var id = window.location.href[window.location.href.length - 1];
 	var _token = document.getElementById('csrf-token').value;

 	var xhr = new XMLHttpRequest();
 	var uri = 'js/cateofpost';
 	var fm = new FormData();
 	fm.append('id', id);
 	fm.append('_token', _token);

 	xhr.open('POST', uri, true);

 	xhr.onreadystatechange = function(){
 		if(xhr.status == 200 && xhr.readyState == 4){
 			rpJson = JSON.parse(xhr.responseText);

			// checked
			var cateByName =	document.getElementsByName('categories[]');
			for(var j = 0; j < rpJson.length; j++){
				for(var i = 0; i < cateByName.length; i++){
					
					if(rpJson[j].id == cateByName[i].value){

						cateByName[i].checked = true;
					}
				}
			}
		}
	}

	xhr.send(fm);


}