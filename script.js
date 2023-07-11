function toggleMenu(){
    let navigation = document.querySelector('.navigation');
    let toggle = document.querySelector('.toggle');
    let main = document.querySelector('.main');
    navigation.classList.toggle('active');
    toggle.classList.toggle('active');
    main.classList.toggle('active');
}



var cm;
function cartview(){
    var modal = document.getElementById("verificationModal");
    cm = new bootstrap.Modal(modal);
    cm.open
}

function togalPage(){

    var signUp = document.getElementById("signUp");
    var signIn = document.getElementById("signIn");

    signUp.classList.toggle("d-none");
    signIn.classList.toggle("d-none");

}

function signUp() {

    var fname = document.getElementById("firstname");
    var lname = document.getElementById("lastname");
    var gender = document.getElementById("gender");
    var mobile = document.getElementById("mobile");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    

    var form = new FormData;
    form.append("Firstname1", fname.value);
    form.append("Lastname1", lname.value);
    form.append("Gender1", gender.value);
    form.append("mobile1", mobile.value);
    form.append("email1", email.value);
    form.append("password1", password.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                document.getElementById("showmsg").innerHTML = t;
                document.getElementById("showmsg").className = 'bx bxs-user-check mt-2 fs-5';
                document.getElementById("alert").className = "alert alert-success";
                document.getElementById("msgalert").className = "d-block";
            } else {
                document.getElementById("showmsg").innerHTML = t;
                document.getElementById("msgalert").className = "d-block";

            }
        }
    }

    r.open("POST","signUpProcess.php", true);
    r.send(form);

}


function signIn(){

    var email = document.getElementById("email1");
    var password = document.getElementById("password1");
    var rememberme = document.getElementById("rememberme");

    var f = new FormData();
    f.append("e", email.value);
    f.append("p", password.value);
    f.append("r", rememberme.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var txt = r.responseText;
            if (txt == "success") {
                window.location = "home.php";
            } else {
                document.getElementById("msg2").innerHTML = txt;
            }

        }
    };

    r.open("POST", "signInProcess.php", true);
    r.send(f);

}


function custermerlogout() {
    window.location = "logoutproccess.php";
} 


function addToCart(id) {

    var cart = new XMLHttpRequest();

    cart.onreadystatechange = function () {
        if (cart.readyState == 4) {
            var t = cart.responseText;
            alert(t);
        }
    }

    cart.open("GET","addToCartProcess.php?id=" + id, true);
    cart.send();

}



function deleteCartProduct(id){
    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.readyState == 4&&r.status==200){
            var t = r.responseText;
            window.location.reload();
            if(t == "success"){
                
            }else{
                alert (t);
            }
            
        }
    }

    r.open("GET","deletcartProcess.php?id="+id,true);
    r.send();
}


function addToWatchlist(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            window.location.reload();
            if (t == "removed") {
                window.location.reload();
                document.getElementById("heart" + id).style.className = "text-dark";                
            } else if (t == "Added ") {
                document.getElementById("heart" + id).style.className = "text-warning";               
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "watchlistProccess.php?id=" + id, true);
    r.send();
}


function deletFromWatchlist(id){
    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "success"){
                alert("Remove Success");
                window.location.reload();
            }else{
                alert (t);
            }
            
        }
    }

    r.open("GET","deletefromwatchlist.php?id="+id,true);
    r.send();
}



function LogOut() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                // window.location = "home.php";
                window.location.reload();

            } else {
                alert(t);
            }
        }
    };

    r.open("GET", "signoutProcess.php", true);
    r.send();

}

function payNow(id){
    var qty = document.getElementById("qty_input").value;

    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState==4){
            var t = r.responseText;
            var obj = JSON.parse(t);

            var mail = obj["umail"];
            var amount = obj["amount"];

            if(t == 1){
                alert ("Please login.");
                window.location = "index.php";
            }else if(t == 2){
                alert ("Please Update your profile");
                window.location = "userProfile.php";
            }else{
                // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:"+ orderId);

        saveInvoice(orderId,id,mail,amount,qty);

        // Note: validate the payment and show success or failure page to the customer
    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:"  + error);
    };

    // Put the payment variables here
    var payment = {
        "sandbox": true,
        "merchant_id": "1222835",    // Replace your Merchant ID
        "return_url": "http://localhost/dorakadata.lk/singalproduct.php?id=" + id,     // Important
        "cancel_url": "http://localhost/dorakadata.lk/singalproduct.php?id=" + id,     // Important
        "notify_url": "http://sample.com/notify",
        "order_id": obj["id"],
        "items": obj["item"],
        "amount": amount,
        "currency": "LKR",
        "hash": obj["hash"], 
        "first_name": obj["fname"],
        "last_name": obj["lname"],
        "email": mail,
        "phone": obj["mobile"],
        "address": obj["address"],
        "city": obj["city"],
        "country": "Sri Lanka",
        "delivery_address": obj["address"],
        "delivery_city": obj["city"],
        "delivery_country": "Sri Lanka",
        "custom_1": "",
        "custom_2": ""
    };

    // Show the payhere.js popup, when "PayHere Pay" is clicked
    // document.getElementById('payhere-payment').onclick = function (e) {
        payhere.startPayment(payment);
    // };
            }
        }
    }

    r.open("GET","buyNowProcess.php?id="+id+"&qty="+qty,true);
    r.send();
}

