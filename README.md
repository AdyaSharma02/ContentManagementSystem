# Content Management System (CMS)


# Overview
The Content Management System (CMS) is designed to facilitate the creation, management, and modification of digital content. This system ensures secure access for users, efficient content management, and comprehensive feedback collection.




# User Interface Technologies
•	PHP
•	HTML
•	CSS
•	JavaScript
•	Bootstrap





# Database
•	Database Name: cms
•	Tables:
o	feedback
o	login_logout
o	posts
o	user_list





# Features
1. Secure Login/Logout and SignIn
•	Description: Secure login and logout functionality to ensure only authorized users can access the system.
•	Files:
o	LoginForm.html
o	Login.php
o	Logout.php
o	SignIn.php

2. HomePage
•	Description: The main dashboard of the system.
•	File:
o	Index.html

3. Manage Feedback
•	Description: Collect and manage user feedback.
•	Feedback Details:
o	Username
o	FeedbackText
o	FeedbackDate
•	File:
o	Feedback.php

4. Manage Posts
•	Description: Create, view, edit, and delete posts.
•	Post Details:
o	ID
o	Username
o	Email
o	Category
o	Date
o	Content
o	Status
•	Files:
o	Posts.php
o	EditPost.php
o	DeletePost.php
o	UpdatePost.php

5. Manage User List
•	Description: Manage users, including viewing and editing user details.
•	User Details:
o	ID
o	Username
o	Email
o	Full Name
o	Address
o	Phone Number
•	File:
o	UserList.php

6. Manage Account Details
•	Description: View and manage user account details.
•	File:
o	AccountDetails.php





# Installation and Setup

1.	Clone the Repository:
git clone https://github.com/AdyaSharma02/ContentManagementSystem.git

2.	Navigate to the Project Directory:

3.	Setup Database:
o	Import the cms.sql file into your MySQL database.

4.	Configure Database Connection:
o	Update the database connection details in config.php.

5.	Run the Application:
o	Open the project in a local server environment (e.g., XAMPP, WAMP).

6.	Access the Application




# Usage

1.	Login:
o	Enter your username and password on the login page.

2.	Navigate to Different Sections:
o	Use the navigation menu to access different sections like feedback, posts, user management, and account details.

3.	Manage Feedback:
o	Add, view, or delete user feedback.

4.	Manage Posts:
o	Create new posts and update or delete existing ones.

5.	Manage Users:
o	Add, edit, or delete user information.

6.	View Account Details:
o	View and update your account details.




#Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.
