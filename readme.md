##  Framework used

<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## How to run the project

1. **Install Composer Dependencies** <br>
run `composer install`

2. **Install NPM Dependencies** <br>
run `npm install`

3. **Create copy of ur .env file** <br>
`cp .env.example .env`

4. **Generate an app encryption key** <br>
`php artisan key:generate`

5. **Create an empty database for our application** <br>
database name `travel_bucketlist_system` with `utf8mb4 unicode ci` , open `.env` environment file to modify the MYSQL database settings
````
DB_CONNECTION=mysql <br>
DB_HOST=127.0.0.1 <br>
DB_PORT=3306 <br>
DB_DATABASE=travel_bucketlist_system <br>
DB_USERNAME=root <br>
DB_PASSWORD= <br>
````
6. **Run proper data migration** <br>
`php artisan migrate`

7. **Serve the program**<br>
`php artisan serve`


For further information about running the project , please look through 
https://devmarketer.io/learn/setup-laravel-project-cloned-github-com/


## Database model
### mySQL Model
````
CREATE TABLE `travel_bucket_items` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `country_id` int,
  `title` varchar(255),
  `caption` varchar(255),
  `description` text,
  `city` varchar(255),
  `photos` text,
  `start_date` timestamp,
  `end_date` timestamp,
  `created_at` timestamp,
  `updated_at` timestamp,
  `experience` varchar(255),
  `user_id` int
);

CREATE TABLE `travel_bucket_countries` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `capital` varchar(255),
  `population` int,
  `flag` varchar(255),
  `currency` varchar(255),
  `region` varchar(255),
  `languages` varchar(255),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(255),
  `password` varchar(255),
  `name` varchar(255),
  `admin` varchar(255),
  `created_at` timestamp,
  `updated_at` timestamp
);

ALTER TABLE `travel_bucket_items` ADD FOREIGN KEY (`country_id`) REFERENCES `travel_bucket_countries` (`id`);

ALTER TABLE `travel_bucket_items` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);


````

### mySQL Model (Image)
![Image of database model](https://github.com/lowzijian/Travel-Bucketlist-Management-System/blob/master/documentation/Travel%20Bucket%20List%20Management%20System.png)

### Relationship of the database model
- 1 travel bucket country has 0..* travel bucket item 
- 1 travel bucket item has 1..1 travel bucket country

## How to we fetch the coutries information ? 
We fetch information of country using restful API : <br>
https://restcountries.eu/

Get filtered response from the api: <br>
 https://restcountries.eu/rest/v2/name/Afghanistan?fields=name;capital;currencies;flag;population;region;languages;

## Sample of bucket list ideas that we used for demo 
https://tourscanner.com/blog/bucket-list-ideas/


