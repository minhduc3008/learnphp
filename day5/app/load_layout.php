<?php

$pageName = $_GET['module'] ?? null;
$actionName = $_GET['action'] ?? null;

switch ($pageName) {
    case 'product': {
            switch ($actionName) {
                case 'create': {
                        require('./products/create.php');
                        break;
                    }
                case 'edit': {
                        require('./products/edit.php');
                        break;
                    }
                default;
                    require('./products/index.php');
            }
            break;
        }
    case 'category': {
            switch ($actionName) {
                case 'create': {
                        require('./categories/create.php');
                        break;
                    }
                case 'edit': {
                        require('./categories/edit.php');
                        break;
                    }
                default;
                    require('./categories/index.php');
            }
        }
        break;
    case 'order': {
            switch ($actionName) {
                case 'create': {
                        require('./orders/create.php');
                        break;
                    }
                case 'edit': {
                        require('./orders/edit.php');
                        break;
                    }
                default;
                    require('./orders/index.php');
            }
        }
        break;
    case 'user': {
            switch ($actionName) {
                case 'create': {
                        require('./users/create.php');
                        break;
                    }
                case 'edit': {
                        require('./users/edit.php');
                        break;
                    }
                default;
                    require('./users/index.php');
            }
        }
        break;
    default;
}