# Task Manager
Task Manager is a Single Page Application (SPA) built with Laravel and JavaScript. The interface allows users to create, update, and delete tasks. Each task consists of a description and a checkbox to indicate whether the activity has been completed.

### Features
* Create tasks with a description.

* Update tasks:

    * Mark a task as completed using a checkbox.
    * Edit the task name.

* Delete tasks with a simple button.

## Installation and Setup
This project requires **PHP**, **Composer**, **Laravel**, and **MySQL** (or any other relational database of your choice). A `.env` file must be configured based on `.env.example`, including your database credentials.

### 1. **Clone the repository**:
   ```bash
   git clone https://github.com/francesco-flores/task-manager.git
   cd task-manager
   ```
### 2. **Install backend dependencies**:
   ```bash
   composer install
   ```
### 3. **Install frontend dependencies**:
   ```bash
   npm i
   ```
### 4. **Set up the environment configuration**:

By default you need to create a database named 'task_manager'.
If you're using the default MySQL configuration, you can create it with the following command:

   ```bash
   mysql -u root -p -e "CREATE DATABASE task_manager;"
   ```

   ```bash
   cp .env.example .env #and add your configuration
   php artisan key:generate
   ```
### 5. **Run database migrations**:
   ```bash
   php artisan migrate
   ```
### 6. **Start the server**:
   ```bash
   php artisan serve
   ```
### 7. **Compile frontend assets**:
In a separate terminal, navigate to the project directory and run:

   ```bash
   npm run dev
   ```

## License
This project is released under the MIT license. See the [LICENSE](LICENSE) file for more details.
