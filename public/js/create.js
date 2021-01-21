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
        }
        else {
            console.log("nie udało się");
        }
    });
    
    file.value = "";
}