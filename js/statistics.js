// Purpouse of this file is to genearate data for the satatistics page

var posts = {};
var label_arr1 = [];
var values_arr = [];
var values_dict = {}
var label_arr2 = [];
var values_arr2 = [];
var values_dict2 = {};

//functions
function downloadPosts() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/StudentLog/php/server/getPosts.php', false);
    
    xhr.onload = function(){
        if(this.status == 200){
            posts = JSON.parse(this.responseText);
            console.log(posts);
            generateValues();
            generateValues2();
        }
    }
    xhr.send();
}

function generateValues(){
    for (var i in posts){
        if (!label_arr1.includes(posts[i].postType)){
            label_arr1.push(posts[i].postType)
            
            values_dict[posts[i].postType] = 1;
        }
        else {
            values_dict[posts[i].postType] += 1;
        }
    }
    for (var j in label_arr1){
        values_arr.push(values_dict[label_arr1[j]]);
    }
}

function generateValues2(){
    for (var i in posts){
        if (!label_arr2.includes(posts[i].subjectType)){
            label_arr2.push(posts[i].subjectType)
            
            values_dict2[posts[i].subjectType] = 1;
        }
        else {
            values_dict2[posts[i].subjectType] += 1;
        }
    }
    for (var j in label_arr2){
        values_arr2.push(values_dict2[label_arr2[j]]);
    }
}

function addData(chart, label, data) {
    chart.data.labels.push(label);
    chart.data.datasets.forEach((dataset) => {
        dataset.data.push(data);
    });
    chart.update();
}

window.onload = () => {
    downloadPosts();
    console.log(label_arr1);
    console.log(values_arr);
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: label_arr1,
            datasets: [{
                data: values_arr,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        }
    });
    var ctx2 = document.getElementById('myChart2').getContext('2d');
    var myChart2 = new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: label_arr2,
            datasets: [{
                data: values_arr2,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        }
    });
}