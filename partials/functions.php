<?php
function checkDB($table,$col,$item) {
    global $con;
    $query = $con->prepare("SELECT * FROM $table WHERE $col=?");
    $query->execute(array($item));
    return $query->rowCount() > 0;
}
