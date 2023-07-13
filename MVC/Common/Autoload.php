<?php

// Autoload Models

spl_autoload_register(function ($className) {
    require './Models/' . $className . '.php';
});