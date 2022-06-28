<?php
  // DB Params
  define('DB_HOST', 'localhost');
  define('DB_USER', 'root');
  define('DB_PASS', '');
  define('DB_NAME', 'phppractice');

  //Folder Name
  define('PARENT_DIR', 'mvc-app');

  // App Root
  define('APPROOT', dirname(dirname(__FILE__)));
  // URL Root
  define('URLROOT', 'http://'.$_SERVER['HTTP_HOST'].'/'. PARENT_DIR .'');
  // Site Name
  define('SITENAME', 'MVC Application');
  // App Version
  define('APPVERSION', '1.0.2');

