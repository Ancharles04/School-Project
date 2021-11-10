
create table Driver
(Driver_ID varchar2(25) not null
,First_Name	varchar2(50)
,Last_Name	varchar2(50)
,email	varchar2(50) not null
,Phone	varchar2(10) not null
,Address	varchar2(25)
,DL	varchar2(25)
,VehicleReg	varchar2(1)
,POI	varchar2(1)
,Payout_Method	varchar2(1)
,Insta_Pay	varchar2(1)
,IATA	varchar2(3)
,Driver_Rating	varchar2(1)
,CONSTRAINT driver_pk PRIMARY KEY (driver_id))
;

create table Passenger
(Pass_ID	varchar2(25) not NULL
,first_name	varchar2(50)
,last_name	varchar2(50)
,Email	varchar2(50)
,Phone	varchar2(10)
,Preferred_Language	varchar2(25)
,Pass_Rating varchar2(1)
,CONSTRAINT passenger_pk PRIMARY KEY (pass_id))
;

Drop table Ride;
create table Ride
(Ride_ID	varchar2(25) not null
,Driver_ID varchar2(25) not null
,Pass_ID	varchar2(25) Not NULL
,Ride_Date	date not null
,Currency	varchar2(50)
,Fare Number (7,2)
,Pickup_Time	timestamp
,Dropoff_Time	timestamp
,Origin_Coord	varchar2(50)
,Destination_Coord	varchar2(50)
,Country_Code	varchar2(2)
,Request_Time	timestamp not null
,Status	varchar2(1)
,CONSTRAINT Ride_pk PRIMARY KEY (Ride_id))
;


Insert into Driver values ('D9110077','Eydie','Coarser','EydieCoarser@invalidemail.com',6158472745,'0104 Warrior Junction',1444348488,0,0,1,0,'ACC',1);
Insert into Driver values ('D6092297','Arlena','OLennane','ArlenaOLennane@invalidemail.com',5491261724,'9775 Farragut Street',5722904489,0,0,1,0,'ADL',3);
Insert into Driver values ('D5019061','Ennis','Creasey','EnnisCreasey@invalidemail.com',6559123036,'639 Center Court',7531445919,1,1,1,1,'MAD',2);
Insert into Driver values ('D4695965','Bendite','McEwen','BenditeMcEwen@invalidemail.com',2434410030,'04920 Briar Crest Circle',2608252289,1,1,2,1,'CAK',3);
Insert into Driver values ('D1740277','Saree','Woltering','SareeWoltering@invalidemail.com',9077277322,'684 Merchant Junction',965981163,0,0,1,0,'DWC',2);
Insert into Driver values ('D7687988','Barron','Einchcombe','BarronEinchcombe@invalidemail.com',8432973303,'08872 Texas Pass',1119469778,1,1,2,1,'HOF',3);
Insert into Driver values ('D8558783','Erek','Eyres','ErekEyres@invalidemail.com',2566278291,'3 Kim Point',2992856200,1,1,1,1,'ALB',2);
Insert into Driver values ('D5354254','Nariko','Hulse','NarikoHulse@invalidemail.com',2544350742,'114 West Terrace',3387282954,0,0,1,0,'OAJ',4);
Insert into Driver values ('D6830425','Wilek','MacKaig','WilekMacKaig@invalidemail.com',1162193050,'82233 Mockingbird Road',3701483192,1,1,2,1,'ABQ',2);
SELECT * From Driver;

Insert into Passenger values ('P5016076','Bernetta','Derisly','BernettaDerisly@invalidemail.com',1151156032,'English',3);
Insert into Passenger values ('P4376647','Mariele','Mealham','MarieleMealham@invalidemail.com',5390044856,'French',5);
Insert into Passenger values ('P1756933','Orella','Bassingden','OrellaBassingden@invalidemail.com',1898509803,'German',4);
Insert into Passenger values ('P8389673','Laurie','Branney','LaurieBranney@invalidemail.com',5684353699,'Spanish',2);
Insert into Passenger values ('P5689818','Bink','Jopp','BinkJopp@invalidemail.com',1672730381,'English',4);
Insert into Passenger values ('P4928545','Xymenes','Wenderoth','XymenesWenderoth@invalidemail.com',5875052396,'French',2);
Insert into Passenger values ('P8031872','Leila','Stayt','LeilaStayt@invalidemail.com',8816281679,'German',3);
Insert into Passenger values ('P1209839','Maurie','Stubbes','MaurieStubbes@invalidemail.com',5051495209	,'Spanish',4);
Insert into Passenger values ('P1213404','Meade','Chaldecott','MeadeChaldecott@invalidemail.com',4753172421,'English',3);
Insert into Passenger values ('P7366594','Horatio','Denford','HoratioDenford@invalidemail.com',6983850233,'French',1);
Insert into Passenger values ('P8967493','Kendra','Lemmon','KendraLemmon@invalidemail.com',9200943180,'German',5);
Insert into Passenger values ('P9090012','Benoite','Drillingcourt','BenoiteDrillingcourt@invalidemail.com',4450054443,'Spanish',5);
SELECT * From Passenger;