function saveInvoice(orderId,id,mail,amount,qty){

    var f = new FormData();
    f.append("o",orderId);
    f.append("i",id);
    f.append("m",mail);
    f.append("a",amount);
    f.append("q",qty);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "1"){

                window.location = "invoice.php?id="+orderId;

            }else{
                alert (t);
            }
        }
    }

    r.open("POST","saveInvoice.php",true);
    r.send(f);

}

function printInvoice(){
    // alert("hello");
    var restorepage = document.body.innerHTML;
    var page = document.getElementById("page").innerHTML;
    document.body.innerHTML = page;
    window.print();
    document.body.innerHTML = restorepage;
}

var am;
function adminlogin(){
    var email = document.getElementById("email");

    var f = new FormData();
    f.append("email",email.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "Success"){
                var adminloginmodal = document.getElementById("adminverificationModal");
                am = new bootstrap.Modal(adminloginmodal);
                am.show();
            }else{
                alert(t);
            }
        }
    }

    r.open("POST","adminVerificationProcess.php",true);
    r.send(f);
}

function verifyadmin(){
    var verification = document.getElementById("verification");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "success"){
                am.hide();
                window.location = "bashbord.php";
            }else{
                alert (t);
            }
            
        }
    }

    r.open("GET","verificationProcess.php?v="+verification.value,true);
    r.send();
}

function AdminLogOut() {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                // window.location = "adminsignIn.php.php";
                window.location.reload();

            } else {
                alert(t);
            }
        }
    };

    r.open("GET","adminlogoutprocess.php", true);
    r.send();

}


function basicSearch(x) {

    var txt = document.getElementById("basicsearch_txt");
    var select = document.getElementById("basicsearch_select");

    var f = new FormData();
    f.append("t", txt.value);
    f.append("s", select.value);
    f.append("page", x);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("basicSearchResult").innerHTML = t;
        }
    }

    r.open("POST", "basicSearchProcess.php", true);
    r.send(f);

}

function advancedSearch(x) {
    var txt = document.getElementById("t");
    var category = document.getElementById("c1");
    var brand = document.getElementById("b1");
    var condition = 0;

    if (document.getElementById("br").checked) {
        condition = 1;
    } else if (document.getElementById("us").checked) {
        condition = 2;
    }else if (document.getElementById("os").checked) {
        condition = 3;
    }
    var Activetime = 0;

    if (document.getElementById("no").checked) {
        Activetime = 1;
    } else if (document.getElementById("on").checked) {
        Activetime = 2;
    }
    var from = document.getElementById("pf");
    var to = document.getElementById("pt");
    var sort = document.getElementById("s");

    var f = new FormData();
    f.append("t", txt.value);
    f.append("cat", category.value);
    f.append("b", brand.value);
    f.append("con", condition);
    f.append("Act", Activetime);
    f.append("pf", from.value);
    f.append("to", to.value);
    f.append("s", sort.value);
    f.append("page", x);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("view_area").innerHTML = t;
        }
    }

    r.open("POST", "advancedSearchProcess.php", true);
    r.send(f);

}

function updateProfile() {

    var ufname = document.getElementById("first_name");
    var ulname = document.getElementById("last_name");
    var umobile = document.getElementById("mobile");
    var uaddress = document.getElementById("address");

    var f = new FormData();

    f.append("first_name",ufname.value);
    f.append("last_name", ulname.value);
    f.append("mobile",umobile.value);
    f.append("address",uaddress.value);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {

                // window.location = "home.php"
                window.location.reload();

            } else {
                alert(t);
            }
        }
    };

    r.open("POST", "updateProfileProcess.php", true);
    r.send(f);

}



function blockuser(email){
    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var txt =r.responseText;
            if(txt == "blocked"){
                document.getElementById("TB"+email).innerHTML = "Unblock";
                document.getElementById("TB"+email).classList = "btn btn-danger";
            }else if(txt == "unblocked"){
                document.getElementById("TB"+email).innerHTML = "Block";
                document.getElementById("TB"+email).classList = "btn btn-primary";
            }
            alert (txt);
        }
    }

    r.open("GET","UserBlockProccess.php?email="+email,true);
    r.send();

}



function blockProduct(id){
    var r = new XMLHttpRequest;

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "Blocked") {
                document.getElementById("BP" + id).innerHTML = "Unblock";
                document.getElementById("BP" + id).classList = "btn btn-danger";
                window.location.reload();
            } else if (t == "Unblocked") {
                document.getElementById("BP" + id).innerHTML = "Block";
                document.getElementById("BP" + id).classList = "btn btn-success ";
                window.location.reload();
            } 
            alert(t);

        }
    }

    r.open("GET","productblockproccess.php?id="+id,true);
    r.send();
}

