# Product Management System

## Overview

This Laravel-based project provides functionality for managing products through Excel file imports and detailed product views. Key features include:

- **Import Products**:
  - Save main product information to the database.
  - Save additional product details to the database.
  - Download and save product photos to the database.

- **View Product List**:
  - Display a list of products with descriptions and prices.

- **View Product Details**:
  - Product name
  - Photo collage
  - Description
  - Price
  - Color and specifications
  - Additional information

## Installation

To set up this project locally, follow these steps:

1. Clone the repository by running `git clone https://github.com/yourusername/your-repo-name.git` and then navigate into the project directory with `cd your-repo-name`.

2. Install PHP dependencies by executing `composer install`.

3. Install JavaScript dependencies using `npm install`.

4. Set up the environment configuration by copying the example environment file with `cp .env.example .env`. Open the `.env` file in a text editor and update the database credentials and other necessary configuration:

   ```ini
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database
   DB_USERNAME=your_username
   DB_PASSWORD=your_password

---
Best regards,
Ulugbek Kozimov