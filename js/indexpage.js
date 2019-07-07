var posts = {};

window.onload = downloadPosts();

function downloadPosts() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/StudentLog/php/server/getPosts.php?all=true', true);
    
    xhr.onload = function(){
        if(this.status == 200){
            posts = JSON.parse(this.responseText);
            console.log(posts);

            refreshPostsHtml();
        }
    }

    xhr.send();
}

function refreshPostsHtml(){
    var container = document.getElementById('myPostsContainer');
    var output = '';

    for (var i in posts){
        output += 
            '<div class="post">' +
            '<ul>' + 
            '<li>Title: '+ posts[i].title + '</li>' +
            '<li>Type: '+ posts[i].postType + '</li>' +
            '<li>Subject: '+ posts[i].subjectType + '</li>' +
            '<li>Comment: '+ posts[i].comment + '</li>' +
            '</ul>' + 
            '</div>'
    }

    container.innerHTML = output;
}