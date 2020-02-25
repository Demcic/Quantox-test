S obzirom da sam ispustio da redovno update-ujem git repozitorijum
evo redosleda stvari na kojim sam radio:
1. dan : istrazivanje kako sta da uradim i pocetak pravljenja jednostavnog MVC-a
2. dan : zavrsetak MVC-a
3. dan : /
4. dan : /
5. dan : rad na front-end stranama i njihovo povezivanje
6. dan : zavrsetak front-end-a i dopunjivanje glavnog (indexContoller) korolera
7. dan : instalacija i pravljenje MySql baze, dodavanje composera


Linkovi tutorial-a koje sam koristio za ovaj zadatak
https://www.allphptricks.com/simple-user-registration-login-script-in-php-and-mysqli/
https://medium.com/shecodeafrica/building-your-own-custom-php-framework-part-1-1d24223bab18

za mySql bazu sam koristio: https://dev.mysql.com/downloads/installer/

query za kreiranje baze:

CREATE DATABASE quantox_db;

CREATE TABLE IF NOT EXISTS `users` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(50) NOT NULL,
 `email` varchar(50) NOT NULL,
 `password` varchar(50) NOT NULL,
 `trn_date` datetime NOT NULL,
 `type` varchar(100) NOT NULL,
 PRIMARY KEY (`id`)
 );