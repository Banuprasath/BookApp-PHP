# 📚 BookApp: Legacy Books Selling and Buying Platform

BookApp is a fullstack web application designed for buying and selling books in a user-friendly and efficient manner. The application is built using PHP, offering both frontend and backend functionality. This README provides an overview of the project, its features, installation instructions, and basic usage guidelines.

## Table of Contents

- Introduction
- Features
- Demo Video
- Screenshots
- Installation
- Usage
- Contributing


## Introduction

BookApp is a legacy bookselling and buying website that provides a platform for users to register, log in, and interact with the application's various features. The application is divided into two main sections: the seller's dashboard and the buyer's page.

## Features

### 🛍️ Seller Dashboard

1. **📝 Registration and Login**: Sellers can register for an account and log in to their dashboard.

2. **📈 Special Dashboard**: Upon logging in, sellers are provided access to a personalized dashboard.

3. **📚 Book Management**: Sellers can perform CRUD operations on their books, including creating new books, updating book details, and deleting books.



### 📖 Buyer's Page

1. **📜 Book Listing**: Buyers can view the available books without the need to log in.

2. **🛒 Direct Purchase**: No login is required for buying books; buyers can directly select and purchase books.

## Demo Video



https://github.com/Banuprasath/BookApp-PHP/assets/92842537/5dc82bdd-97ef-4d71-8668-ecac3dd0db41


## Screenshots
#### Login Page
![Screenshot (438)](https://github.com/Banuprasath/BookApp-PHP/assets/92842537/840a75e1-8853-454e-9f3b-bf08836006da)
#### Dashboard
![Screenshot (439)](https://github.com/Banuprasath/BookApp-PHP/assets/92842537/2a36e1a9-1a34-48de-b90d-c12c9eb2382c)
#### Buyer Page
![Screenshot (440)](https://github.com/Banuprasath/BookApp-PHP/assets/92842537/5767c6b4-7a1d-46b9-9621-0f468f965377)


## Installation

Follow these steps to set up the BookApp project on your local machine:

1. **📥 Clone the Repository**: Clone the BookApp repository to your local machine using the following command:
   
   ```bash
   git clone https://github.com/Banuprasath/BookApp-PHP.git

   
## 🚩Setting Up the MySQL Database
To get the BookApp up and running with its database, follow these steps:

1. **Clone the Repository**: If you haven't already, clone the BookApp repository to your local machine.

2. **Database Setup**: Locate the `--MY SQL DB--` folder in the repository. This folder contains the MySQL database dump for the application.

3. **Copy Database Dump**: Copy the contents of the `--MY SQL DB--` folder.

4. **Paste in XAMPP Data Directory**: Navigate to your XAMPP installation directory and find the `mysql\data` folder. The exact path might look like `C:\xampp\mysql\data`.

5. **Paste the Database Dump**: Paste the contents of the `--MY SQL DB--` folder into the `mysql\data` directory.

6. **Start XAMPP**: Start your XAMPP control panel and ensure that both the Apache and MySQL services are running.

7. **Import Database**: Open a web browser and navigate to `http://localhost/phpmyadmin`. Here, you can import the database dump you copied earlier.

8. **Configure Database Connection**: In the `config.php` file of the project, ensure that the database connection settings match your local MySQL configuration.

9. **Access BookApp**: Access the application through your web browser by navigating to `http://localhost/bookapp`.

With these steps completed, you should have the BookApp fully functional on your local XAMPP environment, complete with its MySQL database.


Please note that this setup is for local development and testing purposes. In a production environment, you would need to set up the database and configuration according to your hosting provider's guidelines.




## Usage
- 🛍️ Seller Dashboard
- 📝 Registration and Login: Register for a seller account if you don't have one. Log in to access your dashboard.

- 📈 Dashboard: In the dashboard, you can manage your selling books, including creating new books, updating book details, and deleting books.



## 📖 Buyer's Page
- 📜 Book Listing: Visit the buyer's page to view the available books. No login is required for this.

- 🛒 Direct Purchase: Select the books you want to buy and proceed to purchase without the need for a user account.

## Contributing
Contributions are welcome! If you'd like to contribute to the BookApp project, please follow these steps:

1. Fork the repository.

2. Create a new branch for your feature or bug fix.

3. Make your changes and commit them with descriptive commit messages.

4. Push your changes to your fork.

5. Submit a pull request, detailing the changes you've made.
