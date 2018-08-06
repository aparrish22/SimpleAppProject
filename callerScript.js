/* This script calls php script */
alert('Retrieving the Data.');

/* alert(..) for debugging */
$.get("php_conn.php", function(data, status){
        alert("Data: " + data + "\nStatus: " + status);
});
//$.get("php_conn.php");

