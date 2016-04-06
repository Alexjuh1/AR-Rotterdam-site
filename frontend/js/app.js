/**
 * Created by Youri on 30-3-2016.
 */
//window.addEventListener("load", init);
function data_load(sight) {
    $.ajax ({
        dataType: "json",
        url: "https://jschooten.com/projects/cle3/",
        data: {"place": sight},
        success: data_Loaded
    })
}


function data_Loaded(data) {
    console.log("sightdata geladen" + data);
    var sightdata = data;
    var name = sightdata.wikipedia_full.title;
    var rating = sightdata.rating;
    var image = sightdata.image;
    var text = sightdata.wikipedia_full.extract;
    var pageid = sightdata.wikipedia_full.pageid;
    console.log("sight_name_" + name);


    document.getElementById("sight_name_" + name).innerHTML = name;
    var wikilink = document.getElementById("sight_wiki_" + name);
    wikilink.href = "https://en.wikipedia.org/wiki/" + name;
    document.getElementById("sight_text_" + name).innerHTML = text;
    var img = document.getElementById("sight_image_" + name);
    img.src = image;

    console.log(name);
    console.log(rating);
    console.log("sight_name_" + name);
}

function toggle_visibility(id) {
    var e = document.getElementById(id);
    if (e.style.display == 'block') {
        e.style.display = 'none';
    }
    else {
        e.style.display = 'block';
    }
}



//var images = document.getElementsByClassName("sight");
//
//function init() {
//
//    for (var i = 0; i < images.length; i++) {
//        images.addEventListener("click", toggle_visibility("sight"+i));
//    }
//}