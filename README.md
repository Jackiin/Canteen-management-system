# Canteen-management-system
A project about school canteen management system.

This project uses PHP to connect to MySQL server, and is simulating school canteen management system. If you do not want to configure too much, just download xampp latest version from: https://www.apachefriends.org/download.html and use 127.0.0.1 to visit index.html. However, if you want to use localhost/ to visit your project, the following configurations are needed:

1.open xampp root directory -> apache -> conf -> httpd.conf, search for "DocumentRoot" and change the address to your project root directory; also, you would find <Directory> tag below, change the address to your project root.

2.Find a file named hosts in your C: drive and add one line "127.0.0.1  localhost" to the last line of the file. (How to find the file? Google it; but if you are using the lastest version of Win10 then the address would be "C:\Windows\WinSxS\amd64_microsoft-windows-w..ucture-other-minwin_31bf3856ad364e35_10.0.16299.15_none_582bc968d636655c\hosts") 
  
localhost/main.php (Page for manager)

function:
manage employees

localhost/staff.php (Page for staff)

function:
manage orders

localhost/order.php (Page for customer)

function:
make orders

Also, thanks for FPDF and its authors http://www.fpdf.org/, I could be able to generate customer order in PDF format in my project.
