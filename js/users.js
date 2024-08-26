const searchBar = document.querySelector('.search input');
const searchIcon = document.querySelector('.search button');
const userList = document.querySelector('.users-list');

searchIcon.onclick = ()=> {
    searchBar.classList.toggle('show');
    searchIcon.classList.toggle('active');
    searchBar.focus();

    if(searchBar.classList.contains('active')){
        searchBar.value = "";
        searchBar.classList.remove('active');
    }
}

searchBar.onkeyup = () => {
    let searchTerm = searchBar.value;
    
    if(searchTerm != ""){
        searchBar.classList.add('active');
    }else{
        searchBar.classList.remove('active');
    }

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/search.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                userList.innerHTML = data;
            }
        }
    }

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencode");
    xhr.send("searchTerm=" + encodeURIComponent(searchTerm));
}