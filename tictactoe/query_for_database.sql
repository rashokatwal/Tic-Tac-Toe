--query to create database 
CREATE database `tictactoe`;

--query to create a table
CREATE TABLE playerdata (
    userid INTEGER,
    username VARCHAR(50) PRIMARY KEY,
    pass VARCHAR(50),
    createdDate DATE,
    OWins INT,
    OLosses INT,
    XWins INT,
    XLosses INT,
    draws INT,
    total INT
)
