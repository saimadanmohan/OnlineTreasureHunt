$.ajaxSetup({
    global: true
});
$(document).ready(function() {
    function isAlphanumeric(str) {
        return /^[a-zA-Z]+$/.test(str);
    }
    $("form").submit(function(event) {
        $body = $("body");
        //$body.addClass("loading");
        event.preventDefault();

        var teamname = $("#teamname").val().trim();
        var password = $("#password").val();

        var err = "";
        //alert(grad_year);


        if (teamname.length == 0 || !isAlphanumeric(teamname))
            err += "team name should not be empty and should not contain any special characters\n";
        if (err.localeCompare("") != 0) {
            BootstrapDialog.alert(err);
            return;
        }



        var formData = new FormData($(this)[0]);
        $.ajax({
            url: "logincallback.php",
            type: "POST",
            data: formData,
            async: true,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data, textStatus, jqXHR) {
                if(data.localeCompare("0") == 0 ) {
                     //console.log("hello here");
                     window.location="index.php";
                }
                 else 
                 {
                         BootstrapDialog.alert(data+"incorrect Password");
                 }//else
                  //  alert("sent data" + data);
               // $body.removeClass("loading");

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert(textStatus + "failed" + errorThrown + " " + jqXHR);
                console.log(jqXHR);
                //$body.removeClass("loading");

            }

        });
    });
});

