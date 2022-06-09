#  	:detective: Security - Assigment 3
The application is hosted on [Heroku](https://blog-ivy.herokuapp.com/).

## Feature that requires access control
I created a blog page where you can add/manage posts. There are two users, an **admin** and a **user**.

To manage the access controll I made a policy called [PostPolicy](app/Policies/PostPolicy.php) in this file you can define if a specific user has access to a route. After that I could check in the [PostController](app/Http/Controllers/PostController.php) if the user has access to that route.

### Admin
The admin has access to all the CRUD modules
- Can view all posts (index and show)
- Can edit all posts
- Can create a new post
- Can delete all posts

### User 
As a user you are restricted to some routes.
- Can view all posts (index and show)
- Can edit only their own posts
- Can create new posts
