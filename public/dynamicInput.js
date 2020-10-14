var i = 0;
$("#add").click(function () {
    ++i;
    $("#dynamicField").append('<div class="input-group col-xs-3"><input class="form-control" name="addmore[event]['+i+']" type="text" placeholder="Type something" /><span class="input-group-btn"><button class="btn btn-danger btn-remove" type="button" name="add" id="add"><span class="glyphicon glyphicon-plus">Remove</span></button></span></div>');
});

$(document).on('click', '.btn-remove', function () {
    $(this).parents('.entry').remove();
});

// $('#companyList').change(function () {
//     var selectedText = $(this).find("option:selected").text();

//     $(".companyName").text(selectedText);
// });

document.querySelectorAll('#companyList').forEach(function (el) {

    el.addEventListener('click', function () {
        // var e = document.getElementById("companyList");
        // var strUser = e.options[e.selectedIndex].value;
        document.querySelector('#companyName').value = el.selectedIndex;
    });
});

