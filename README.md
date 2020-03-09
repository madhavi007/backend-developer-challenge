# Back End Developer Challenge 2020 #

#### First Task
Your project is to develop an administration panel using Laravel that allows a user to save quotes from their favourite TV show to a MySQL database.

Your administration panel requires CRUD functionality for three fields: Season, Episode & Quote.

You’re then to build a page to output the information the user has saved to the database.

##### BONUS:
Insert a random photo alongside each quote, accessed via [https://picsum.photos/](https://picsum.photos/) API.

##### Development Notes For First Task
1. Added Auth functionality in project

2. Made model and migration for UserQuote.

3. Defined routes, method to pass data from controller to view and store and update data in database.

4. Added Bootstrap, FontAwesome and Jquery CDN for elements display. 

5. Added packages such as Toastr for toast message,Image for store images to specific place.


#### Second Task
In the same Laravel project, I want you to write an artisan command to output to console screen, the average prices for each of the food items by state.

I have attached the SQL file for the copi table. I have also attached the SQL for the states table.
You can find the SQL files for copi and states tables in the repo.

I want you to correctly use models for this. Including a one to many relationship. The average query should be one per state. You should make use of selectRaw to make SQL avg() queries for each of the food items, rather than an average line query for each item.

I want the output to look like this (1 line per state):

Alabama: Steak (X), Ground Beef (X), Sausage (X), Fried Chicken (X), Tuna (X)

Where X is the average value by state. So it should be all 50 states output to the terminal screen.

The objective is to do this with the minimum queries to the database.

##### Development Notes For Second Task

1. Made model and migration for both tables.

2. Imported both tables to database.

3. Made command CountItem in laravel.

4. Added query logic in command handle.

5. Call command in console using count:item

#### Future Tasks

1. Add pagination in all display files.

2. Add filters based on newest,oldest etc.

3. Add search by user_id, episode, season or quote.

4. Add permission in users table to access pages.

5. Much more can be added with suggestion and feedback.

6. Do checkout my personal website made using basic front end technology [here](https://madhavi007.github.io/MadhaviJariwala/)
