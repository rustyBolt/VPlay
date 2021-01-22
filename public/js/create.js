function addFile(title, component) {
    let file = document.querySelector('input[name="file"]');
    let data = new FormData();
    console.log(file);
    data.append('file', file.files[0]);
    data.append('title', title);

    fetch("/appendFile", {
        method: "POST",
        body: data
    }).then(function (response) {
        return response.text();
    }).then(function (response) {
        console.log(response);
        if (response !== 'naf'){
            let change = document.querySelector('.' + component);
            change.style.background = "url('" + '/public/uploads/' + title + '/' + response +"')";
            let sizex = 0;
            let sizey = 0;
            if (component == 'area'){
                sizex = Math.round(document.documentElement.clientWidth / 2);
                sizey = 450;
            }
            else {
                sizex = Math.round(document.documentElement.clientWidth / 2) * 3 / 10;
                sizey = Math.round(450 * 6 / 10);
            }
            change.style.backgroundSize = sizex.toString() + "px " + sizey.toString() + "px"
        }
        else {
            console.log("nie udało się");
        }
    });
    
    file.value = "";
}

function addText() {
    let text = document.querySelector('textarea[name="text"]');
}