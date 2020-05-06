
let buyButtons = document.querySelectorAll('.buy_button');

for (let i = 1;i < buyButtons.length; i++){
    let button = document.getElementById('buy'+`${i}`);
    button.addEventListener('click', () => buy(i));
}

async function buy(id) {
    let body = new FormData;
    body.append('id', id);
    fetch('/orders',
        {
            method: 'POST',
            body
        })
        .then(response => response.json())
        .then((data) =>  console.log(data))
        .then(document.location.reload());
}