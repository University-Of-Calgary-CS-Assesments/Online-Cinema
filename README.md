
# Online Cinema Project


This is an online cinema project developed with Laravel. This project allows users to register, purchase tickets for movies, and manage their ticket history. It also includes an admin panel to manage the movies, show times, and tickets.



## Setup

### Clone the repository

First, clone the repository to your local machine:
``` shell
git clone https://github.com/University-Of-Calgary-CS-Assesments/Online-Cinema.git
```

### Install dependencies

Next, navigate to the project directory and install the dependencies:
``` shell
cd Online-Cinema
composer install
npm install
```

### Modify the environment file
Modify the .env by setting up the database configuration:

``` shell
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=online_cinema
DB_USERNAME=root
DB_PASSWORD=
```

### Import the database
Import the online_cinema.sql file, which is located at Database directory, into your database:

``` shell
mysql -u root -p online_cinema < online_cinema.sql
```

### Generate an application key

Generate an application key for the project:
``` shell
php artisan key:generate
```

### Run the server

Finally, start the server:
``` shell
php artisan serve
```

You can now access the application by navigating to http://localhost:8000 in your web browser.

## Usage

### User Registration
Users can register for the site by clicking on the "Register" link in the navigation bar. They will be prompted to enter their name, email address, and password.

### Purchasing Tickets
Once logged in, users can purchase tickets by clicking on the "Buy Tickets" link in the navigation bar. They will be presented with a list of available movies, show times, and seats. They can then select the desired options and click "Purchase" to buy the tickets.

### Ticket History
Users can view their ticket history by clicking on the "My Tickets" link in the navigation bar. They can see a list of their purchased tickets, including the movie title, show time, seat number, and purchase date.

### Admin Panel
Admin users can access the admin panel by navigating to http://localhost:8000/admin in their web browser. They will be prompted to enter their email address and password.

In the admin panel, they can manage the movies, show times, and tickets. They can add new movies, update existing ones, and delete movies that are no longer available. They can also view the list of tickets and update their status (purchased, cancelled, expired).
## License
This project is licensed under the MIT License. See the LICENSE file for details.