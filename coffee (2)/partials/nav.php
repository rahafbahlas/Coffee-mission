<?php if (Util::is_admin()) {
    require_once "partials/admin_nav.html";
} elseif (Util::is_login()) {
    require_once "partials/user_nav.html";
} else {
    require_once "partials/nav.html";
}
