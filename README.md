TheDeadSimpleCMS - A super simple CMS, using Smarty, RedBeanPHP and a micro MCV.
================
Caveats:
--------------
- At the moment TheDeadSimpleCms is being developed and tested on NginX and PostgreSQL.
- SQLite is minimally tested, but does work right out of the box.
- Apache doesn't throw a 500... Router class needs some additional flexibility.

 Prerequisites:
--------------
- public directory needs to have 777 permissions or be readable and write-able by the server user.
- application/views/smarty also needs to have 777 permissions or be readable and writeable by the server user.
- configuration/database_conf.php and settings_conf.php should be edited to reflect your site and database settings.

Installation:
---------------
- Navigate to your site root.
- If all the file permissions and database settings are correct it will install itself,
if something is wrong it will tell you what to fix.
- Delete the installer directory inside the public folder!!!
- Navigate to your site root to start configuring your site. (Note: this part isn't finished)
