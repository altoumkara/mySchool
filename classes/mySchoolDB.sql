
/* create the database mySchoolDB  and connect to it */
create database mySchoolDB;
USE mySchoolDB;

/* creating a user for our database with the following grants(permissions) */

 grant select, insert, update, delete, index, alter, create, drop
 on mySchoolDB.* 
 to al@localhost identified by 'mariamal';

/***************************** creating tables ***********************************/

/* administrator table*/
CREATE TABLE admin (
 adminname    varchar(50)     NOT NULL  PRIMARY KEY,
 password     varchar(50)     NOT NULL,
 join_date    TIMESTAMP       NOT NULL #YYYYMMDDHHMMSS
)ENGINE=InnoDB;

insert into admin values('pedroski', sha1('mypassword'),null); 
#insert into admin values('oudia', sha1('hispassword'),null); 




/* user table*/
CREATE TABLE user (
 userid       int             unsigned  not null auto_increment,
 username     varchar(50)     NULL,
 fname        varchar(50)     not null,
 lname        varchar(50)     not null,
 title        enum('student','professor','parent','company') default null,
 email        varchar(50)     NOT NULL,
 password     varchar(50)     NOT NULL,
 sex          enum('M','F')   DEFAULT null,
 birthyear    char(9)         not null,
 major        varchar(100)    null,
 join_date    TIMESTAMP       NOT NULL, #YYYYMMDDHHMMSS
 phone        VARCHAR(13)     null,
 college      varchar(100)    null,
 about        varchar(500)   null,
 online       enum('0','1')  DEFAULT '1', #0=online, 1=offline
 profilepic   varchar(100)   NULL, #we save the path of the photo upload directory
 worktitle    varchar (100)  null,
 internshiptitle     varchar (100)  null,  
 PRIMARY KEY (userid),
 CONSTRAINT  user_UC1 UNIQUE (email)
)ENGINE=InnoDB;


create INDEX username_idx
   ON user (username(10));

#create unique INDEX phone_idx
 #  ON user (phone);

create INDEX title_idx
   ON user (title);

create index worktitle_idx
  on user (worktitle(10));

create index internship_idx
  on user (workname(5));

/*******************sample data****************/
insert into user values(1,'al','alama','tounk','student','alama\.tounkara\@gmail\.com',
                        sha1('mypassword'),'M',1986, 'Computer Science', null,7778889999, 'Mercy College',
                         "Hi My name is alama, and iam a Computer Scien student",'1',NULL,"java programmer", NULL); 

insert into user values(2,'ou','oumar','diar','student','oudia\@hotmail\.com',
             sha1('hispassword'),'M',1991, 'Computer Science', null,7748856999, 'louisiana Community College',
              'null','1',NULL,"web designer", NULL);

insert into user values(3,'pape','pape','ndiaye','student','pape\@gmail\.com',
                        sha1('papepassword'),'M',1983, 'Business administration', null,7772389999, 'ASA College', 
                        NULL,'1',NULL, "Baker Dunkin Donut", NULL); 

insert into user values(4,'mouss','moussa','sarr','student','mouss\@hotmail\.com',
                        sha1('moussapassword'),'M',1982,'MBA', null,7770089999, 'MBA SCHOOL',
                         'NULL','1',NULL, "Manager Dunkin Donut", NULL);


/*different works of a particular user*/
/*CREATE TABLE userwork (
 userid        int             unsigned  not null,
 worktitle     varchar (500)  null,
 workname       varchar (500)  null,  
 PRIMARY KEY (userid),
 CONSTRAINT userwork_c1 FOREIGN KEY (userid) REFERENCES user (userid) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB;

create index worktitle_idx
  on userwork (worktitle(10));

create index worktitle_idx
  on userwork (workname(5));

insert into userwork values (1, "job", "programmer");
insert into userwork values (1, "internship", "web designer");*/

