<?php
// Set the userId cookie (Example: Setting a userId of 12345)
setcookie("userId", "12345", time() + (86400 * 30), "/"); // Valid for 30 days, accessible site-wide

// Confirm cookie is set
if (isset($_COOKIE['userId'])) {
    echo "Cookie set successfully: userId = " . $_COOKIE['userId'];
} else {
    echo "Failed to set cookie.";
}
?>
