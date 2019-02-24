create table  myriad_parking.PARKING_USERS(
                                            USER_ID SERIAL PRIMARY KEY not null,
                                            USER_NAME varchar(50) not null,
                                            FIRST_NAME varchar(50) not null,
                                            LAST_NAME varchar(50) not null,
                                            EMAIL varchar(100) not null,
                                            PASSWORD varchar(100) not null,
                                            SPOT_ID int references myriad_parking.PARKING_SPOTS(spot_id)
);

create table myriad_parking.BUILDINGS(
                                       BUILDING_ID SERIAL PRIMARY KEY not null,
                                       BUILDING_NAME varchar(100) not null
);

create table myriad_parking.PARKING_SPOTS(
                                           SPOT_ID SERIAL primary key not null,
                                           BUILD_ID int references myriad_parking.BUILDINGS(BUILDING_ID),
                                           SPOT_NUMBER int not null,
                                           LEVEL int not null,
                                           ACTIVE_FLAG int not null ,
                                           AVAILABLE int not null
);



create table myriad_parking.PARKING_MAPPING(
  PARKING_MAP_ID SERIAL PRIMARY KEY,
  USER_ID int references myriad_parking.PARKING_USERS(user_id) not null,
  SPOT_ID int references myriad_parking.PARKING_SPOTS(spot_id)
);