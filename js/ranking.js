var postCounts = {};

document.getElementById('filterForm').addEventListener('submit', filterRanking);
document.getElementById('clearButton').addEventListener('click', clearFilterFields);

window.onload = downloadAllPosts();


//functions
function downloadAllPosts() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/StudentLog/php/server/getPosts.php?postCounts=true', true);
    
    xhr.onload = function(){
        if(this.status == 200){
            postCounts = JSON.parse(this.responseText);
            console.log(postCounts);

            generateTableHtml();
        }
    }

    xhr.send();
}

function filterRanking(e){
    e.preventDefault();
    
    var typeFilter = document.getElementById('typeFilter').value;
    var subjectFilter = document.getElementById('subjectFilter').value;

    if (typeFilter || subjectFilter ){
        filterTableHtlm(typeFilter, subjectFilter);
    }
    else {
        refreshPostsHtml();
    }
}
function generateTableHtml(){
    var container = document.getElementById('rankingPostsContainer');
    var output = '<table class="table">' +
    '<thread>' +  
    '<tr>' +
    '<th scope="col">Име</th>' +
    '<th scope="col">Фамилия</th>' +
    '<th scope="col">Резултат</th>' +
    '</tr>' +
    '</thread><tbody>';
    postCounts.sort(compareUsersByPostCount);
    postCounts.reverse();
    for (var i in postCounts){
        output += 
            '<tr>' + 
            '<td>' + postCounts[i].firstName + '</li>' +
            '<td>' + postCounts[i].lastName + '</li>' +
            '<td>' + postCounts[i].count + '</li>' +
            '</tr>'
    }

    output += '</tbody></table>'
    container.innerHTML = output;
}

function filterTableHtlm(typeFilter, subjectFilter){
    var xhr = new XMLHttpRequest();
    if (typeFilter && subjectFilter){
        xhr.open('GET', '/StudentLog/php/server/getPosts.php?postCounts=true&filterType='+typeFilter+'&filterSubject='+subjectFilter, true);
    }
    else if(typeFilter) {
        xhr.open('GET', '/StudentLog/php/server/getPosts.php?postCounts=true&filterType='+typeFilter, true);
    }
    else if(subjectFilter) {
        xhr.open('GET', '/StudentLog/php/server/getPosts.php?postCounts=true&filterSubject='+subjectFilter, true);
    }
    else {
        xhr.open('GET', '/StudentLog/php/server/getPosts.php?postCounts=true', true);
    }


    xhr.onload = function(){
        if(this.status == 200){
            postCounts = JSON.parse(this.responseText);
            console.log(postCounts);

            generateTableHtml();
        }
    }

    xhr.send();
}

function compareUsersByPostCount(a, b) {
    if (a.count < b.count) {
        return -1;
    }
    if (a.count > b.count) {
        return 1;
    }
    return 0;
}



function clearFilterFields() {
    document.getElementById('typeFilter').value = '';
    document.getElementById('subjectFilter').value = '';
}