/* user's partner table is a recursive table with a Many to many relationship with user table */
/*requeststatus: 0=neutral, 1= accepted, 2=pending */ 
CREATE TABLE userpartner (
 partnerid       int    unsigned not null, 
 userid          int    unsigned not null, 
 requeststatus  enum('0','1','2')    DEFAULT '0',
 startdate       date          null,
 enddate         date          null, #date user being his firend, which will automatically change requeststatus
 PRIMARY KEY(userid,partnerid),
 CONSTRAINT userpartner_c1 FOREIGN KEY (partnerid) REFERENCES user (userid) ON UPDATE CASCADE,
 CONSTRAINT userpartner_c2 FOREIGN KEY (userid) REFERENCES user (userid) ON UPDATE CASCADE
)ENGINE=InnoDB;


/*******************sample data****************/
insert into userpartner values(1,2,'0',20140923,null); 
insert into userpartner values(1,3,'1',20140923,null); 
insert into userpartner values(2,3,'1',20140923,null);
insert into userpartner values(3,2,'1',20140923,null); 
insert into userpartner values(4,1,'0',20140922,null); 
insert into userpartner values(4,3,'1',20140921,null); 
insert into userpartner values(3,1,'1',20140920,null);
insert into userpartner values(3,4,'1',20140922,null); 
insert into userpartner values(2,1,'1',20140822,null);


/* User notifications*/ 
CREATE TABLE notification (
 notiid        int           unsigned  not null primary key auto_increment,
 notidate      TIMESTAMP     NOT NULL, #YYYYMMDDHHMMSS
 sendbyuserid  int          unsigned  NOT NULL, #user who post 
 touserid      int          unsigned  NOT NULL, #post on user id
 notititle    varchar(100)  null,
 notifor      varchar(100)    null, #for wich itmeid, or bookid, or serviceid
 requeststatus  enum('0','1','2') DEFAULT '0',# 0=not seen, 1=accepted,2=pending
 CONSTRAINT   noti_FKC1     FOREIGN KEY (sendbyuserid) REFERENCES user (userid) ON UPDATE CASCADE,
 CONSTRAINT   noti_FKC2     FOREIGN KEY (touserid) REFERENCES user (userid) ON UPDATE CASCADE
)ENGINE=InnoDB;


/*******************sample data****************/
insert into notification values(null,null,1,2, "buying",4,'0'); 
insert into notification values(null,null,1,3, "buying",2,'0'); 
insert into notification values(null,null,3,2, "buying",4,'0'); 
insert into notification values(null,null,1,4, "buying",2,'2'); 
insert into notification values(null,null,4,1, "buying",3,'0'); 
insert into notification values(null,null,2,1, "buying",5,'0'); 
insert into notification values(null,null,3,1, "partnership",1,'0'); 
insert into notification values(null,null,3,1, "buying",2,'0'); 
insert into notification values(null,null,4,1, "buying",3,'0'); 
/* user account table for emailing purpose*/
/* we will create an enail sending capability, and this table wil hold the account 
information of users
*/
create table accounts (
 accountid  int        unsigned not null auto_increment primary key,
 userid     int        unsigned not null , #user the account belongs to
 server     char(100)  not null, #The machine on which the account resides;i.e: localhost, mail.tangledweb.com.au,etcc
 port       int      not null, #The port to connect to when using this account. 110 for POP3 servers and 143 for IMAP servers
 type       char(4)      not null, #The protocol used to connect to this server, either POP3 or IMAP
 remoteusername   char(50)     not null, #The username for connecting to the mail server
 remotepassword  char(50)     not null, #The password for connecting to the mail server
 CONSTRAINT accounts_FKC1 FOREIGN KEY (userid) REFERENCES user (userid) ON UPDATE CASCADE
)ENGINE=InnoDB;


/* category table
*we need this for different category we are going to have in the system
* it can be item category(book, electronic, furniture etc..)
or can be tutorial category(math, english, history etc..
*/
create table categories (
 catid       int           unsigned not null auto_increment primary key,
 catname     char(60)      not null,
 catcreatedate  TIMESTAMP     NOT NULL, #YYYYMMDDHHMMSS
 adminname   varchar(50)   NOT NULL,
 CONSTRAINT  categories_UC1 UNIQUE (catname),
 CONSTRAINT  categories_FKC1 FOREIGN KEY (adminname) references admin (adminname)  ON UPDATE CASCADE #admin who create the category
 )ENGINE=InnoDB;

create INDEX catname_idx
   ON categories (catname); #query category name faster


