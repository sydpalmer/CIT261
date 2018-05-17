document.addEventListener('click', showStory);
function showStory(){
    if(!isNaN(parseInt(event.srcElement.id))){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("demo").innerHTML = this.responseText;
            }
        };
        var dest = "showStory.php?id=" + event.srcElement.id;
        xhttp.open("GET", dest, true);
        xhttp.send();
    }
}