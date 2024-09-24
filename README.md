# Laravel User Fetch Application

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
  - [Docker](https://www.docker.com/get-started)
  - [Laravel Sail](https://laravel.com/docs/8.x/sail)
  - [Node.js](https://nodejs.org/)
  - [Composer](https://getcomposer.org/)

### Steps

1. **Clone the Repository**
   ```bash
   git clone [URL]
   cd your-repository



Install Dependencies

composer install
npm install


cp .env.example .env


Update the .env file with your database configuration.


Build the Application

./vendor/bin/sail up
Run Migrations

./vendor/bin/sail artisan migrate


Run the Fetch Command (optional)

If you want to manually fetch users immediately, run:

./vendor/bin/sail artisan users:fetch


else 

./vendor/bin/sail artisan schedule:run


Run the Vue.js Application

npm run dev
Access the Application

Open your web browser and navigate to http://127.0.0.1:8000.

Testing the Application
To run tests, you can use the following command:


./vendor/bin/sail artisan test


API Endpoint
GET /api/users?search={query}
This endpoint fetches users from the database, allowing for search functionality based on email or first name.

GET /api/users
This endpoint fetches all users from the database.



To test the application , I have created 2 Unit Test which verifies , 
If User can be fetched 
If User can be created in DB 

