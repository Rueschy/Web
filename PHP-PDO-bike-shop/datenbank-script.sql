CREATE table Bicycle
(
	ID INT(11) not null
	, Brand varchar(20) not null
    , Name varchar(20) not null
    , Category varchar(20) not null
    , Price int(11) not null
    , Color varchar(20) not null
    , Size varchar(20) not null
	, Brakes varchar(20) not null
    , Shifter varchar(20) not null
    , Fork varchar(20) not null
    , Shock varchar(20) not null
    , constraint pk_bicycle primary key(ID)
);

CREATE table Motorcycle
(
	ID INT(11) not null
	, Brand varchar(20) not null
    , Name varchar(20) not null
    , Category varchar(20) not null
    , Price int(11) not null
    , Engine varchar(20) not null
    , CubicCapacity int(11) not null
	, Power int(11) not null
    , Brakes varchar(20) not null
    , Suspension varchar(20) not null
    , TopSpeed int(20) not null
    , constraint pk_motorcycle primary key(ID)
);

CREATE table EBike
(
	ID INT(11) not null
	, Brand varchar(20) not null
    , Name varchar(20) not null
    , Category varchar(20) not null
    , Price int(11) not null
    , Color varchar(20) not null
    , Size varchar(20) not null
	, Engine varchar(20) not null
    , Power int(20) not null
    , Brakes varchar(20) not null
    , Shifter varchar(20) not null
    , constraint pk_ebike primary key(ID)
);

CREATE table UserCustomer
(
	Name varchar(20) not null
    , Password varchar(60) not null
    , Admin varchar(3) not null
    , BirthDate date
    , Email varchar(20) not null
    , Balance int(11)
    , constraint pk_user primary key(Name)
);

CREATE table UserAdmin
(
	Name varchar(20) not null
    , Password varchar(60) not null
    , Admin varchar(3) not null
    , constraint pk_user_admin primary key(Name)
);

insert into Bicycle values(1, "YT", "Tues AL", "Bicycle", 2300, "Black", "S", "Sram Giude R", "Sram X9", "Boxxer RC", "Vivid R2V");
insert into EBike values(2, "Cube", "Reaction", "EBike", 3000, "Red", "S", "Bosch Performance", 5, "Shimano BR", "Shimano XT");
insert into Motorcycle values(3, "KTM", "EXC", "Motorcycle", 8000, "1 Zylinder 2 Takt", 250, 40, "Brembo", "WP XPlor", 130);

select * from UserCustomer;
select * from UserAdmin;
select * from Bicycle;
select * from Motorcycle;
select * from EBike;

drop table UserAdmin;

delete from UserAdmin where Name = "admin";
