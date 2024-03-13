<!DOCTYPE html>
<html>
<head>
 <title>Chatbot for Demonstrations</title>
 <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 <script>
  $(document).ready(function(){
   $('#message').keypress(function(event){
    if(event.keyCode == 13){  // on enter key press  sendMessage function triggred
     sendMessage();
    }
   });
  });

  function sendMessage(){
    var message = $('#message').val();
    if(message != ''){
        $('#chat-area').append('<div class="user-message">'+message+'</div>');
        $('#message').val('');
        $.ajax({
            url: 'process_data.php',
            type: 'POST',
            data: {message: message},
            success: function(data){
                $('#chat-area').append('<div class="admin-message">'+data+'</div>');
                $('#chat-area').scrollTop($('#chat-area')[0].scrollHeight);
            }
        });
    }
}

  
  function startDictation() { // mic button speak to text
      if (window.hasOwnProperty('webkitSpeechRecognition')) {
  
        var recognition = new webkitSpeechRecognition();
  
        recognition.continuous = false;
        recognition.interimResults = false;
  
        recognition.lang = "en-US";
        recognition.start();
  
        recognition.onresult = function(e) {
          document.getElementById('message').value = e.results[0][0].transcript;
          recognition.stop();
          sendMessage();
        };
  
        recognition.onerror = function(e) {
          recognition.stop();
        }
  
      }
  }
 </script>
</head>
<body>
 <div id="chat-container">
  <div id="chat-area"></div>
  <div id="input-container">
   <button id="mic-button" onclick="startDictation()" ><i class="fa fa-microphone"></i></button>
   <input type="text" id="message" placeholder="Type your message here...">
   <button id="send-button" onclick="sendMessage()" ><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
  </div>
 </div>
</body>
</html>