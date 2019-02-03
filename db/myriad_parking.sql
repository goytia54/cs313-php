create table  myriad_parking.PARKING_USERS(
  USER_ID int PRIMARY KEY not null,
  USER_NAME char(50) not null,
  FIRST_NAME char(50) not null,
  LAST_NAME char(50) not null,
  EMAIL char(100) not null,
  PASSWORD char(50) not null,
  SPOT_ID int references myriad_parking.PARKING_SPOTS(spot_id)
);

create table myriad_parking.BUILDINGS(
  BUILDING_ID int PRIMARY KEY not null,
  BUILDING_NAME char(100) not null
);

create table myriad_parking.PARKING_SPOTS(
  SPOT_ID int primary key not null,
  BUILD_ID int references myriad_parking.BUILDINGS(BUILDING_ID),
  SPOT_NUMBER int not null,
  LEVEL int not null,
  ACTIVE_FLAG int not null ,
  AVAILABLE int not null
);

create table myriad_parking.GROUPS(
  GROUP_ID int primary key not null,
  GROUP_NAME char(100) not null
);

create table myriad_parking.GROUP_MAPPING(
  GROUP_MAP_ID int primary key not null,
  GROUP_ID int references myriad_parking.GROUPS(GROUP_ID),
  USER_ID int references myriad_parking.PARKING_USERS(user_id)
);
