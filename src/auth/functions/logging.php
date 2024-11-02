<?php
function log_sql_injection_attempt($username, $query) {
    $log_entry = "[" . date('Y-m-d H:i:s') . "] User: $username - Attempted Query: $query" . PHP_EOL;
    file_put_contents('../../logs/sqli_attempts.log', $log_entry, FILE_APPEND);
}
function log_xss_attempt($username, $comment) {
    $log_entry = "[" . date('Y-m-d H:i:s') . "] User: $username - Comment: $comment" . PHP_EOL;
    file_put_contents('../../logs/xss_attempts.log', $log_entry, FILE_APPEND);
}

?>