/*******************sample data****************/
insert into categories values(null,'BOOKS' ,null, 'pedroski'); 
insert into categories values(null,'ELECTRONICS', null, 'pedroski'); 
insert into categories values(null,'FURNITURES' ,null, 'pedroski'); 
insert into categories values(null,'OTHER SERVICES', null, 'pedroski'); 


/* all items for sales table*/
CREATE TABLE items (
 itnumb          int            unsigned  not null primary key auto_increment,
 itname          varchar(100)    NULL,
 itprice         float(4,2)      null DEFAULT 0.00,
 itquality       enum('new', 'mint','acceptable','other')     DEFAULT null,
 itquantity      int            null,
 itcreatedate    TIMESTAMP      NOT NULL, #YYYYMMDDHHMMSS
 /*itdescription   varchar(255) ,*/
 itKind          varchar(100)  null,
 itColor         varchar(50)  null,
 itBrand         varchar(50)  null,
 catid           int          unsigned    NOT NULL,
 userid          int          unsigned    NOT NULL,
 postid          int          unsigned  null REFERENCES  post (postid),
 CONSTRAINT      items_FKC1   FOREIGN KEY (userid) REFERENCES user (userid) ON UPDATE CASCADE,
 CONSTRAINT      items_FKC2   FOREIGN KEY (catid) REFERENCES  categories (catid) ON UPDATE CASCADE
)ENGINE=InnoDB;

create INDEX itprice_idx
   ON items (itprice); #make price querying faster

create INDEX itquality_idx
   ON items (itquality); #make item's quality querying faster

# create FULLTEXT INDEX itdescription_idx
  # ON items (itdescription); #allow a fast full text querying for item description


/*******************sample data****************/
insert into items values(null,'bed', 125.00, 'new', 1,null, 'king size matress','white',
                        'sleepy\'s',3,1,null);
insert into items values(null,'tv', 1200.50, 'mint', 2,null,'plaza big screen','black',
                        'Toshiba',2, 4,null); 
insert into items values(null,'couch', 99.99, 'acceptable', 2,null,'3 sitter couch','black',
                        'sleep\'s',3, 1,null);  
insert into items values(null,'roommate', 0.00, 'new',1,null,'need a new roommate', null,
                         '2 bedrooms appartment',4, 2,null);  
insert into items values(null,'radio', 300.00, 'other',7,null,'iHeart radio','pink',
                        'HP',2, 1,null); 
 
/* retrieve item's names from table item where category is electonics */
select itname
from items as i, categories as c
where i.catid=c.catid
and c.catname= 'ELECTRONICS';




/* table for books only
* i put books in his own table because, most items students will be posting 
* for sale are books. therefore its good we put it in separate table in order
*to reduce querying
*/
CREATE TABLE book (
 booknumb        int            unsigned not null PRIMARY KEY auto_increment,
 bookisbn        char(13)       not null,
 bookauthor      varchar(50)    NULL,
 booktitle       varchar(100)   not null,
 bookEdNumb      int            null,
 bookpublisher       varchar(50)    NULL,
 booklanguage        varchar(50)    NULL,
 bookprice       float(4,2)    not null DEFAULT 0.00,
 bookquality     enum('new', 'mint','acceptable','other') DEFAULT null,
 bookquantity     int            null,
 bookcreatedate  TIMESTAMP      NOT NULL, #YYYYMMDDHHMMSS
 catid           int          unsigned  NOT NULL,
 userid          int          unsigned  NOT NULL, 
 CONSTRAINT      book_UC1 UNIQUE (bookisbn),
 CONSTRAINT      book_FKC1    FOREIGN KEY (userid) REFERENCES user (userid) ON UPDATE CASCADE,
 CONSTRAINT      book_FKC2    FOREIGN KEY (catid) REFERENCES  categories (catid) ON UPDATE CASCADE
)ENGINE=InnoDB;

create INDEX bookauthor_idx
   ON book (bookauthor); #make book author querying faster

create INDEX booktitle_idx
   ON book (booktitle); #make book title querying faster

create INDEX bookprice_idx
   ON book (bookprice); #make price querying faster

create INDEX bookquality_idx
   ON book (bookquality); #make book's quality querying faster

 /*create FULLTEXT INDEX bookdescription_idx
   ON book (bookdescription); #allow a fast full text querying for book description
*/


