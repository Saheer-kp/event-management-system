# Event Management System
## Steps to install the project 
### 1. Download or clone the project to local server directory
#### xampp server location : path-to-xampp-folder\xampp\htdocs\
### 2. Create a database named "event_management_system"
### 3. To install the project 
        composer install
### 5. Rename .env.example file to .env
### 4. To generate application key
        php artisan key:generate
### 4. To clear the configuration and route cache
        php artisan config:cache
        php artisan route:cache
### 5. To migrate database tables      
        php artisan migrate
### 6. To run queue - needed to sending emails as background task
        php artisan queue:work     
####  Make sure you are configured the SMTP configuration in the .env file for sending mail           
### 6. To run the application
        php artisan serve
### 7. Go to browser and enter the url "http://localhost:8000/"       
