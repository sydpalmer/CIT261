document.getElementById("addToStory").addEventListener('click', addStory);
function addStory(){
    var dest = "addTo.php";
    var x = (screen.width/2) - (300/2)+(250/2);
    var y = (screen.height/2) - (400/2)+(350/2);
    window.open(dest, "_blank", "scrollbars=yes,width=250,height=350,left=" + x + ",top=" + y);
}