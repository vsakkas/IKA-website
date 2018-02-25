# IKA website

This project contains a redesigned and functional website for [IKA](http://www.ika.gr/gr/home.cfm) (the Social Insurance Institute of Greece). Goal of this project was to improve the UI and UX, while maintaining some of the key functionality, of the original website. This includes registering with a new account, logging in to an existing account and using some of the services that both this and the original website offer to their target audiences by providing an interface that is easy to understand and interact with.

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
You can now take a look at the website!

## Authors
* [vsakkas](https://github.com/vsakkas)

* [v-pap](https://github.com/v-pap)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details
