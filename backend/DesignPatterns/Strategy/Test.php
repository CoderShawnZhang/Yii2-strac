<?php

$door = new Door();
$Content = new ContentStrategy($door);
$Content->handleQuantity($data);