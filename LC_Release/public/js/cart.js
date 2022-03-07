var totalprice = 0;
var cartqty = 0;

function totalQty(){
    keys = Object.keys(localStorage),
    i = keys.length;
    if (i > 0){
        for (let id = 0; id < i; id++) {
            var p_id = localStorage.key(id).split('°').pop()
            var productN = 'Produit n°' + p_id;
            var dic = JSON.parse(localStorage.getItem(productN));

            cartqty = cartqty + dic[0]['qty'];
        }    
    }
    var headerCart = document.getElementById("headerCart");
    headerCart.innerHTML = '&nbsp'+ cartqty;
}

function addProduct(p_id, p_title, p_price, p_image) {
    var productN = 'Produit n°' + p_id;

    if (localStorage.getItem(productN) == null) {
        let dic = [{id: p_id, title: p_title, price: p_price, picture_link: p_image, qty: 1}];
        localStorage.setItem(productN , JSON.stringify(dic) );
        
    } else {
        incrementProduct(p_id);
    }
}

function incrementProduct(p_id){
    var productN = 'Produit n°' + p_id;
    var dic = JSON.parse(localStorage.getItem(productN));
    localStorage.removeItem(productN);

    qty = dic[0]["qty"];
    qty++;
    dic[0]["qty"] = qty;

    localStorage.setItem(productN , JSON.stringify(dic) );
    location.reload();
}

function decrementProduct(p_id){
    var productN = 'Produit n°' + p_id;
    var dic = JSON.parse(localStorage.getItem(productN));
    localStorage.removeItem(productN);

    qty = dic[0]["qty"];
    qty--;
    dic[0]["qty"] = qty;

    localStorage.setItem(productN , JSON.stringify(dic) );
    if (qty < 1 ) {
        localStorage.removeItem(productN);
    }
    location.reload();
}

function removeProduct(p_id){
    var productN = 'Produit n°' + p_id;
    localStorage.removeItem(productN);
    location.reload();
}

function clearCart() {
    localStorage.clear();
}