Insert into Ride values ('TW585619550','D9959367','P5016076',To_Date('2019-01-01','YYYY-MM-DD'),'New Taiwan Dollar',5.56,TO_TIMESTAMP('2019-0101 03:58:45','YYYY-MM-DD HH24:MI:SS'),TO_TIMESTAMP('2019-01-01 04:04:12','YYYY-MM-DD HH24:MI:SS'),'137 Onsgard Center','1178 Mayfield Parkway','TW',TO_TIMESTAMP('2019-01-01 04:15:12','YYYY-MM-DD HH24:MI:SS'),1);
Insert into Ride values ('US349689962','D9110077','P4376647',To_Date('2019-04-22','YYYY-MM-DD'),'US Dollar',13.85,'','','6 Crowley Court','72 Warbler Alley','US',TO_TIMESTAMP('2019-04-22 05:17:59','YYYY-MM-DD HH24:MI:SS'),0);
Insert into Ride values ('PK765173277','D6092297','P1756933',To_Date('2019-10-16','YYYY-MM-DD'),'Pakistan Rupee',16.81,TO_TIMESTAMP('2019-10-16 19:21:13','YYYY-MM-DD HH24:MI:SS'),TO_TIMESTAMP('2019-10-16 19:38:13','YYYY-MM-DD HH24:MI:SS'),'71359 Hanover Place','42 Green Ridge Center','PK',TO_TIMESTAMP('2019-10-16 19:15:46','YYYY-MM-DD HH24:MI:SS'),1);
Insert into Ride values ('DE568868871','D5019061','P8389673',To_Date('2019-12-17','YYYY-MM-DD'),'Euro',3.76,TO_TIMESTAMP('2019-12-17 21:44:19','YYYY-MM-DD HH24:MI:SS'),TO_TIMESTAMP('2019-12-17 21:57:19','YYYY-MM-DD HH24:MI:SS'),'3 Ronald Regan Hill','52546 Hauk Way','DE',TO_TIMESTAMP('2019-12-17 21:38:52','YYYY-MM-DD HH24:MI:SS'),1);
Insert into Ride values ('ZA803060985','D4695965','P5689818',To_Date('2020-08-20','YYYY-MM-DD'),'Rand',16.03,TO_TIMESTAMP('2020-08-20 22:39:29','YYYY-MM-DD HH24:MI:SS'),TO_TIMESTAMP('2020-08-20 22:50:29','YYYY-MM-DD HH24:MI:SS'),'1 Fordem Center','19706 Tennessee Terrace','ZA',TO_TIMESTAMP('2020-08-20 22:34:02','YYYY-MM-DD HH24:MI:SS'),1);
Insert into Ride values ('US302888235','D1740277','P4928545',To_Date('2019-04-13','YYYY-MM-DD'),'US Dollar',14.52,TO_TIMESTAMP('2019-04-13 03:05:27','YYYY-MM-DD HH24:MI:SS'),TO_TIMESTAMP('2019-04-13 03:19:27','YYYY-MM-DD HH24:MI:SS'),'4 Nobel Lane','05 Kensington Street','US',TO_TIMESTAMP('2019-04-13 03:00:00','YYYY-MM-DD HH24:MI:SS'),1);
Insert into Ride values ('GB242895108','D7687988','P8031872',To_Date('2020-01-03','YYYY-MM-DD'),'Pound Sterling',15.55,TO_TIMESTAMP('2020-01-03 05:15:53','YYYY-MM-DD HH24:MI:SS'),TO_TIMESTAMP('2020-01-03 05:34:53','YYYY-MM-DD HH24:MI:SS'),'9438 Green Center','201 Eggendart Pass','GB',TO_TIMESTAMP('2020-01-03 05:10:26','YYYY-MM-DD HH24:MI:SS'),1);
Insert into Ride values ('US253180881','D8558783','P1209839',To_Date('2020-02-20','YYYY-MM-DD'),'US Dollar',18.08,TO_TIMESTAMP('2020-02-20 05:50:13','YYYY-MM-DD HH24:MI:SS'),TO_TIMESTAMP('2020-02-20 06:01:13','YYYY-MM-DD HH24:MI:SS'),'130 Hollow Ridge Way','05709 Buena Vista Crossing','US',TO_TIMESTAMP('2020-02-02 05:44:46','YYYY-MM-DD HH24:MI:SS'),1);
Insert into Ride values ('US111285367','D5354254','P1213404',To_Date('2020-07-12','YYYY-MM-DD'),'US Dollar',11.52,'','','65640 Ridgeway Parkway','4 Stone Corner Drive','US',TO_TIMESTAMP('2020-07-12 16:43:16','YYYY-MM-DD HH24:MI:SS'),0);
Insert into Ride values ('US478915186','D6830425','P7366594',To_Date('2019-05-23','YYYY-MM-DD'),'US Dollar',16.71,TO_TIMESTAMP('2019-05-23 19:00:01','YYYY-MM-DD HH24:MI:SS'),TO_TIMESTAMP('2019-05-23 19:19:01','YYYY-MM-DD HH24:MI:SS'),'9743 Vahlen Crossing','31926 Main Terrace','US',TO_TIMESTAMP('2019-05-23 18:54:34','YYYY-MM-DD HH24:MI:SS'),1);
SELECT * From Ride;











































































































































































































































































































































































































