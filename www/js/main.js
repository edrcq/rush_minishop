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
    console.log(Cart);
}

function cartSave() {
    localStorage.setItem('mycart', JSON.stringify(Cart));
}

if (window.location.href.indexOf('cart') > -1) {
    console.log(Cart);
    var cartDiv = document.getElementById('cart');
    for (id in Cart.list) {
        var item = document.createElement("div");
        var itemName = document.createElement("div");
        var itemPrice = document.createElement("div");
        var itemQuantity = document.createElement("div");
        var textPrice = document.createTextNode(Cart.list[id].price);
        var textName = document.createTextNode(Cart.list[id].name);
        var textQuantity = document.createTextNode(Cart.list[id].quantity);
        itemQuantity.appendChild(textQuantity);
        itemName.appendChild(textName);
        itemPrice.appendChild(textPrice);
        item.appendChild(itemName);
        item.appendChild(itemPrice);
        item.appendChild(itemQuantity);
        cartDiv.appendChild(item);
    }
    var nbItem = document.createElement("div");
    nbItem.appendChild(document.createTextNode(Cart.nb));
    var totalCart = document.createElement("div");
    totalCart.appendChild(document.createTextNode(Cart.total));
    cartDiv.appendChild(nbItem);
    cartDiv.appendChild(totalCart);
}