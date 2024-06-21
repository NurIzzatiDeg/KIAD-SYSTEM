let openBooking = document.querySelector('.booking');
let closeBooking = document.querySelector('.closeBooking');
let list = document.querySelector('.list');
let listCard = document.querySelector('.listCard');
let body = document.querySelector('body');
let total = document.querySelector('.total');
let quantity = document.querySelector('.quantity');
let isChoiceMade = false;

openBooking.addEventListener('click', ()=>{
    body.classList.add('active');
})
closeBooking.addEventListener('click', ()=>{
    body.classList.remove('active');
})
window.addEventListener('beforeunload', (e) => {
    if (!isChoiceMade) {
      e.preventDefault();
      e.returnValue = '';
    }
  });
let products = [
    {
        id: 1,
        name: 'HAIRCUT',
        image: 'haircut.jpg',
        price: 'RM20'
    },
    {
        id: 2,
        name: 'HAIRCUT & WASH',
        image: 'wash and haircut.webp',
        price: 'RM35'
    },
    {
        id: 3,
        name: 'HAIRCUT & BEARD TRIM',
        image: 'wash and style.webp',
        price: 'RM28'
    },
    {
        id: 4,
        name: 'HAIRCUT & WASH + BEARD TRIM',
        image: 'haircut & wash + beard.jpg',
        price: 'RM50'
    },
];

let listCards =[];
function initApp(){
    products.forEach((value, key)=>{
        let newDiv = document.createElement('div');
        newDiv.classList.add('item');
        newDiv.innerHTML = `
            <img src="images/${value.image}"/>
            <div class="title">${value.name}</div>
            <div class="price">${value.price.toLocaleString()}</div>
            <button onclick="addToCard(${key})">Add To Cart</button>
        `;
        list.appendChild(newDiv);
    })
}
initApp();
function addToCard(key) {
    if (listCards[key] == null) {
        listCards[key] = products[key];
        listCards[key].quantity = 1;
    }
    reloadCard();

    isChoiceMade = true;
}
function reloadCard() {
    listCard.innerHTML = '';
    let count = 0;
    let totalPrice = 0;
    listCards.forEach((value, key) => {
        totalPrice = totalPrice + parseFloat(value.price.substring(2));
        count = count + value.quantity;

        if (value != null) {
            let newDiv = document.createElement('li');
            newDiv.innerHTML = `
                <div><img src="images/${value.image}"/></div>
                <div>${value.name}</div>
                <div>${value.price}</div>
                <div>
                    <button onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>
                    <div class="count">${value.quantity}</div>
                    <button onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button>
                </div>
            `;
            listCard.appendChild(newDiv);
        }
    })
    total.innerText = 'RM' + totalPrice.toLocaleString();
    quantity.innerText = count;
}

function changeQuantity(key, quantity) {
    if (quantity == 0) {
        delete listCards[key];
    } else {
        listCards[key].quantity = quantity;
        listCards[key].price = 'RM' + (parseFloat(products[key].price.substring(2)) * quantity).toLocaleString();
    }
    reloadCard();
}


