<?php
return array(

// === APPLICATION
  'app.name'    => 'My awesome silex-powered website',
  'app.author'  => 'Me',

// === DOCTRINE DBAL
//check Doctrine DBAL docs to see available drivers and needed parameters for each driver
//if a parameter is not needed, just set '' as its value.
  'db.driver'   => 'pdo_sqlite',
  'db.dbname'   => '',
  'db.host'     => '',
  'db.user'     => '',
  'db.password' => '',
  'db.path'     => __DIR__.'/../db/app.db',

    
// === END OF CONFIG
)
?>