function displayCart(){
    keys = Object.keys(localStorage),
    i = keys.length;
    let buydiv = document.getElementById("notlogin");
    buydiv.style.visibility='hidden';
    let cartvide = document.getElementById("cartvide")
    cartvide.style.visibility= 'visible';
    if (i > 0){
        cartvide.style.visibility='hidden';
        buydiv.style.visibility='visible'
        let elem = document.getElementById("Cart")

        while (elem.firstChild) {
            elem.removeChild(elem.firstChild);
        }

        var cartbox = document.createElement("div");
        cartbox.setAttribute('class', 'cart_box')
        elem.appendChild(cartbox);

        var cart_table = document.createElement("table");
        cart_table.setAttribute('class', 'cart_table');
        cartbox.appendChild(cart_table);

        var tbody = document.createElement("tbody");
        cart_table.appendChild(tbody)

        var tr = document.createElement("tr");
        tbody.appendChild(tr)

        var td = document.createElement("td");
        var tdName = document.createElement("td");
        var tdPrice = document.createElement("td");
        var tdQty = document.createElement("td");
        td.setAttribute('class', 'cart_name_item');
        tdName.setAttribute('class', 'cart_name_item');
        tdName.textContent = 'Name';
        tdPrice.setAttribute('class', 'cart_name_item');
        tdPrice.textContent = 'Price';
        tdQty.setAttribute('class', 'cart_name_item');
        tdQty.textContent = 'Quantity';
        tr.appendChild(td);
        tr.appendChild(tdName);
        tr.appendChild(tdPrice);
        tr.appendChild(tdQty);

        for (let id = 0; id < i; id++) {
            var p_id = localStorage.key(id).split('°').pop()
            var productN = 'Produit n°' + p_id;
            var dic = JSON.parse(localStorage.getItem(productN));

            var tritem = document.createElement("tr");
            tritem.setAttribute('class', 'cart_item');
            tbody.appendChild(tritem);

            var tdImg = document.createElement("td");
            tdImg.setAttribute('class', 'cart_name_item');
            tritem.appendChild(tdImg);
            var img = document.createElement("img");
            img.setAttribute('class','productimg');
            img.src = '/' + dic[0]['picture_link'];
            tdImg.appendChild(img);

            var tdTitle = document.createElement("td");
            tdTitle.setAttribute('class', 'cart_name_item');
            tdTitle.innerHTML = dic[0]['title'] + '&nbsp';
            tritem.appendChild(tdTitle);

            var tdPrice = document.createElement("td");
            tdPrice.setAttribute('class', 'cart_name_item');
            tdPrice.innerHTML = '&nbsp' + dic[0]['price'] + '&nbsp' +'€' + '&nbsp';
            tritem.appendChild(tdPrice);

            var tdQantity = document.createElement("td");
            tdQantity.setAttribute('class', 'cart_name_item');
            tdQantity.innerHTML = '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' + dic[0]['qty'];
            tritem.appendChild(tdQantity);

            var tdTrash = document.createElement("td");
            tdTrash.setAttribute('class', 'cart_name_item');
            tritem.appendChild(tdTrash);
            var trashButton = document.createElement("button");
            trashButton.setAttribute('class', 'trash');
            buttonOnclickValue = 'removeProduct(' + p_id + ')';
            trashButton.setAttribute('onclick', buttonOnclickValue);
            tdTrash.appendChild(trashButton);
            var iTrash = document.createElement("i");
            iTrash.setAttribute('class', 'fas fa-trash-alt');
            trashButton.appendChild(iTrash);

            var tdPlus = document.createElement("td");
            tdPlus.setAttribute('class', 'cart_name_item');
            tritem.appendChild(tdPlus);
            var plusButton = document.createElement("button");
            plusButton.setAttribute('class', 'plus');
            buttonOnclickValue = 'incrementProduct(' + p_id + ')';
            plusButton.setAttribute('onclick', buttonOnclickValue);
            tdPlus.appendChild(plusButton);
            var iPlus = document.createElement("i");
            iPlus.setAttribute('class', 'fas fas fa-plus');
            plusButton.appendChild(iPlus);

            var tdLess = document.createElement("td");
            tdLess.setAttribute('class', 'cart_name_item');
            tritem.appendChild(tdLess);
            var lessButton = document.createElement("button");
            lessButton.setAttribute('class', 'less');
            buttonOnclickValue = 'decrementProduct(' + p_id + ')';
            lessButton.setAttribute('onclick', buttonOnclickValue);
            tdLess.appendChild(lessButton);
            var iLess = document.createElement("i");
            iLess.setAttribute('class', 'fas fas fa-minus');
            lessButton.appendChild(iLess);

            totalprice = totalprice + dic[0]['price'] * dic[0]['qty'];

        }
    

        var tableTotal = document.createElement("table");
        tableTotal.setAttribute('class', 'cart_table');
        cartbox.appendChild(tableTotal);

        var trTotal = document.createElement("tr");
        tableTotal.appendChild(trTotal);

        var tdTotalName = document.createElement("td");
        tdTotalName.setAttribute('class', 'cart_name_item');
        tdTotalName.innerHTML = '&nbsp' + 'total' + '&nbsp' + '=' + '&nbsp';
        trTotal.appendChild(tdTotalName);

        var tdTotalPrice = document.createElement("td");
        tdTotalPrice.setAttribute('class', 'cart_name_item');
        tdTotalPrice.innerHTML = '&nbsp' + totalprice + '&nbsp' + '€' + '&nbsp';
        trTotal.appendChild(tdTotalPrice);
        var order = document.getElementById("order")
        var tab = [];
        for (let id = 0; id < i; id++) {
            var p_id = localStorage.key(id).split('°').pop()
            var productN = 'Produit n°' + p_id;
            var dic = JSON.parse(localStorage.getItem(productN));
            var amont = dic[0]['qty'];
            var product_id = dic[0]['id'];
            var total_order = totalprice;
            var tab2 = [product_id,amont,totalprice];
            tab.push(tab2);
        }


        var input = document.createElement("input");
        input.setAttribute('name','product');
        input.setAttribute('value', tab)
        input.type = 'hidden';
        order.appendChild(input);

    
        var buybutton = document.createElement("button");
        buybutton.type = 'submit';
        buybutton.setAttribute('class','submit3')
        buttonOnclickValue = 'clearCart()';
        buybutton.setAttribute('onclick', buttonOnclickValue);
        buybutton.innerHTML = 'BUY';
        order.appendChild(buybutton);
    }
}

