# Laravel Blog Application Documentation

## Introduction
This documentation provides a guide to setting up a simple Laravel-based blog application. The blog allows users to register, create posts, and comment on posts.

## Requirements
- PHP 8+
- Composer
- Laravel 10+
- MySQL 8.0.41
- A web server *Laravel's built-in server*

## Installation

1. **Clone the repository:**
   ```sh
   git clone https://github.com/miclemabasie/Laravel-Blog.git
   cd Laravel-Blog
   ```
2. **Install dependencies:**
   ```sh
   composer install
   ```
3. **Copy the environment file:**
   ```sh
   cp .env.example .env
   ```
4. **Generate the application key:**
   ```sh
   php artisan key:generate
   ```
5. **Configure the `.env` file:**
   Update database credentials according to your setup.

6. **Run database migrations:**
   ```sh
   php artisan migrate
   ```
7. **Serve the application:**
   ```sh
   php artisan serve
   ```

## Features
- User Registration & Authentication
- Create, Read, Update, and Delete (CRUD) for Posts
- Commenting on Posts
- Basic Authorization (Only authors can edit/delete their posts)

## Database Schema

### Users Table
| Column      | Type     | Description |
|------------|---------|-------------|
| id         | bigint  | Primary key |
| name       | string  | User name |
| email      | string  | Unique email |
| password   | string  | Hashed password |
| timestamps | datetime | Created and updated timestamps |

### Posts Table
| Column      | Type     | Description |
|------------|---------|-------------|
| id         | bigint  | Primary key |
| user_id    | bigint  | Foreign key referencing users |
| title      | string  | Post title |
| content    | text    | Post content |
| timestamps | datetime | Created and updated timestamps |

### Comments Table
| Column      | Type     | Description |
|------------|---------|-------------|
| id         | bigint  | Primary key |
| post_id    | bigint  | Foreign key referencing posts |
| user_id    | bigint  | Foreign key referencing users |
| content    | text    | Comment content |
| timestamps | datetime | Created and updated timestamps |

## Routes

### Authentication
| Method | URI               | Action |
|--------|------------------|--------|
| POST   | /register        | Register a user |
| POST   | /login           | Authenticate user |
| POST   | /logout          | Logout user |

### Blog Posts
| Method | URI              | Action |
|--------|-----------------|--------|
| GET    | /posts          | View all posts |
| GET    | /posts/{id}     | View single post |
| POST   | /posts          | Create a new post |
| PUT    | /posts/{id}     | Update a post |
| DELETE | /posts/{id}     | Delete a post |

### Comments
| Method | URI                  | Action |
|--------|----------------------|--------|
| POST   | /posts/{id}/comments | Add a comment to a post |
| DELETE | /comments/{id}       | Delete a comment |

## Middleware & Policies
- **Auth Middleware**: Ensures only authenticated users can create, edit, and delete posts/comments.
- **Post Policy**: Restricts editing and deleting to the post’s author.
- **Comment Policy**: Allows only the author of a comment to delete it.

## Deployment
1. Set up a production environment (e.g., DigitalOcean, AWS, or shared hosting).
2. Configure the database and update `.env` accordingly.
3. Run migrations:
   ```sh
   php artisan migrate --force
   ```
4. Set up a queue worker for email notifications (optional):
   ```sh
   php artisan queue:work
   ```
5. Use a process manager like Supervisor to keep the queue worker running.

## Conclusion
This Laravel blog application provides a simple foundation for a blog with user authentication, posts, and comments. Further improvements can include image uploads, tagging, search functionality, and more.

