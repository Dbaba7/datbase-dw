# Nigerian Police Force Crime Management System

This is a comprehensive crime management system built with the Laravel framework. It provides a platform for officers to report and manage criminal cases, evidence, and user access.

## Setup Instructions (XAMPP)

These instructions will guide you through setting up the project on a local machine using XAMPP.

### 1. Prerequisites

Before you begin, ensure you have the following installed on your system:
- **XAMPP:** A web server solution that includes Apache, MariaDB (MySQL), and PHP. [Download XAMPP](https://www.apachefriends.org/index.html).
- **Composer:** A dependency manager for PHP. [Download Composer](https://getcomposer.org/download/).

### 2. Project Setup

1.  **Get the code:**
    - If you are using Git, clone the repository into the `htdocs` directory of your XAMPP installation. The `htdocs` folder is typically located at `C:\xampp\htdocs` on Windows.
      ```bash
      cd C:\xampp\htdocs
      git clone <repository_url> crime-management-system
      ```
    - Alternatively, download the project files as a ZIP and extract them into a new folder named `crime-management-system` inside `htdocs`.

2.  **Navigate to the project directory:**
    Open a terminal or command prompt and move into the project's root directory.
    ```bash
    cd C:\xampp\htdocs\crime-management-system
    ```

### 3. Database Configuration

1.  **Start XAMPP:** Open the XAMPP Control Panel and start the **Apache** and **MySQL** modules.

2.  **Create a Database:**
    - Open your web browser and navigate to `http://localhost/phpmyadmin`.
    - Click on the **Databases** tab.
    - In the "Create database" field, enter `crime_management_system` and click **Create**.

3.  **Configure Environment File:**
    - In the project's root directory, find the file named `.env.example` and create a copy of it named `.env`.
    - Open the `.env` file in a text editor and update the database connection details. By default, XAMPP uses the `root` user with no password.
      ```env
      DB_CONNECTION=mysql
      DB_HOST=127.0.0.1
      DB_PORT=3306
      DB_DATABASE=crime_management_system
      DB_USERNAME=root
      DB_PASSWORD=
      ```

### 4. Application Installation

1.  **Install PHP Dependencies:**
    Run the following command in your terminal to install all the required PHP packages.
    ```bash
    composer install
    ```

2.  **Generate Application Key:**
    Every Laravel application needs a unique encryption key. Generate one with this command:
    ```bash
    php artisan key:generate
    ```

3.  **Run Database Migrations and Seeding:**
    This command will create all the necessary tables in your database and populate it with initial data, including the admin user.
    ```bash
    php artisan migrate --seed
    ```
4.  **Create Storage Link:**
    This makes uploaded files (like evidence) publicly accessible.
    ```bash
    php artisan storage:link
    ```

### 5. Running the Application

1.  **Ensure XAMPP is running:** Make sure the Apache and MySQL modules are active in the XAMPP Control Panel.

2.  **Access the Application:**
    Open your web browser and navigate to the following URL:
    ```
    http://localhost/crime-management-system/public
    ```
    You should now see the application's login page.

### 6. Default Login Credentials

You can log in with the default admin account created by the seeder:
- **Service Number:** `admin`
- **Password:** `password`

You can now start using the Crime Management System.
