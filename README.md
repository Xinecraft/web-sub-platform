# Web Sub Platform
Create a simple subscription platform(only RESTful APIs with MySQL) in which users can subscribe to a website (there can be multiple websites in the system). Whenever a new post is published on a particular website, all it's subscribers shall receive an email with the post title and description in it. (no authentication of any kind is required)

MUST:-
- Write migrations for the required tables.
- Endpoint to create a "post" for a "particular website".
- Endpoint to make a user subscribe to a "particular website" with all the tiny validations included in it.
- Use of command to send email to the subscribers.
- Use of queues to schedule sending in background.
- No duplicate stories should get sent to subscribers.
- Deploy the code on a public github repository.

OPTIONAL:-
- Seeded data of the websites.
- Open API documentation (or) Postman collection demonstrating available APIs & their usage.
- Use of latest laravel version.
- Use of contracts & services.
- Use of caching wherever applicable.
- Use of events/listeners.

Note:-
1. Please provide special instructions(if any) to make to code base run on our local/remote platform.

# Requirements
1. PHP 7+
2. MySQL
3. Redis

# Install Process
1. Clone the repo
2. Copy .env.example to .env & Generate App Key for laravel
3. Set redis, database and queue driver in .env
4. Run migrations & seeder `php artisan migrate --seed`
5. Turn on queue listeners `php artisan queue:work`

# Command to retry pending email for a post
```
php artisan email:post {post_id}

Eg:
php artisan email:post 1
```
Note: Email is only sent once for per post per user.
