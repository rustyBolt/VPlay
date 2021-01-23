function addFile(title, component) {
    let file = document.querySelector('input[name="file"]');
    let data = new FormData();
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
            let change = document.querySelector('.' + component);
            change.style.background = "";
            change.style.backgroundSize = "";
        }
    });
    
    file.value = "";
}

function addText() {
    let text = document.querySelector('textarea[name="text"]');
    let conversation = document.querySelector('.conversation');

    let helper = text.value.split("\\");

    if (helper[1] === undefined) {
        helper[1] = "";
    }

    conversation.innerHTML = helper[0] + "</br>" + helper[1];
}

let game = {};
let frame = 1;

function addScene() {
    let area = document.querySelector('.area');
    let left = document.querySelector('.lp');
    let right = document.querySelector('.rp');
    let text = document.querySelector('.conversation');

    let scene = {"area": {"content": area.style.background,
                            "size": area.style.backgroundSize},
                "lp": {"content": left.style.background,
                            "size": left.style.backgroundSize},
                "rp": {"content": right.style.background,
                            "size": right.style.backgroundSize},
                "conversation": text.innerHTML};

    game["frame" + frame] = scene;
    frame += 1;
    console.log(game);
    console.log(frame);
}

function addGame(title){
    let data = new FormData();
    data.append('game', JSON.stringify(game));
    data.append('title', title);

    fetch("/addGame", {
        method: "POST",
        body: data
    }).then(function (response) {
        return response.text();
    }).then(function (response) {
        console.log(response);
    }).then(()=>window.location.href = "http://localhost:8080/hub");
}