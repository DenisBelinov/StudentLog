window.onload = () => {
    let container = document.getElementById('myPoststContainer');
    
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/StudentLog/php/server/getPosts.php', true);
    
    xhr.onload = function(){
        if(this.status == 200){
            var posts = JSON.parse(this.responseText);

            console.log(posts);
        }
    }

    xhr.send();
}