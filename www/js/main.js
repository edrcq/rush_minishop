var Cart = {
    nb: 0,
    list: {},
    total: 0.00,
}

function addProductToCart(id, name, quantity, price) {
    if (Cart.list.hasOwnProperty(id)) {
        quantity += Cart.list[id].quantity;
    }
    Cart.list[id] = {
        name: name,
        quantity: qt,
        price: price
    };
    Cart.nb++;
}
