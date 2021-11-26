<?php

//db constant
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'user-verification');

//email constant
define('email', 'noreply.cmuimc2022@gmail.com');
define('clientID', '148729589635-gj24k1vfre0cog5mplhchafd4kp2mjb7.apps.googleusercontent.com');
define('clientSecret', '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');
define('refreshToken', '1//04qXLcJtY7xO0CgYIARAAGAQSNwF-L9IrdgEj-uPtVlnqJ9cjhprkhQuxUCSo6w0ncxV0uJlgqsOaQRmQhYCPgF9ZfDIgoQNUqZY');
define('fullName', 'CMU IMC');

//connect to db
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
?>