function DoSaveTask() {
    var id = document.getElementById('id').value;
    var status;
    var wasedit;
    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;

    if ($('#status').is(':checked')){
        status=1;
    } else {
        status=0;
    }
    if (id>0){
        wasedit=1;
    } else {
        wasedit=0;
    }

    var text  = document.getElementById('text').value;

    var re = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i;
    var myMail = document.getElementById('email').value;
    var valid = re.test(myMail);
    if (valid) {
        $.ajax({
            type: "POST",
            url: "/task/option",
            //url: "app/controller/taskcontroller.php",
            data: {
                id: id,
                status: status,
                text: text,
                username: username,
                email: email,
                wasedit: wasedit
            },
            dataType: 'json'
        }).done(function (data) {
            if (data = '1') {
                document.location.href = "/main/index";
            }
            if (data = '222') {  {
                 document.location.href = "/user/signin";
            }}
            console.log(data);
        });
    }
    else alert ('Адрес электронной почты введен неправильно!');

    }