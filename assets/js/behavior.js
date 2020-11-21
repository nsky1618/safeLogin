//for test document ready
// $( document ).ready(function() {
//     console.log( "ready!" );
// });

//shorter method for the document ready event
// $(function(){
//     // jQuery methods go here...
// });

$(document).ready(function() {
    $('#signInBtn').click(function (){
        signIn();
    });
    $('#registerBtn').click(function (){
        registering();
    });

    $('#allUsersRadio').change(function (){
        searching(this.value);
    });

    $('#activeUsersRadio').change(function (){
        searching(this.value);
    })

    $('#textSearch').keyup(function (){
        $('#allUsersRadio').prop('checked', true);
        search_aj(this.value);
    })
});

function signIn(){
    $.ajax({
        url:'login.php',
        type:'post',
        dataType : 'json',
        cache : false,
        data: $('form.login').serialize(),
        success:function (msg){
            if(msg.status == '1') {
                $(location).attr('href','dashboard.php');
            }
            else
                $('#showMessage').html(msg.message);
        }
    })
}

function registering(){
    $.ajax({
        url:'reg.php',
        type:'post',
        dataType: 'json',
        cache: false,
        data: $('form.register').serialize(),
        success: function (msg){
            $('#showMessage').html(msg.message);
        }
    })
}

function searching(val){
    $.ajax({
        url : 'searchUsersState.php',
        type : 'POST',
        data : {searchVal : val},
        success: function (msg){
          $('#showMessage').html(msg);
        },
    })
}

function search_aj(val){
    $.ajax({
        url : "search.php",
        type : "POST",
        data : {searchVal : val},
        success:function (msg) {
            $('#showMessage').html(msg);
        },
    })
}

function search_cnfrm(){
    $.ajax({
        url : "searchConfirm.php",
        type : "POST",
        // data : {searchVal : val},
        success:function (msg) {
            $('#showMessage').html(msg);
        },
    })
}