/* internship table*/
CREATE TABLE internship (
 intid           int           unsigned  not null primary key auto_increment,
 userid          int           unsigned  NOT NULL, #user who post the internship(i.e: company)
 inttile         varchar(50)     NOT NULL,
 intcompanyname  varchar(50)     not null,
 intstate        varchar(40)     not null,
 intzip          int             NOT NULL,
 intnumbposition int             NOT NULL,
 intstartdate    date           not null,
 intcontent      varchar(400)  NOT NULL,
 intpostdate     TIMESTAMP  ,

 /*intaddress      varchar(50)     null,
 intcity         varchar(50)     null,
 intrequirement   varchar(100)   null,*/
 intcompensation  varchar(50)    null,
 intenddate       date           null,
 intapplydeadline date          null,
 intfilepath      varchar(100), #user can just upload a file for internship details, we save the path of the upload directory
 #postid           int            unsigned  null, #1 internship can be posted many times
 #CONSTRAINT internship_FKC1  FOREIGN KEY (postid) REFERENCES post (postid) ON UPDATE CASCADE,
 CONSTRAINT internship_FKC2  FOREIGN KEY (userid) REFERENCES user (userid) ON UPDATE CASCADE
)ENGINE=InnoDB;

create INDEX inttle_idx
   ON internship (inttile); #make internship name querying faster

/*******************sample data****************/
insert into internship values(null,1,'Help desk',"EGT-INC", 'NY',23435, 2,20150323,
   "this is an intership for computer science student",null,"$20/hr",20150623,20150126,null );
insert into internship values(null,1,'Programmer',"Google", 'NY',23345, 4,20150123,
   "Competent CSI student needed for thrieving company",null,"unpaid",20150923,20150921,null );
insert into internship values(null,2,'driver needed',"HASH-CORP", 'NJ',00435, 1,20140125,
   "A millionaire teen needs a part time driver, prefer student.",null,"$60/hr",20150220,20150122,null );
insert into internship values(null,3,'Mentor Needed',"Family", 'NY',13345, 1,20150801,
   "we need a mentor for our disable kid. you have have to be good in math.",null,"$10/hr",20170211,20150726,null );
insert into internship values(null,1,'Math tutor internship',"Mercy college",'DF',23465, 5,20150101,
   "math tutor needed for undergrad student. you need to be good in math",null,"unpaid",20150623,20140126,null );
insert into internship values(null,1,'Assistant professor for java 3',"ASA college", 'NY',12345, 1,20160323,
   "Assistant professor needed. you need to be good at java",null,'$100/day',20170101,20160120,null );

/* internship applied by user table*/
CREATE TABLE userapplyinternship (
 applyid         int          unsigned  not null auto_increment,
 intid           int          unsigned  not null, #internship user is applying for
 userid          int          unsigned  NOT NULL, #user who is applying for the internship
 applydetails    text,       #user can just paste their resume into this
 applyfilepath   varchar(100), #user can just upload their resume, instead of saving the actual file, we save the path of the upload directory
 primary key     (applyid),
 CONSTRAINT      userupdate_FKC1  FOREIGN KEY (userid) REFERENCES user (userid) ON UPDATE CASCADE,
 CONSTRAINT      userapplyinternship_FKC2    FOREIGN KEY (intid) REFERENCES  internship (intid) ON UPDATE CASCADE
)ENGINE=InnoDB;

/*******************sample data****************/
insert into userapplyinternship values(null,1,2, null,null);
insert into userapplyinternship values(null,1,4, null,null);
insert into userapplyinternship values(null,1,3, null,null);
insert into userapplyinternship values(null,2,4, null,null);
insert into userapplyinternship values(null,3,1, null,null);
insert into userapplyinternship values(null,4,1, null,null);
insert into userapplyinternship values(null,4,2, null,null);
insert into userapplyinternship values(null,2,2, null,null);
insert into userapplyinternship values(null,3,4, null,null);
insert into userapplyinternship values(null,4,4, null,null);
insert into userapplyinternship values(null,6,3, null,null);
insert into userapplyinternship values(null,5,3, null,null);
insert into userapplyinternship values(null,2,4, null,null);
insert into userapplyinternship values(null,6,2, null,null);



