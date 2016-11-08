firebase-chat
=============

1. You will need PHP 5.5.9 or higher & an instance of MySQL 5.5 or higher set up on your machine
1. Go to https://console.firebase.google.com/ and sign up for firebase and create a new Project
2. Go to Project Settings > Service Accounts > Under "Legacy Credentials" Choose "Database Secrets" > Under "Secrets" click "Show" > Copy secret key
3. Clone the project repository from: https://github.com/rwblyth/mcr-digital2-php (master) onto your local machine
4. Navigate to your cloned code in "Git Bash" on windows or the command line on Mac / Linux
5. Install composer if you do not already have it: https://getcomposer.org/doc/00-intro.md
6. Then in the directory where you cloned the code do a: composer install
7. Run the following command from the root of the cloned code: cp app/config/parameters.yml.dist app/config/parameters.yml
8. Open app/config/parameters.yml in an editor and provide the information as described (create a new database for the project)
9. Then finally to run your project run: php bin/console server:start
10. Visit the URL shown in the output
