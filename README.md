# HeadRed Coding Test

This is our Laravel coding test to assess your skills and thought process when it comes to building an application from scratch.

## The Test

We would like you to create a Laravel application, using the latest version and Laravel Sail. We would like you to pull in user data from https://reqres.in/ via a command that can be ran on a schedule. Create a front end SPA using a framework of your choice, Vue, React, Svelte, etc that would display all data with a simple search box. You can use Inertia for your front end if you'd like.
Searchable fields should be Email and First name, but searchable separately.

The search should interact with your Laravel application and return results to your front end.

## Git Workflow

We would like you to follow a specific Git workflow during the development process to assess your Git skills.

1. Fork this repository and clone it to your local machine.
2. Create a new branch named `feature/your-feature-name` to work on the task.
3. Make incremental and meaningful commits as you progress through the task. Each commit should be atomic and represent a single logical change.
4. Push your branch to your forked repository on GitHub.
5. Create a Pull Request (PR) from your `feature/your-feature-name` branch to the `main` branch of your forked repository. The PR should clearly outline the changes made, and a brief explanation of your thought process behind the implementation.
6. Ensure your PR passes the following checks before submission:
   - All tests should pass (if applicable).
   - The code should follow PSR-12 coding standards.
   - Write a detailed `README.md` explaining how to set up the application locally, including environment variables, database setup, and how to run the scheduled commands.
   - Use GitHub Actions or another CI service to automatically run tests and check coding standards on every push and pull request.


## Things to consider

 - Use SOLID Principles.
 - Is your code testable?
 - What happens if the API is unavailable?
 - If we wanted to add more searchable fields in the future, this should be an easy task.
 - When the scheduled task runs, what happens if the user already exists?
 - If we wanted to change the API to use a different service, how difficult should that be?


Any questions, please email richard@headred.net
