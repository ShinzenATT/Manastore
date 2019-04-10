CREATE DATABASE manastore;

USE manastore;

CREATE TABLE users (id int(99) PRIMARY KEY AUTO_INCREMENT,
                   name varchar(40), 
                   birthdate date, 
                   email varchar(50) unique,
                    password varchar(24) NOT NULL,
                   color varchar(6) NOT NULL DEFAULT "5F24A9",
                   creation timestamp DEFAULT current_timestamp,
                   logins int(255) DEFAULT 0,
                   spent int(255) DEFAULT 0
                  );

CREATE TABLE adress (userID int(99), 
                     FOREIGN KEY (userID) REFERENCES users(id),
                     adress varchar(150),
                     city varchar(150),
                     postcode int(5),
                     country varchar(99)
                    );

CREATE TABLE product (id int(99) PRIMARY KEY AUTO_INCREMENT, 
                      name varchar(120),
                      identifier varchar(99) unique, 
                      publisher varchar(60),
                      developer varchar(60),
                      digitalPrice int(4),
                      physicalPrice int(4),
                      releaseDate date,
                      ageRating int(1)
                     );
                     
CREATE TABLE platforms (product int(99),
                        platform varchar(10)
                       );                     
                     
CREATE TABLE ytEmbed (product int(99),
                     FOREIGN KEY (product) REFERENCES product(id),
                      embedCode varchar(11)
                     );                     
                     
CREATE TABLE watchlist (userID int(99),
                        FOREIGN KEY (userID) REFERENCES users(id),
                        product int(99),
                        FOREIGN KEY (product) REFERENCES product(id)
                       );
                       
CREATE TABLE review (id int(255) PRIMARY KEY AUTO_INCREMENT,
                     product int(99),
                     FOREIGN KEY (product) REFERENCES product(id),
                     userID int(99),
                     FOREIGN KEY (userID) REFERENCES users(id),
                     title varchar(60),
                     content varchar(290),
                     rating int(1) DEFAULT 0,
                     likes int(10) DEFAULT 0,
                     creation timestamp DEFAULT current_timestamp
                    );    
                    
CREATE TABLE reviewReply (review int(255),
                          FOREIGN KEY (review) REFERENCES review(id),
                          userID int(99),
                          FOREIGN KEY (userID) REFERENCES users(id),
                          content varchar(290),
                          likes int(10) DEFAULT 0,
                          creation timestamp DEFAULT current_timestamp
                         );
                         
CREATE TABLE bundle (id int(99) PRIMARY KEY AUTO_INCREMENT,
                     name varchar(120),
                     info varchar(290),
                     precentage int(2)
                    );                         

CREATE TABLE bundleProducts(bundle int(99),
                            FOREIGN KEY (bundle) REFERENCES bundle(id),
                            product int(99),
                            FOREIGN KEY (product) REFERENCES product(id)
                           );
                           
CREATE TABLE sale (product int(99),
                   FOREIGN KEY (product) REFERENCES product(id),
                   discount int(2),
                   sale varchar(60)
                  );               
                  
 CREATE TABLE bundleSale (bundle int(99),
                          FOREIGN KEY (bundle) REFERENCES bundle(id),
                          discount int(2),
                          sale varchar(60)
                         );
 
 CREATE TABLE orders (orderNR int(99) PRIMARY KEY AUTO_INCREMENT,
                      userID int(99),
                      FOREIGN KEY (userID) REFERENCES users(id),
                      orderDate timestamp DEFAULT current_timestamp,
                      status varchar(20)
                     );
                     
CREATE TABLE orderProduct (orderNR int(99),
                           FOREIGN KEY (orderNR) REFERENCES orders(orderNR),
                           product int(99),
                           FOREIGN KEY (product) REFERENCES product(id),
                           quanity int(2) DEFAULT 1,
                           type ENUM('physical', 'digital')
                          );        
                          
CREATE TABLE orderBundle (orderNR int(99),
                           FOREIGN KEY (orderNR) REFERENCES orders(orderNR),
                           bundle int(99),
                           FOREIGN KEY (bundle) REFERENCES bundle(id),
                           quanity int(2) DEFAULT 1,
                           type ENUM('physical', 'digital')
                          );
                          
CREATE TABLE blog (id int(99) PRIMARY KEY AUTO_INCREMENT,
                   identifier varchar(99),
                   creation timestamp DEFAULT current_timestamp
                  );                           
                  
CREATE TABLE comments (id int(255) PRIMARY KEY AUTO_INCREMENT,
                       userID int(99),
                       FOREIGN KEY (userID) REFERENCES users(id),
                       content varchar(290),
                       likes int(10) DEFAULT 0,
                       creation timestamp DEFAULT current_timestamp
                      );           
                      
CREATE TABLE commentReply (comment int(255),
                          FOREIGN KEY (comment) REFERENCES comments(id),
                          userID int(99),
                          FOREIGN KEY (userID) REFERENCES users(id),
                          content varchar(290),
                          likes int(10) DEFAULT 0,
                          creation timestamp DEFAULT current_timestamp
                         );
                         
CREATE TABLE tags (id int(99) PRIMARY KEY AUTO_INCREMENT,
                   name varchar(20)
                  );                         
                  
CREATE TABLE tagProduct (product int(99),
                         FOREIGN KEY (product) REFERENCES product(id),
                         tag int(99),
                         FOREIGN KEY (tag) REFERENCES tags(id)
                        );
                        
CREATE TABLE tagArticle (article int(99),
                         FOREIGN KEY (article) REFERENCES blog(id),
                         tag int(99),
                         FOREIGN KEY (tag) REFERENCES tags(id)
                        );  
                        
CREATE TABLE highlights (id int(99) PRIMARY KEY AUTO_INCREMENT,
                         title varchar(60),
                         description varchar(290),
                         identifier varchar(99),
                         target varchar(90),
                         picAdjustment int(4),
                         type ENUM('product', 'blog', 'link')
                        );                        