
async function selectStatus(id) {
    let status = document.getElementById('status' + id);
    let selected = status.options[status.selectedIndex].value;

    let body = new FormData;
    body.append('selected', selected);
    body.append('id', id);
    fetch('/status',
        {
            method: 'POST',
            body
        })
        .then(response => response.json())
        .then((data) =>  console.log(data))
}