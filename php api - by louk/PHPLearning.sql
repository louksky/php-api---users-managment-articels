
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- ARTICLE DDL

CREATE TABLE article (
  id int(11) NOT NULL,
  title varchar(255) NOT NULL,
  content varchar(2054) NOT NULL,
  id__autor int(11) not null,
  created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=UTF-8;

--DATA SET

INSERT into article (id,title,content,id__autor)
values (100,'benet won the elections','benet win and won we chose gantz but benet won
        et won the elections benet win and won we chose gantz but benet won
        benet won the elections benet win and won we chose gantz but benet won
        benet won the elections benet win and won we chose gantz but benet won
        benet won the elections benet win and won we chose gantz but benet won',10, '2020-12-16 04:20:48'),
       (200,'bananas are blue ','orange its a yellow stuff ,
        after the water melon get older the bananas gets blue type and color ',20, '2020-12-16 04:20:48'),
       (300,'tigger run out zoo (bat yam)','today after noon a white tigger run out from the bat yam zoo 
        the other animals there start to rob the super market,
        just bucause the tigger run away',30, '2020-12-16 04:20:48'),
       (400,'yeshiva tichunit beni','that a religion yeshiva thats everyone is standing up ,
       and not siting as there name yeshiva',40, '2020-12-16 04:20:48';

-- KEYS
-- ROLES

ALTER TABLE article
  ADD PRIMARY KEY (id);

ALTER TABLE article
ADD FOREIGN KEY users_fk (id__autor)
  REFERENCES users (id)
   ON UPDATE CASCADE ON DELETE CASCADE,

ALTER TABLE article
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

--USERS DDL

CREATE TABLE users (
  id int(11) NOT NULL,
  username varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  created timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=UTF-8;

INSERT INTO users (id, username, password, created) VALUES
(10,'vivaldi','bach', '2020-12-16 04:20:48'),
       (20,'bibi','gantz', '2020-12-16 04:20:48'),
       (30,'josep','benet', '2020-12-16 04:20:48'),
       (40,'kolel','rivka', '2020-12-16 04:20:48');


-- KEY
--ROLE

ALTER TABLE users
  ADD PRIMARY KEY (id);


ALTER TABLE users
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;