function removeProduct(email){
    // alert("hello")
    var r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.readyState == 4){
            var t = r.responseText;
            if(t == "success"){
                alert("Remove Success");
                window.location.reload();
            }else{
                alert (t);
            }
            
        }
    }
    r.open("GET","manegeproductproccess.php?id="+email,true);
    r.send();
}

function savecolor(){
    var newcolor = document.getElementById("newcolor");

    var f = new FormData();
    f.append("color", newcolor.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t) {
                alert("color added success.")
                window.location.reload();
            } else {
                alert(t);
            }

        }
    }

    r.open("POST","Addcolor.php",true);
    r.send(f);

}

function saveBrand(){
    var newbrand = document.getElementById("newBrand");

    var f = new FormData();
    f.append("brand", newbrand.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t) {
                alert("Brand added success.")
                window.location.reload();
            } else {
                alert(t);
            }

        }
    }

    r.open("POST","AddBrand.php",true);
    r.send(f);

}

function saveCatrgory(){
    var newcategory = document.getElementById("newcategory");

    var f = new FormData();
    f.append("Category", newcategory.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t) {
                alert("category added success.")
                window.location.reload();
            } else {
                alert(t);
            }

        }
    }

    r.open("POST","AddCategory.php",true);
    r.send(f);

}

function addProduct() {
    var category = document.getElementById("category");
    var brand = document.getElementById("brand");
    var color = document.getElementById("color");
    var condition = document.getElementById("condition");
    var title = document.getElementById("title");
    var qty = document.getElementById("qty");
    var Price = document.getElementById("price");
    var desc = document.getElementById("desc");
    var image = document.getElementById("imageuploader");

    var f = new FormData();

    f.append("category", category.value);
    f.append("brand", brand.value);
    f.append("color", color.value);
    f.append("condition", condition.value);
    f.append("title", title.value);
    f.append("qty", qty.value);
    f.append("price", Price.value);
    f.append("desc", desc.value);

    var file_count = image.files.length;

    for (var x = 0; x < file_count; x++) {

        f.append("image" + x, image.files[x]);

    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            
            if (t == "Product images saved successfully") {
                window.location.reload();
            } else {
                alert(t);
            }

        }
    }

    r.open("POST","AddproductProccess.php",true);
    r.send(f);

}

function changeProductImage() {

    var image = document.getElementById("imageuploader");

    image.onchange = function () {

        var file_count = image.files.length;

        if (file_count <= 3) {

            for (var x = 0; x < file_count; x++) {

                var file = this.files[x];
                var url = window.URL.createObjectURL(file);

                document.getElementById("i" + x).src = url;

            }

        } else {
            alert(file_count + " files. You are proceed to upload only 3 or less than 3 files.");
        }

    }

}

function sendId(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;

            if (t == "success") {
                window.location = "updateProduct.php";
            } else {
                alert(t);
            }

        }
    }

    r.open("GET", "sendIdProcess.php?id=" + id, true);
    r.send();

}


function updateProduct() {
    var title = document.getElementById("T");
    var description = document.getElementById("D");
    var price = document.getElementById("P");
    var qty = document.getElementById("Q");
    var images = document.getElementById("imageuploader");

    var f = new FormData();
    f.append("T", title.value);
    f.append("Q", qty.value);
    f.append("P", price.value);
    f.append("D", description.value);

    var file_count = images.files.length;

    for (var x = 0; x < file_count; x++) {
        f.append("i" + x, images.files[x]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload;
            } else {
                alert(t);
            }
        }
    }

    r.open("POST","updateproductprocess.php",true);
    r.send(f);

}


function sortserching(x) {

    var search = document.getElementById("s");

    var  Price = "0";

    if (document.getElementById("h").checked) {
        Price = "1";
    } else if (document.getElementById("l").checked) {
        Price = "2";
    }

    var Alphabetical = "0";

    if (document.getElementById("b").checked) {
        Alphabetical = "1";
    } else if (document.getElementById("u").checked) {
        Alphabetical = "2";
    }

    var f = new FormData();
    f.append("s", search.value);
    // f.append("t", time);
    f.append("q",  Price);
    f.append("c", Alphabetical);
    f.append("page", x);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {

        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("sort").innerHTML = t;
        }

    }

    r.open("POST","sortproccess.php", true);
    r.send(f);

}

function clearsort() {
    window.location.reload();
}




function check_value(qty) {

    var input = document.getElementById("qty_input");

    if (input.value <= 0) {
        alert("Quantity must be 1 or more");
        input.value = 1;
    } else if (input.value > qty) {
        alert("Insufficient Quantity.");
        input.value = qty;
    }

}

function qty_inc(qty) {

    var input = document.getElementById("qty_input");

    if (input.value < qty) {

        var newValue = parseFloat(input.value) + 1;
        input.value = newValue.toString();

    } else {

        alert("Maximum quantity has achieved");
        input.value = qty;

    }

}

function qty_dec() {

    var input = document.getElementById("qty_input");

    if (input.value > 1) {
        var newValue = parseFloat(input.value) - 1;
        input.value = newValue.toLocaleString();
    } else {
        alert("Minimum quantity has achieved");
        input.value = 1;
    }

}
