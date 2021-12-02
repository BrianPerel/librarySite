@echo off

::
:: launches xampp, opens phpmyadmin db page, and website homepage
::

echo launching www.HWL.com ...
start C:\xampp\xampp-control.exe
start "" http://localhost/phpmyadmin/index.php?route=/database/operations&db=library
start "" http://localhost/project/src/index.php