drop TABLE scriptures;

Create table scriptures
( id INT PRIMARY KEY
, book VARCHAR(50)
, chapter INT
, verse INT
, content VARCHAR(200));


Insert into scriptures
Values(
1
, 'John'
, 1
, 5
, 'And the light shineth in darkness; and the darkness comprehended it not.');


Insert into scriptures
Values(
2
, 'Doctrine and Covenants'
, 88
, 49
, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.');

Insert into scriptures
Values(
3
, 'Doctrine and Covenants'
, 93
, 28
, 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.');

Insert into scriptures
Values(
4
, 'Mosiah'
, 16
, 9
, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');
