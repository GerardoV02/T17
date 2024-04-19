-- mysql -u loginname -D loginname -h faure -p
-- loginname is username for CS machine login

CREATE TABLE colors(
    id              int             NOT NULL    AUTO_INCREMENT,
    colorName       varchar(255)    NOT NULL,
    Hex             varchar(255)    NOT NULL,

    PRIMARY KEY (id)
);

delete from colors;

INSERT INTO colors(colorName, Hex) values("red","FF0000");
INSERT INTO colors(colorName, Hex) values("orange","FFA500");
INSERT INTO colors(colorName, Hex) values("yellow","FFFF00");
INSERT INTO colors(colorName, Hex) values("green","00FF00");
INSERT INTO colors(colorName, Hex) values("blue","0000FF");
INSERT INTO colors(colorName, Hex) values("purple","800080");
INSERT INTO colors(colorName, Hex) values("grey","808080");
INSERT INTO colors(colorName, Hex) values("brown","964B00");
INSERT INTO colors(colorName, Hex) values("black","000000");
INSERT INTO colors(colorName, Hex) values("teal","008080");