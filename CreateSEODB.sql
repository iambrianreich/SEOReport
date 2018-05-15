CREATE DATABASE SEO;
USE SEO;

CREATE TABLE Customer (id INT(10), name VARCHAR(20),
    -> created TIMESTAMP, lastModified TIMESTAMP, creator VARCHAR(20), lastModifiedBy VARCHAR(20), PRIMARY KEY (id); 

CREATE TABLE Site (id INT(10), PrimaryUrl VARCHAR(255), customerID INT(10), created TIMESTAMP, lastModified TIMESTAMP, 
    -> creator VARCHAR(20), lastModifiedBy VARCHAR(20), PRIMARY KEY (id);

CREATE TABLE AnalyticsProperty (id INT(10), siteID INT(20), primaryUrl VARCHAR(255), created TIMESTAMP, lastModified TIMESTAMP,
    -> creator VARCHAR(20), lastModifiedBy VARCHAR(20), PRIMARY KEY (id);

CREATE TABLE Users (id INT(10), username VARCHAR(60), password VARCHAR(60), name VARCHAR(60), created TIMESTAMP, lastModified TIMESTAMP,
    -> creator VARCHAR(20), lastModifiedBy VARCHAR(20), PRIMARY KEY (id);

CREATE TABLE Report (id INT(10), customerID INT(10), siteID INT(20), created TIMESTAMP, lastModified TIMESTAMP,
    -> creator VARCHAR(20), lastModifiedBy VARCHAR(20), PRIMARY KEY (id);

CREATE TABLE CrawlError (id INT(10), reportID INT(10), url VARCHAR(255), type VARCHAR(15), errorCode INT(15), created TIMESTAMP, lastModified TIMESTAMP,
    -> creator VARCHAR(20), lastModifiedBy VARCHAR(20), PRIMARY KEY (id);
