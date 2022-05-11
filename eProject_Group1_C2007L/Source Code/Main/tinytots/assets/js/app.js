function cart(id) {
    $.post("includes/cartProcess.php", {
        id: id
    }, function () {
        $("body").load(window.location.href);
    });

}

function updateCart(id) {
    var num = $("#num" + id).val();
    $.post("includes/cartUpdate.php", {
        num: num,
        id: id
    }, function (data) {
        $("body").load(window.location.href);
    });
}

function deleteCart(id) {
    $.post("includes/cartUpdate.php", {
        num: 0,
        id: id
    }, function (data) {
        $("body").load(window.location.href);
    });
}

function bankChaged(obj) {
    var show = document.getElementById('bank');
    var value = obj.value;
    if (value === 'Bank') {
        show.style.display = 'block';
    }
    if (value != 'Bank') {
        show.style.display = 'none';
    }
}

function order() {

    $.post("includes/orderProcess.php", {
        fname: $("#fName").val(),
        lname: $("#lName").val(),
        phone: $("#phone").val(),
        address: $("#address").val()
    }, function (data) {
        var arr = data.split("--");


        if (arr[1] === " error ") {
            $("#orderTitle").html('<h6 style="color: #ff1d1e;">' + '<i class="far fa-frown-open"></i>' + " " + "SORRY !! SOMETHING WRONG !" + '</h6>');
            $("#orderContent").html('<h4 style="color: #ff1d1e; font-size: 16px">' + arr[0] + '</h4>');
        } else if (arr[1] == " success ") {
            $("#orderTitle").html('<h6 style="color:green; ">' + '<i class="far fa-smile-beam"></i>' + "  " + 'PURCHASE SUCCESSFULLY !' + '</h6>');
            $("#orderContent").html('<h4 style="color:green; ; font-size: 16px">' + arr[0] + '</h4>');
        } else if(arr[1] == "emptycart") {
            $("#orderTitle").html('<h6 style="color: #ff1d1e;">' + '<i class="far fa-frown-open"></i>' + " " + "SORRY !! SOMETHING WRONG !" + '</h6>');
            $("#orderContent").html('<h4 style="color: #ff1d1e; font-size: 16px">' + arr[0] + '</h4>');
        }
        $("#order").modal('toggle');


    });


}

function compareProduct(id) {
    $.post("includes/compareProcess.php", {
        id: id
    }, function (data) {
        var arr = data.split("----");
        $("#addCompare").html('<h6 style="font-weight: normal;color: #000303">' + arr[0] + "</h6>");
        $("#buttonCompare").html(arr[1])
        $("#compare").modal('toggle');


    });
}

function franchise() {
    $.post("includes/franchiseProcess.php", {
        email: $("#franchiseEmail").val(),
        name: $("#franchisePhone").val(),
        phone: $("#franchisePhone").val()
    }, function (data) {
        $('#addCompare').html(data);
        $("#compare").modal('toggle');


    });
}













