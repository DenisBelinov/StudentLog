var posts = {};

document.getElementById('filterForm').addEventListener('submit', filterPosts);
document.getElementById('clearButton').addEventListener('click', clearFilterFields);




window.onload = downloadPosts();


//functions
function filterPosts(e){
    e.preventDefault();
    
    var typeFilter = document.getElementById('typeFilter').value;
    var subjectFilter = document.getElementById('subjectFilter').value;

    if (typeFilter || subjectFilter ){
        filterPostsHtlm(typeFilter, subjectFilter);
    }
    else {
        refreshPostsHtml();
    }
}

function downloadPosts() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/StudentLog/php/server/getPosts.php', true);
    
    xhr.onload = function(){
        if(this.status == 200){
            posts = JSON.parse(this.responseText);
            console.log(posts);

            refreshPostsHtml();
        }
    }

    xhr.send();
}

function filterPostsHtlm(typeFilter, subjectFilter){
    var container = document.getElementById('myPostsContainer');
    var output = '';
    var f;
    if (typeFilter && subjectFilter){
        f = (post) => { return post.postType === typeFilter && post.subjectType === subjectFilter; }
        console.log("both");
    }
    else if (typeFilter) {
        f = (post) => { return post.postType === typeFilter; }
        console.log("just filter");
    }
    else {
        f = (post) => { return post.subjectType === subjectFilter; }
        console.log("just subject")
    }
    for (var i in posts){
        if (f(posts[i])){
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
    }

    container.innerHTML = output;
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

function clearFilterFields() {
    document.getElementById('typeFilter').value = '';
    document.getElementById('subjectFilter').value = '';
}