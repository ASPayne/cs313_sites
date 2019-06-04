/*
This may not seem like much at this time. However, I have left off some tables
from this initial careation of tables. I have done so for the purposes of
having oppertunities for updating the database as the sumester continues. 
*/


CREATE TABLE public.user
(
	id             		SERIAL        NOT NULL PRIMARY KEY,
	username       		VARCHAR(100)  NOT NULL UNIQUE,
	password       		VARCHAR(100)  NOT NULL,
	display_name   		VARCHAR(100)  NOT NULL,
	email          		VARCHAR(100),
	created_by     		int           NOT NULL,
	creation_date  		DATE          NOT NULL,
	last_updated_by 	int           NOT NULL,
	last_update_date  	DATE          NOT NULL 
);

INSERT INTO public.USER (
id             	
,username       	
,password       	
,display_name
,created_by     	
,creation_date  	
,last_updated_by 
,last_update_date
)
VALUES(
DEFAULT
, 'SYSADMIN'
, 'PASSWORD'
, 'SYSADMIN'
, 1
, statement_timestamp()
, 1
, statement_timestamp()
);


ALTER TABLE PUBLIC.USER
ADD CONSTRAINT fk_created_by FOREIGN KEY (created_by) REFERENCES PUBLIC.USER(id);
ALTER TABLE PUBLIC.USER
ADD CONSTRAINT fk_last_updated_by FOREIGN KEY (created_by) REFERENCES PUBLIC.USER(id);

CREATE TABLE public.card_types
(
	id 					SERIAL 		NOT NULL PRIMARY KEY,
	card_types			VARCHAR(15) NOT NULL,
	created_by     		int         NOT NULL REFERENCES PUBLIC.USER(id),
	creation_date  		DATE        NOT NULL,
	last_updated_by 	int         NOT NULL REFERENCES PUBLIC.USER(id),
	last_update_date 	DATE        NOT NULL 
);

Create table customInventory(
id serial primary key
, cardname varchar(100)
, cardtype int references card_types(id)
, multiverseId int
, cardtext varchar(300)
, created_by     		int         NOT NULL REFERENCES PUBLIC.USER(id)
, creation_date  		DATE        NOT NULL
, last_updated_by 	int         NOT NULL REFERENCES PUBLIC.USER(id)
, last_update_date 	DATE        NOT NULL 
);

CREATE TABLE public.CardStorage
(
	id 					SERIAL 		PRIMARY KEY,
	multiverseid 		INT 			NOT NULL,
	CardName 			VARCHAR(100) 	NOT NULL,
	CardTypes 			INT		 		NOT NULL REFERENCES PUBLIC.CARD_TYPES(id),
	ManaCost 			VARCHAR(50),
	CMC      			INT,
	Power    			VARCHAR(3),
	Toughness			VARCHAR(3),
	Text                VARCHAR(300),
	created_by     		int           	NOT NULL,
	creation_date  		DATE          	NOT NULL,
	last_updated_by 	int           	NOT NULL,
	last_update_date  	DATE          	NOT NULL 
);

CREATE UNIQUE INDEX CONCURRENTLY card_multiverse_id_index 
ON cardstorage (multiverseid);
	
ALTER TABLE cardstorage 
ADD CONSTRAINT unique_multiverse_id 
UNIQUE USING INDEX card_multiverse_id_index;


CREATE TABLE public.inventory
(
	id              	SERIAL 		NOT NULL PRIMARY KEY,
	card_num    		INT         NOT NULL REFERENCES public.CardStorage(id),
	card_owner	    	INT			NOT NULL REFERENCES PUBLIC.USER(id),
	num_owned   		INT			NOT NULL,
	created_by     		int         NOT NULL REFERENCES PUBLIC.USER(id),
	creation_date  		DATE        NOT NULL,
	last_updated_by 	int         NOT NULL REFERENCES PUBLIC.USER(id),
	last_update_date  	DATE        NOT NULL 
);

CREATE TABLE public.deck
(
	id              	SERIAL 		NOT NULL PRIMARY KEY,
	card_num    		INT         NOT NULL REFERENCES public.CardStorage(id),
	deck_owner	    	INT			NOT NULL REFERENCES PUBLIC.USER(id),
	num_owned   		INT			NOT NULL,
	created_by     		int         NOT NULL REFERENCES PUBLIC.USER(id),
	creation_date  		DATE        NOT NULL,
	last_updated_by 	int         NOT NULL REFERENCES PUBLIC.USER(id),
	last_update_date 	DATE        NOT NULL 
);
