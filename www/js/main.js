var Cart = {
    nb: 0,
    list: {},
    total: 0.00,
}

if ((tmpCart = localStorage.getItem('mycart')) !== null) {
    Cart = JSON.parse(tmpCart);
}

function cartAddProduct(id, name, quantity, price) {
    if (Cart.list.hasOwnProperty(id)) {
        quantity += Cart.list[id].quantity;
    }
    Cart.list[id] = {
        name: name,
        quantity: quantity,
        price: parseFloat(price).toFixed(2)
    };
    Cart.nb++;
    cartCalcTotal();
}

function cartCalcTotal() {
    var total = 0.00;
    for (id in Cart.list) {
        total += parseFloat(Cart.list[id].price).toFixed(2) * parseFloat(Cart.list[id].quantity);
    }
    Cart.total = total.toFixed(2);
    cartSave();
}

function renderCart() {
    printCartOnPage();
}

function cartSave() {
    localStorage.setItem('mycart', JSON.stringify(Cart));
}

function buyCart() {
    fillFormData();
    document.getElementById('cartForm').submit();
}

function cleanCart() {
    Cart = {
        nb: 0,
        list: {},
        total: 0.00,
    };
}

function fillFormData() {
    document.getElementById('cartData').value = JSON.stringify(Cart);
}

function removeOneItem(id) {
    quantity = 0;
    if (Cart.list.hasOwnProperty(id)) {
        quantity = Cart.list[id].quantity - 1;
    }
    else {
        return ;
    }
    Cart.list[id].quantity = quantity;
    Cart.nb--;
    Cart.total -= Cart.list[id].price;
    cartSave();
    printCartOnPage();
}

function createRemoveBtn(id) {
    var btn = document.createElement('button');
    btn.classList.add('btn-rem')
    btn.onclick = function() { removeOneItem(id); };
    btn.appendChild(document.createTextNode('-1'));
    return (btn);
}

function printCartOnPage() {
    if (window.location.href.indexOf('cart') > -1) {
        console.log(Cart);
        var cartDiv = document.getElementById('cart');

        while (cartDiv.firstChild) {
            cartDiv.removeChild(cartDiv.firstChild);
        }

        for (id in Cart.list) {
            if (!(Cart.list[id].quantity > 0)) {
                continue ;
            }
            var item = document.createElement("div");
            item.classList.add('item');
            var itemName = document.createElement("div");
            itemName.classList.add('itemName');
            var itemPrice = document.createElement("div");
            itemPrice.classList.add('itemPrice');
            var itemQuantity = document.createElement("div");
            itemQuantity.classList.add('itemQuantity');
            var textPrice = document.createTextNode(Cart.list[id].price);
            var textName = document.createTextNode(Cart.list[id].name);
            var textQuantity = document.createTextNode(Cart.list[id].quantity);
            itemQuantity.appendChild(textQuantity);
            itemName.appendChild(textName);
            itemPrice.appendChild(textPrice);
            item.appendChild(itemName);
            item.appendChild(itemPrice);
            item.appendChild(itemQuantity);
            var btn = createRemoveBtn(id);
            item.appendChild(btn);
            cartDiv.appendChild(item);
        }
        var nbItem = document.createElement("div");
        nbItem.appendChild(document.createTextNode("Count items : " + Cart.nb));
        nbItem.classList.add('nbItem');
        var totalCart = document.createElement("div");
        totalCart.classList.add('totalCart');
        totalCart.appendChild(document.createTextNode("Total : " + Cart.total + " $"));
        cartDiv.appendChild(nbItem);
        cartDiv.appendChild(totalCart);
        fillFormData();
    }
}

printCartOnPage();