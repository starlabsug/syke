const orderBtns = document.querySelectorAll('.add-cart');
const orderForm = document.querySelector('.order-form');
const customOrder = document.querySelector('.custom-order');
const table = document.querySelector('.order-table');
const popupMenu = document.querySelector('.popup-menu');
const deleteBtn = document.querySelectorAll('.deleteBtn');
const noOrders = document.querySelector('.no-orders');
const priceTotal = document.querySelector('.total');

let message = "";
let totals = [];
console.log(deleteBtn);

const Foods = [{
    foodId: 1,
    foodName: "Rice Salad",
    foodPrice: 20000
}, {
    foodId: 2,
    foodName: "Pork Salad",
    foodPrice: 30000
}, {
    foodId: 3,
    foodName: "Chicken Salad",
    foodPrice: 24000
}, {
    foodId: 4,
    foodName: "Italian Beef",
    foodPrice: 40000
}];

noOrders.classList.add('view');

orderBtns.forEach(orderBtn => {
    orderBtn.addEventListener('click', () => {
        const orderId = +orderBtn.getAttribute('data-target');

        let sum = 0;

        noOrders.classList.remove('view');

        let food = Foods.find(food => food.foodId === orderId);
        console.log(food);
        const div = document.createElement('tr');
        div.className = "order";

        // console.log(div);

        div.innerHTML = `
             
                        <td class="${food.foodId}">
                        <input type="text" id="${food.foodId}" value="${food.foodName}" name="${food.foodId}">
                        </td>
                        <td>
                            <input type="text" id="${food.foodId}" value="UGX ${food.foodPrice}" name="${food.foodId}">
                        </td>
                        <td onclick="removeFoodItem(this, ${food.foodPrice})">
                            <a class="deleteBtn" data-target="${food.foodId}">Delete</a>
                        </td>
    
                `;

        table.appendChild(div);
        message = `${food.foodName} has been added to your order menu.`;
        showPopupMenu(message);

        let price = food.foodPrice;

        totals.push(price);
        console.log(totals);

        console.log(sum);

        totals.forEach(total => {
            sum += total;
            console.log(sum);
            return sum;
        });

        removePrice = (price) => {
            totals.splice(totals.indexOf(price), 1);
            console.log(totals);

            sum -= price;
            console.log(sum);
            priceTotal.innerHTML = `TOTAL: UGX ${sum}`;

            return sum;
        }
        priceTotal.innerHTML = `TOTAL: UGX ${sum}`;
    });
});


function removeFoodItem(elmnt, foodPrice) {
    elmnt.parentElement.style.display = 'none';
    removePrice(foodPrice);
}

showPopupMenu = (popupMessage) => {
    //Set initial state of menu
    let showMenu = false;
    if (!showMenu) {
        popupMenu.classList.add('show');
        popupMenu.innerHTML = popupMessage;
        showMenu = true;
    }

    setTimeout(() => {
        popupMenu.classList.remove('show');
        popupMenu.innerHTML = '';
        showMenu = false;
    }, 3000);

}