/** test table, it has two main functions:
* first:  user(company) can just post a test for a internship
and applicants who past that test can be the potential new employees
* second: professors, or other users who wish to test each other, or some 
group of other users, can post their test */
CREATE TABLE test (
 testid           int          unsigned  not null primary key auto_increment,
 testtile         varchar(50)  NOT NULL,
 teststarttime   TIMESTAMP     not null, #date applicant are allowed to applied for the test
 intid           int           unsigned  null,
 userid          int           unsigned  NOT NULL, #user who post the test
 testendtime     varchar(50)   null,
 testdeadline    varchar(40)   null,
 CONSTRAINT      test_FKC1     FOREIGN KEY (userid) REFERENCES user (userid) ON UPDATE CASCADE,
 CONSTRAINT      test_FKC2     FOREIGN KEY (intid) REFERENCES  internship (intid) ON UPDATE CASCADE
)ENGINE=InnoDB;


/* test's question table*/
CREATE TABLE testquestion (
 qnumb         int             unsigned  not null primary key auto_increment,
 qdetails      text            NOT NULL,
 testid        int             unsigned  NOT NULL , #user who post the test
 qfile         mediumblob,
 CONSTRAINT    testquestion_FKC1   FOREIGN KEY (testid) references test (testid) ON UPDATE CASCADE
)ENGINE=InnoDB;

/* test question's response table*/
CREATE TABLE questionresponse (
 qnumb          int      unsigned  NOT NULL,
 userid          int     unsigned  NOT NULL, #user who responds to the test
 rcontent       text     NOT NULL,
 rfile   varchar(100)  null ,#user can just upload their question typed on microsoft word and upload it. we save the path of the upload directory
 primary KEY (userid,qnumb),
 CONSTRAINT   questionresponse_FKC1     FOREIGN KEY (userid) REFERENCES user (userid) ON UPDATE CASCADE,
 CONSTRAINT   questionresponse_FKC2     FOREIGN KEY (qnumb)  REFERENCES  testquestion (qnumb) ON UPDATE CASCADE
)ENGINE=InnoDB;


/* class table
*we need this, cuz we want to show the classes each user is good at
*/
CREATE TABLE class (
 ccode        varchar(5)   NOT NULL,
 userid       int          unsigned  NOT NULL, #user who response to the test 
 cname        varchar(50)  not null,
 areyougoodat enum('good','very good', 'ok','bad', 'very bad') not null,
 primary KEY (userid,ccode),
 CONSTRAINT class_FKC1 FOREIGN KEY (userid) REFERENCES user (userid) ON UPDATE CASCADE
)ENGINE=InnoDB;

create INDEX class_idx
   ON class (cname); #make class name querying faster

insert into class values('cisc', 1, 'sisco','very good' );
insert into class values('dbms', 2,'database management system', 'good');
insert into class values('cisc', 2,'php administration','good');
insert into class values('ciscs', 1,'Networking','good');

/* photo table*/
CREATE TABLE photo (
 phnumb       int             unsigned  not null primary key auto_increment,
 phcreatedate TIMESTAMP       NOT NULL, #YYYYMMDDHHMMSS
 userid       int             unsigned  NOT NULL, #user who upload the pic 
 phpath       varchar(100)    NOT NULL, #we save the path of the photo upload directory
 postid       int             unsigned  null REFERENCES  post (postid),
 /*phdescription  varchar(50)   NULL, #short description of the pic
 itnumber     int             unsigned  null references items (itnumber), #photo can be an item photo
 booknumb     int             unsigned  null references book (booknumb) , #photo can be a book photo*/
 CONSTRAINT photo_FKC1 FOREIGN KEY (userid) REFERENCES user (userid) ON UPDATE CASCADE
)ENGINE=InnoDB;


/* post table*/
/*CREATE TABLE post(
 postid       int           unsigned  not null primary key auto_increment,
 postdate     TIMESTAMP     NOT NULL, #YYYYMMDDHHMMSS
 postbyuserid  int          unsigned  NOT NULL, #user who post 
 postonuserid  int          unsigned  NOT NULL, #post on user id
 posttitle    varchar(100)  null,
 postcontent  varchar(300)  null,
 server       char(100)     null,  #The machine on which the account resides;i.e: localhost, mail.tangledweb.com.au, etcc
 host         VARCHAR(45)   NULL , # Client IP address
 intid           int        unsigned  null REFERENCES  internship (intid) ON UPDATE CASCADE,
 CONSTRAINT   post_FKC1     FOREIGN KEY (postbyuserid) REFERENCES user (userid) ON UPDATE CASCADE,
 CONSTRAINT   post_FKC2     FOREIGN KEY (postonuserid) REFERENCES user (userid) ON UPDATE CASCADE
)ENGINE=InnoDB;*/

