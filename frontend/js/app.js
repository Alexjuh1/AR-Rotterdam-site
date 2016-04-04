/**
 * Created by Youri on 30-3-2016.
 */
window.addEventListener("load", init);
var images = document.getElementsByClassName("sight");

function init() {

    for (var i = 0; i < images.length; i++) {
        images.addEventListener("click", toggle_visibility("sight"+i));
    }
}

function toggle_visibility(id) {
    var e = document.getElementById(id);
    if(e.style.display == 'block')
        e.style.display = 'none';
    else
        e.style.display = 'block';
}
