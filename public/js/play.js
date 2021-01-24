let g = {};
let frame = 1;

function loadJSON(url){
    fetch(url)
    .then(res => res.json())
    .then(data => JSON.parse(data))
    .then((out) => {
        g = out;
    })
    .then(() => {
        frame = 1;
        document.querySelector('button[name="play"]').style.display = "none";
        document.querySelector('.conversation').style.background = "rgba(255, 255, 255, 0.4)";
        document.querySelector('.area').setAttribute("onclick", "scene()");
        scene();
    })
    .catch(err => { throw err });
}

function scene(){
    f = 'frame' + frame;

    let area = document.querySelector('.area');
    let left = document.querySelector('.lp');
    let right = document.querySelector('.rp');
    let text = document.querySelector('.conversation');

    if (f in g) {
        let s = g[f];

        area.style.background = s['area']['content'];
        area.style.backgroundSize = s['area']['size'];
        left.style.background = s['lp']['content'];
        left.style.backgroundSize = s['lp']['size'];
        right.style.background = s['rp']['content'];
        right.style.backgroundSize = s['rp']['size'];
        text.innerHTML = s['conversation'];
    } else {
        area.style.background = "";
        area.style.backgroundSize = "";
        left.style.background = "";
        left.style.backgroundSize = "";
        right.style.background = "";
        right.style.backgroundSize = "";
        text.innerHTML = "";
        text.style.background = "";
        document.querySelector('button[name="play"]').style.display = "initial";
    }

    frame += 1;
}