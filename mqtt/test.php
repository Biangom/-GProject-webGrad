

<?
    $link = mysqli_connect("localhost", "root", "123456", "ngn_db");

    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    
?>
<script type="text/javascript" src="js/script.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.js" type="text/javascript"></script>
<script>
     
    setTimeout("location.reload()",4000);


    client = new Paho.MQTT.Client("m12.cloudmqtt.com",33288,"car1");
        //	33288

    //Example client = new Paho.MQTT.Client("m11.cloudmqtt.com", 32903, "web_" + parseInt(Math.random() * 100, 10));
    // message = new Paho.MQTT.Message("Hello");
    // message.destinationName = "/data/warn";

    // set callback handlers
    client.onConnectionLost = onConnectionLost;
    client.onMessageArrived = onMessageArrived;
    var options = {
        useSSL: true,
        userName: "zqgmlwjg",
        password: "uQietis53KPr",
        onSuccess:onConnect,
        onFailure:doFail
    }

    // connect the client
    client.connect(options);

    // called when the client connects
    function onConnect() {
        // Once a connection has been made, make a subscription and send a message.

        console.log("onConnect");
        //client.subscribe("car1/info");
    }

    function doFail(e){
        console.log(e);
    }
    // called when the client loses its connection
    function onConnectionLost(responseObject) {
        if (responseObject.errorCode !== 0) {
            console.log("onConnectionLost:"+responseObject.errorMessage);
        }
    }

    // called when a message arrives
    function onMessageArrived(message) {
        console.log("onMessageArrived:"+message.payloadString);
    }

    function mqttWarnOn() {
        message = new Paho.MQTT.Message("1");
        message.destinationName = "/data/warn";
        client.send(message);
    }

    function mqttWarnOff() {
        message = new Paho.MQTT.Message("0");
        message.destinationName = "/data/warn";
        client.send(message);
    }

    function mqttEmerOn() {
        message = new Paho.MQTT.Message("1");
        message.destinationName = "/data/emerServer";
        client.send(message);
    }

    function mqttEmerOff() {
        message = new Paho.MQTT.Message("0");
        message.destinationName = "/data/emerServer";
        client.send(message);
    }



    function doWarnOn() {
        mqttWarnOn();
        $.ajax(
            {     
                type:    'post',
                url:     './warn_on.php',
                data:    '&id=' + $('#id').val() + '&name=' +     $('#name').val(),
                dataType: 'json',
            //alert(data);
            success: function(data) 
            {
                //doSend();
                // $sql = "UPDATE lifejacket set EmergencyOn = 1 WHERE SN = '12e11'";
                // $result = mysqli_query($link, $sql);
                // echo "hello php";
                //alert("123");
            }   
        });

        // document.getElementById("php_code").innerHTML = "
        //     $sql = "UPDATE lifejacket set EmergencyOn = 1 WHERE SN = '12e11'";
        //     $result = mysqli_query($link, $sql);
        //     echo "hello php";
        // ";
    }

    function doWarnOff() {
        mqttWarnOff();
        $.ajax(
            {     
                type:    'post',
                url:     './warn_off.php',
                data:    '&id=' + $('#id').val() + '&name=' +     $('#name').val(),
                dataType: 'json',
            success: function(data) 
            {
                //alert(data);
            }   
        });
    }


    function doEmerOn() {
        mqttEmerOn();
        $.ajax(
            {     
                type:    'post',
                url:     './emer_on.php',
                data:    '&id=' + $('#id').val() + '&name=' +     $('#name').val(),
                dataType: 'json',
            success: function(data) 
            {
                //alert(data);
            }   
        });
    }

        function doEmerOff() {
        mqttEmerOff();
        $.ajax(
            {     
                type:    'post',
                url:     './emer_off.php',
                data:    '&id=' + $('#id').val() + '&name=' +     $('#name').val(),
                dataType: 'json',
            success: function(data) 
            {
                //alert(data);
            }   
        });
    }

    
</script>


<?
    $sn = "empty";
    $emergen = 0;
    $warn = 0;

    $sql = "SELECT * FROM lifejacket WHERE SN = '12e11'";
    $result = mysqli_query($link, $sql);

    $row = mysqli_fetch_row($result);
    $sn = $row[0];
    $emergen = $row[1];
    $warn = $row[2];
    

?>

<input type="text" value="<?=$sn?>" name="member_name">
<input type="text" value="<?=$emergen?>" name="member_name">
<input type="text" value="<?=$warn?>" name="member_name">


<input type="button" value="doEmerOn" onClick="doEmerOn();">
<input type="button" value="doEmerOff" onClick="doEmerOff();">

<input type="button" value="doWarnOn" onClick="doWarnOn();">
<input type="button" value="doWarnOff" onClick="doWarnOff();">
<!-- <span id="php_code"> </span> -->

