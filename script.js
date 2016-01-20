var displayMessage = function(messages)
{
    content = $("#messages").html();



    for (var i = 0; i < messages.length; i++) {

        content = content + "<div>"
        
        username = messages[i][0]
        message = messages[i][1];
        timestamp = messages[i][2];

        content = content +  username +"<br/>" + message + "<br/>" + timestamp;

        content = content + "</div>";
        content = content + "<hr/>";

    };
    $("#messages").html(content);


}

var displayOnline = function(users)
{
    //content = $("#onusers").html();

    var content = "";

    for (var i = 0; i < users.length; i++) {

        username = users[i][1];

        content = content +  username +"<br/>";

    };
    $("#onusers").html(content);


}

var sendMessage = function(e, message)
{
    //console.log("getMessages");
   // console.log(e);
   // console.log(message);

         $.ajax({
                url: "./save_message.php", // the endpoint
                type: "POST", // http method
                data:{message:message},

                 // data sent with the post request

                // handle a successful response
                success: function(data) {
                    console.log("success"); // another sanity check
                    console.log(data);


                    //location.reload();

                },

                // handle a non-successful response
                error: function(xhr, errmsg, err) {

                    console.log("error");
                    console.log(xhr.status + ": " + xhr.responseText); // provide a bit more info about the error to the console
                }
            });
}

$(document).on("click", "#sendchat", function(e){ 

    console.log("button click"); 
    e.preventDefault();


    var message = $("#newchat").val();

    var data = sendMessage(e, message);

    $('#newchat').val("");
    focusChat();
    return false;
    

});

$('form').bind("keypress", function(e) {
    
  console.log("Hit enter");
   
   if (e.keyCode == 13) {   

    e.preventDefault();


    var message = $("#newchat").val();

    var data = sendMessage(e, message);


    $('#newchat').val("");

    focusChat();
    return false;
  }
});


(function getMessages() {
    console.log("Ajax Call");

  $.ajax({
    url: 'get_message.php', 
    type: "GET",
    data:
    {

    },

    success: function(data) {
      
      console.log("success");
      console.log(data);

      displayMessage(data);

    },
    complete: function() {
      // Schedule the next request when the current one's complete
      setTimeout(getMessages, 2500);
    },
    error: function(xhr, errmsg, err) {

                    console.log("error");
                    console.log(xhr.status + ": " + xhr.responseText); // provide a bit more info about the error to the console
                }
  });
})();


var focusChat = function(){
    $('#newchat').focus();
};


$( document ).ready(function() {  

    //alert(getCookie('username'));

    welcomeText = "Welcome  " + getCookie('username') + " ";

  $('#welcome').html(welcomeText);

//    alert(welcomeText);

    focusChat();
});






(function getOnline() {
    console.log("Ajax Call");

  $.ajax({
    url: 'get_online.php', 
    type: "GET",
    data:
    {

    },

    success: function(data) {
      
      console.log("success");
      console.log(data);

      displayOnline(data);

    },
    complete: function() {
      // Schedule the next request when the current one's complete
      setTimeout(getOnline, 3000);
    },
    error: function(xhr, errmsg, err) {

                    console.log("error");
                    console.log(xhr.status + ": " + xhr.responseText); // provide a bit more info about the error to the console
                }
  });
})();




function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}