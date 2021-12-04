@echo off

::
:: launches xampp, opens phpmyadmin db page and website homepage
::

echo launching www.HWL.com ...
start /min C:\xampp\xampp-control.exe
timeout 2
start "" http://localhost/phpmyadmin/index.php?route=/database/structure&server=1&db=library
start "" http://localhost/project/src/index.php