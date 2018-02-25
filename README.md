# IKA website

This project is a website for the IKA (national insurance of Greece)

## Getting Started

The following steps are required in order to set up your enviroment and use the website.

### Prerequisites

1) At first you will need to download the latest XAMPP platform for linux from here
```
https://www.apachefriends.org/index.html
```
2) Fixing the installation executable permissions (only one time needed) 
```
chmod +x xampp-linux-x64-7.2.2-0-installer.run
```
(NOTE: the .run file will likely have a different name since it will be the latest version of the XAMPP platform)

3) Running the installation executable 
```
sudo ./xampp-linux-x64-7.2.2-0-installer.run
```
4) Continue the installation through the GUI

5) Initialize the XAMPP Platform
```
sudo /opt/lampp/./lampp start
```

### Installing

1) Go into htdocs directory
```
cd /opt/lampp/htdocs
```
2) Get a copy of the project
```
sudo git clone https://github.com/vsakkas/IKA-website.git
```
3) Get into a web browser and type
```
http://localhost/phpmyadmin/
```
4) Import the database through the webpage
```
Import > Browse the database file (IKA-website/db/IKAdb.sql) > add it
```
(NOTE: in case you have custom login credentials for XAMPP you can change them on the IKA-website/php/db_connection.php file)

## Using the IKA website

After following the above steps you can just go on your web browser and type

```
http://localhost/IKA-website/index.php
```
Then you can take a look on the website!

## License

This project is licensed under the MIT License
