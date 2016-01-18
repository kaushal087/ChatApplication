var sendMessage = function(e, message)
{
    console.log("getMessages");
         $.ajax({
                url: "./get_message.php", // the endpoint
                type: "GET", // http method
                data: {
                    userid: 1,
                    message:message 
                }, // data sent with the post request

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
    return false;
    

});

$('form').bind("keypress", function(e) {
    
  console.log("Hit enter");
   
   if (e.keyCode == 13) {   

    e.preventDefault();


    var message = $("#newchat").val();

    var data = sendMessage(e, message);


    $('#newchat').val("");
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
      //console.log(data);
      console.log("success");
    },
    complete: function() {
      // Schedule the next request when the current one's complete
      setTimeout(getMessages, 1000);
    },
    error: function(xhr, errmsg, err) {

                    console.log("error");
                    console.log(xhr.status + ": " + xhr.responseText); // provide a bit more info about the error to the console
                }
  });
})();