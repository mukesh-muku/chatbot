<?php
include('config.php');
// check if the 'message' parameter is set in the POST request
if(isset($_POST['message'])){
    // get the value of 'message' parameter
    $message = $_POST['message'];
    // Prepare and execute a SELECT statement to fetch the response from the chatb table
    $stmt = $conn->prepare("SELECT response FROM chatb WHERE text LIKE :text");
    $stmt->bindValue(':text', "%$message%");
    $stmt->execute();
    // check if there is a match in the database
    if($stmt->rowCount() > 0) {
        // if there is, retrieve the response from the database
        $result = $stmt->fetch();
        $response = $result['response'];
    } 
    // check if the message contains the word 'weather'
    else if (strpos($message, 'weather') !== false) {
        // if it does, retrieve the weather for a specific location based on API
        $latitude = '28.7041'; // it's delhi latitude,replace with the latitude of the location you want to retrieve the weather for
        $longitude = '77.1025'; // it's delhi Longitude, replace with the longitude of the location you want to retrieve the weather for

        $url = "https://api.open-meteo.com/v1/forecast?latitude=$latitude&longitude=$longitude&current_weather=true&hourly=temperature_2m,relativehumidity_2m,windspeed_10m";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($json, true);
        
        $temperature = $data['current_weather']['temperature'];
        $windspeed = $data['current_weather']['windspeed'];
        $response = "The current temperature of Delhi is $temperature  degrees Celsius and Windspeed is $windspeed km/h";
    } 
    else if (preg_match('/\b(who)\b.*\b(you)\b/i', $message)) {
        // if it does, set the response to the creator of the chatbot
        $response = "I am mukesh kumar, it's demo prototype of chat bot.<br>I am a seasoned professional with a diverse skill set and a passion for driving projects to success.<br>
         With a keen eye for detail, I analyze project requirements meticulously and engage in system architecture, project planning, and management to ensure seamless execution. Collaborating closely with stakeholders, I discuss database structures and make sound technical decisions. My approach involves assigning modules to team members based on their strengths and tracking project progress diligently. I conduct thorough code reviews, test modules rigorously, and interact with clients through various channels to ensure their satisfaction. Committed to excellence, I follow established processes and frameworks, contributing to organizational success with every endeavor.";
    } 
    else if (preg_match('/\b(tell)\b.*\b(yourself)\b/i', $message)) {
        // if it does, set the response to the creator of the chatbot
        $response = "My self Mukesh kumar, I have 14 years of experiance in  PHP Programming through effective utilization of professional experience and to make best utilization of my knowledge and skill set for self as well as organization development.<br>
        Current Job Responsibility<br>
        My current Job responsibilities includes, but not limited to the following:<br>
        Analyzing the requirements of the project.<br>
        Involve in System Architecture, Project Planning, and Project Management.<br>
        Discussing Database structure with Project Manager.<br>
        Responsible for technical decision.<br>
        Assigning modules to the team members according to their capabilities.<br>
        Keeping track of the project.<br>
        Doing code reviews of the script being developed.<br>
        Testing the modules and assigning issues, if any, to concerned developers.<br>
        Interacting with clients via chat, mail and voice chats.<br>
        Follow well-established processes, methodologies and frameworks that have made organizations successful.";
    } 
    else if (strpos ($message,'time') !== false) {
        // if it is, retrieve the current time in a specific timezone
        date_default_timezone_set('Asia/Calcutta'); // set the timezone to Asia/Calcutta Time as static default value
        $time_zone = date_default_timezone_get(); // get the timezone that is currently set
        $current_time = date('H:i T'); // format the time as "hours:minutes timezone"
        $response = "The current time for $time_zone is $current_time.";
    } 

    // if there is no match in the database, set the response to an error message
    else {
        $response = "I'm sorry, I didn't understand that. Type 'help' for a list of available commands.";
    }
    // echo the response to the user
    echo $response;
}
?>
