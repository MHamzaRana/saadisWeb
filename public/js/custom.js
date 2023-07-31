// $('#searchInput').on('keypress',function(e){
//     if(e.which == 13){
//         $('#searchForm').submit();
//     }

// });
$(document).ready(function(){
    manageAddedItems();
    checkCart();
});
function addToCart(id){
    var items = [];
    items = JSON.parse(localStorage.getItem('items'));
    console.log(items);
    if(!items)
    items = [];
    if(items.indexOf(id) < 0) 
    items.push(id);
    else
    alert('Item is already added!');
    localStorage.setItem('items',JSON.stringify(items));
    $(`.cart_remove[data-id=${id}]`).show();
    $(`.cart_add[data-id=${id}]`).hide();
    checkCart();
}

function removeFromCart(id){
    var items = [];
    items = JSON.parse(localStorage.getItem('items'));
    console.log(items);
    if(!items)
    items = [];
    if(items.indexOf(id) >= 0)
    items.splice(items.indexOf(id), 1);
    else
    alert('Item is already removed!');
    localStorage.setItem('items',JSON.stringify(items));
    $(`.cart_add[data-id=${id}]`).show();
    $(`.cart_remove[data-id=${id}]`).hide();
    checkCart();
}

function manageAddedItems(){
    var items = [];
    items = JSON.parse(localStorage.getItem('items'));
    console.log(items);
    if(!items)
    items = [];
    $.each($('.cart_add'), function(key, val){
        id = $(val).attr('data-id');
        if(items.indexOf(id) >= 0){
            $(`.cart_remove[data-id=${id}]`).show();
            $(`.cart_add[data-id=${id}]`).hide();
        }
    })
}

function checkCart(){
    // noOfItems
    var items = [];
    items = JSON.parse(localStorage.getItem('items'));
    // console.log(items);
    $('#cartItemsValue').val(localStorage.getItem('items'))
    if(!items || !items.length){
        $('#CartInstantView').hide();
    }else{
        $('#CartInstantView').show();
        $('#noOfItems').text(items.length);
        if(items.length > 1){
            $('#cartItemSpell').text('items');
        }else{
            $('#cartItemSpell').text('item');
        }
    }

}
