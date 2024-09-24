# Running the Application 

composer require laravel/sail --dev
php artisan sail:install
./vendor/bin/sail up
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
./vendor/bin/sail artisan migrate
./vendor/bin/sail down

To test the Application

./vendor/bin/sail artisan test

## Note : If facing any issue in WSL or mount related issue 

use : 
composer install 
npm install
npm run build 
npm run dev
php artisan test (clean the DB for testing)
php artisan serve 

Clear cache in case : 
php artisan cache:clear

### To run the schedular 
./vendor/bin/sail artisan schedular:run

or 

php artisan schedular:run


To check the schedular list 

php artisan schedular:list

- Update the env Database details in .env file according to your Database 


open browser in 
## http://127.0.0.1:8000/users-render
to see the Application running 

Note:  Application Image are stored in APP_IMAGES folder in root for quick view including Unit test result  


---------------------------------------------------------------------------------------------------------------------

# Laravel User Fetch Application   - Thought Process And Approach Followed 

## Overview

This is a Laravel application that fetches user data from the [ReqRes API](https://reqres.in/) and stores it in a local database. The application features a Vue.js Single Page Application (SPA) that allows users to view and search through the fetched data.

## Thought Process

### 1. Project Initialization
- Created a new Laravel application using Laravel Sail to facilitate a smooth development experience with Docker.
- Set up database connections and environment variables in the `.env` file.

### 2. Data Fetching Command
- Implemented a console command (`FetchUsers`) that interacts with the ReqRes API to fetch user data.
- The command is scheduled to run every two minutes using Laravel's task scheduling.
- The command fetches paginated data from the API and uses `updateOrCreate` to store unique users in the database, ensuring that existing records are not duplicated.
- it will also handle if there is pagination added in the api , for now this api is having only 12 records in 2 pages

### 3. API Route Creation
- Defined an API route in `routes/api.php` to retrieve users from the database and filter them based on search criteria (email and first name).

### 4. Frontend Development
- Chose Vue.js as the SPA framework to create a dynamic and responsive user interface.
- Integrated Inertia.js to simplify routing between Laravel and Vue.
- Built a search functionality that allows users to search through the displayed user data based on email and first name.

### 5. Testing and Deployment
- Implemented testing to ensure the application works as expected and follows PSR-12 coding standards.
- Set up GitHub Actions for continuous integration to automatically run tests and check code standards on every push and pull request.

## Installation Instructions

Follow these steps to install and run the application on your local machine:

### Prerequisites
- Ensure you have the following software installed:

  - [Laravel Sail](https://laravel.com/docs/8.x/sail)
  - [Node.js](https://nodejs.org/)
  - [Composer](https://getcomposer.org/)

### Steps

1. **Clone the Repository**
   ```bash
   git clone [URL]
   cd repository



Install Dependencies

composer install
npm install


cp .env.example .env


### Update the .env file with your database configuration.


### Build the Application

./vendor/bin/sail up
Run Migrations

./vendor/bin/sail artisan migrate


### Run the Fetch Command (optional)

If you want to manually fetch users immediately, run:

./vendor/bin/sail artisan users:fetch


else 

./vendor/bin/sail artisan schedule:run  this will run every two minutes 


Run the Vue.js Application

npm run dev
Access the Application

Open your web browser and navigate to http://127.0.0.1:8000/users-render.

Testing the Application
To run tests, you can use the following command:


./vendor/bin/sail artisan test


### API Endpoint
GET /api/users?search={query}
This endpoint fetches users from the database, allowing for search functionality based on email or first name.

GET /api/users
This endpoint fetches all users from the database.


### Explanation of the Tests
#### Tests for UserController:

Note : Clean The DB to test the features 

test_user_can_be_fetched: Verifies that the API can successfully return a list of users from the database.
test_user_can_be_searched_by_email: Checks if a user can be searched by their email.
test_user_can_be_searched_by_first_name: Checks if a user can be searched by their first name.
test_searching_non_existent_user_returns_empty_response: Ensures that searching for a user that doesn't exist returns an empty response.
Tests for FetchUsers Command:

test_users_fetch_command: Tests the users:fetch command by mocking the API response. It verifies that users are created in the database when valid data is returned from the API.
test_fetch_users_command_with_no_users: Tests the command when no users are returned from the API, ensuring no users are added to the database.
## Running the Tests

To run these tests, use the following command:

./vendor/bin/sail artisan test


#  Additional 
Things to consider
Use SOLID Principles.   - Yes I have Tried to used solid Principle to remove tight coupling
Is your code testable?  - Yes 
What happens if the API is unavailable?  - It will return empty in command line , while searching it will not break anything.
If we wanted to add more searchable fields in the future, this should be an easy task. - Yes Just add the fields in array in search function 
When the scheduled task runs, what happens if the user already exists? - It will check , if already exists it will just create or update based on existing value 
If we wanted to change the API to use a different service, how difficult should that be? - it will not be a difficult task , as for now I have configured in such a way that moving to another service will not be a difficult thing.



# 1 docker-compose up laravel.test
# 2 docker-compose run laravel.test-runner
# 3 docker-compose run laravel.migrate