/* post table*/
CREATE TABLE post(
 postid       int           unsigned  not null primary key auto_increment,
 postdate     TIMESTAMP     NOT NULL, #YYYYMMDDHHMMSS
 postbyuserid  int          unsigned  NOT NULL, #user who post 
 postonuserid  int          unsigned  NOT NULL, #post on user id
 posttitle    varchar(100)  null,
 postcontent  varchar(300)  null,
 server       char(100)     null,  #The machine on which the account resides;i.e: localhost, mail.tangledweb.com.au, etcc
 host         VARCHAR(45)   NULL , # Client IP address
 parent       int         unsigned  null  , #if parent==0, that means it is a parent instead of a comment      
 intid        int        unsigned  null REFERENCES  internship (intid) ,
 photo        enum('0','1')  DEFAULT '0', #0=no photo included in the post, 1= there at least a photo included in the post
 booknumb     int            unsigned  null REFERENCES  book(booknumb),# we can only include at most one book per post, therefore we just put its reference here
 item         enum('0','1')  DEFAULT '0', #0=no item included in the post, 1= there at least an item included in the post
 CONSTRAINT   post_FKC1     FOREIGN KEY (postbyuserid) REFERENCES user (userid) ON UPDATE CASCADE,
 CONSTRAINT   post_FKC2     FOREIGN KEY (postonuserid) REFERENCES user (userid) ON UPDATE CASCADE
)ENGINE=InnoDB;



/* post and photo have a many to many relationship, 1 post can have many photos, and 1 photo can be posted several times */
/* postid       int             unsigned not null,
 phnumb       int             unsigned not null,
 PRIMARY key (postid, phnumb),
 CONSTRAINT   postphoto_FKC1  FOREIGN KEY (postid) REFERENCES post (postid) ON UPDATE CASCADE,
 CONSTRAINT   postphoto_FKC2  FOREIGN KEY (phnumb)  references photo (phnumb) ON UPDATE CASCADE
)ENGINE=InnoDB;
*/

/* post and items have a many to many relationship, 1 post can have many items, and 1 item can be posted several times */
/*CREATE TABLE postitems(
 postid       int             unsigned not null REFERENCES post (postid) ON UPDATE CASCADE,
 itnumber     int             unsigned not null references items (itnumber) ON UPDATE CASCADE,
 PRIMARY key  (postid, itnumber)
)ENGINE=InnoDB;*/

/* post and books have a many to many relationship, 1 post can have many books, and 1 book can be posted several times */
/*CREATE TABLE postbook(
 postid      int             unsigned REFERENCES post (postid) ON UPDATE CASCADE,
 booknumb    int             unsigned not null  references book (booknumb) ON UPDATE CASCADE,
 PRIMARY key (postid, booknumb)
)ENGINE=InnoDB;*/


/* post's comment, recursive table*/
CREATE TABLE postcomment(
 commentid    int          unsigned  not null  ,
 postid       int          unsigned  not null  REFERENCES post (postid),
 commentdate  TIMESTAMP    NOT NULL, #YYYYMMDDHHMMSS
 primary key (commentid,postid) ,
 CONSTRAINT postcomment_FKC1 FOREIGN KEY (postid) REFERENCES post (postid) ON UPDATE CASCADE,
 CONSTRAINT postcomment_FKC2 FOREIGN KEY (commentid) REFERENCES post (postid) ON UPDATE NO ACTION
)ENGINE=InnoDB;



/*prototype for creating index*/

/*
CREATE [UNIQUE|FULLTEXT|SPATIAL] INDEX index_name
    [index_type]
    ON tbl_name (index_col_name,...)
    [index_type]

index_col_name:
    col_name [(length)] [ASC | DESC]

index_type:
    USING {BTREE | HASH} 
*/