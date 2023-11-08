# HeadRed Coding Test

This is our Laravel coding test to assess your skills and thought process when it comes to building an application from scratch.

## The Test

We would like you to create a Laravel application, using the latest version and Laravel Sail. We would like you to pull in user data from https://reqres.in/ via a command that can be ran on a schedule. Create a front end SPA using a framework of your choice, Vue, React, Svelte, etc that would display all data with a simple search box.
Searchable fields should be Email and First name, but searchable separately.

The search should interact with your Laravel application and return results to your front end.

## Things to consider

 - Is your code testable?
 - What happens if the API is unavailable?
 - If we wanted to add more searchable fields in the future, this should be an easy task.
 - When the scheduled task runs, what happens if the user already exists?
 - If we wanted to change the API to use a different service, how difficult should that be?
