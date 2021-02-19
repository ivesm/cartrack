# cartrack
CarTrack technical assesment

The following  describes the creation of the postgrs database , 
CREATE DATBASE cartrack ;

CREATE TABLE person (
id BIGSERIAL NOT NULL PRIMARY KEY ,
 name VARCHAR(100) NOT NULL ,
 surname VARCHAR(100) NOT NULL ,
 created TIMESTAMP NOT NULL ) ;
 
 
 INSERT INTO person (name , surname , created )VALUES ('Ives' , 'Visagie','20210218 20:41:00') ; 
 
 
DB CONFIG :
 The Database Config is located  in the  config directory,  the file dbconection.php 
 
 Make sure to configure the  the following according to your DB Setup .
 
    private $host        = "host = 127.0.0.1";
	  private $port        = "port = 5432";
    private $dbname      = "dbname = cartrack";
    private $credentials = "user = postgres password=cartrack";

