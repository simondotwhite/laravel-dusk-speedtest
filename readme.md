# Laravel Dusk SpeedTest
 
This project is just an empty Laravel application with Dusk installed. 
 
WHen you run `php artisan dusk` it will run two tests, one if you've set your account details in the environment file and the other one will run if you haven't. 
 
**What is the purpose**
 
I recently moved into a new apartment and the internet is very inconsistent and I wanted a way to monitor the speeds. I also used this to justify having a play with Dusk.
 
## Setup
 
Download/clone this repo and install the dependencies through composer
 
```php
composer install
```
 
### Environment 
 
Add the following to your environment file
 
```php
SPEEDTEST_EMAIL=YOUR_EMAIL
SPEEDTEST_PASSWORD=YOUR_PASSWORD
```
 
If these are added the logged in test will run and that way you can track your results.
  
### Database
  
I've stuck with an sqlite database for recording the results, but you can use whatever you want. 
  
Once you've decided, run the migrations: 
  
```php 
php artisan migrate
```
  
This will create a table that the tests insert their results to.
   
### Running the speed tests
   
To run the tests it's pretty, use just the following:

```php
php artisn dusk
```
   
## Things removed

I've removed the default User object as well the migrations that come out of the box.  
