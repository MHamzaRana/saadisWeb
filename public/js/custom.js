// $('#searchInput').on('keypress',function(e){
//     if(e.which == 13){
//         $('#searchForm').submit();
//     }

// });
$(document).ready(function () {
    manageAddedItems();
    checkCart();
});
function addToCart(id) {
    var items = [];
    items = JSON.parse(localStorage.getItem("items"));
    console.log(items);
    if (!items) items = [];
    if (items.indexOf(id) < 0) items.push(id);
    else alert("Item is already added!");
    localStorage.setItem("items", JSON.stringify(items));
    $(`.cart_remove[data-id=${id}]`).show();
    $(`.cart_add[data-id=${id}]`).hide();
    checkCart();
}

function removeFromCart(id) {
    var items = [];
    items = JSON.parse(localStorage.getItem("items"));
    console.log(items);
    if (!items) items = [];
    if (items.indexOf(id) >= 0) items.splice(items.indexOf(id), 1);
    else alert("Item is already removed!");
    localStorage.setItem("items", JSON.stringify(items));
    $(`.cart_add[data-id=${id}]`).show();
    $(`.cart_remove[data-id=${id}]`).hide();
    checkCart();
}

function manageAddedItems() {
    var items = [];
    items = JSON.parse(localStorage.getItem("items"));
    console.log(items);
    if (!items) items = [];
    $.each($(".cart_add"), function (key, val) {
        id = $(val).attr("data-id");
        if (items.indexOf(id) >= 0) {
            $(`.cart_remove[data-id=${id}]`).show();
            $(`.cart_add[data-id=${id}]`).hide();
        }
    });
}

function checkCart() {
    // noOfItems
    var items = [];
    items = JSON.parse(localStorage.getItem("items"));
    // console.log(items);
    $("#cartItemsValue").val(localStorage.getItem("items"));
    $("#userPhone").val(localStorage.getItem("userPhone"));
    if (!items || !items.length) {
        $("#CartInstantView").hide();
    } else {
        $("#CartInstantView").show();
        $("#noOfItems").text(items.length);
        if (items.length > 1) {
            $("#cartItemSpell").text("items");
        } else {
            $("#cartItemSpell").text("item");
        }
    }
}

function finalCartItems() {
    if ($("#cartItems")) $("#cartItems").val(localStorage.getItem("items"));
}
function autoFillCartInfo() {
    city = localStorage.getItem("userCity");
    country = localStorage.getItem("userCountry");
    $("#userName").val(localStorage.getItem("userName"));
    $("#userPhone").val(localStorage.getItem("userPhone"));
    $("#userCity").val(city);
    $("#userCountry").val(country);
    $("#userAddress").val(localStorage.getItem("userAddress"));
    $("#secondary_phone").val(localStorage.getItem("secondary_phone"));

    $("#userCity option[value='" + city + "']").attr("selected", true);
    $("#userCountry option[value='" + country + "']").attr("selected", true);
}
// Cart related end

// Product Video related
function stopVideo() {
    $("#prodVideoLink").attr("src", "");
}
function playVideo(url) {
    $("#prodVideoLink").attr("src", url);
    // document.getElementById("prodVideoLink").contentWindow.document.getElementsByClass("ytp-play-button").click();
}

// Product Video related end

// Footer JS
// if(performance.navigation.type == 2){
//     location.reload(true);
// }

window.addEventListener('popstate', function(event) {
    // The popstate event is fired each time when the current history entry changes.

    // var r = confirm("You pressed a Back button! Are you sure?!");

    if (1 == 1) {
        // Call Back button programmatically as per user confirmation.
        // history.back();
        // Uncomment below line to redirect to the previous page instead.
        window.location = document.referrer // Note: IE11 is not supporting this.
    } else {
        // Stay on the current page.
        history.pushState(null, null, window.location.pathname);
    }

    history.pushState(null, null, window.location.pathname);

}, false);

// window.addEventListener("pageshow", function (event) {
//     var historyTraversal =
//         event.persisted ||
//         (typeof window.performance != "undefined" &&
//             window.performance.navigation.type === 2);
//     if (historyTraversal) {
//         // Handle page restore.
//         // checkCart();
//           window.location.reload();
//     }
// });
// window.addEventListener("hashchange", function(e) {
//     if(e.oldURL.length > e.newURL.length)
//         checkCart();
//         window.location.reload();
// });

