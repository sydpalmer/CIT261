document.addEventListener('click', showStory);
function showStory(){
    if(!isNaN(parseInt(event.srcElement.id))){
        console.log("Id: " + event.srcElement.id);
        var dest = "showStory.php?id=" + event.srcElement.id;
        var x = (screen.width/2) - (300/2);
        var y = (screen.height/2) - (400/2);
        window.open(dest, "_blank", "scrollbars=yes,width=300,height=400,left=" + x + ",top=" + y);
    }
}