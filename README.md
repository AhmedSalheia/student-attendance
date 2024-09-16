# this project for Web Course
## this project for recording the attendance of students in lectures
## what's in the project ?
### Admin user
1. admin can create edit delete students, tutors and courses
2. deside which students and tutors in the courses
### Tutor user
1. the tutor can see the courses that belong to him and see lectures of the courses
2. can create lecutres and record the attendance by search of student id (a few things in this section)
3. (#TODO) can upload file contian the student ids and record thim as attended

## what we use to build tis project
1. Laravel 9
2. MySql 8
3. Bootstrap 5

## what we can do to make this project more helpful
- [ ] make chart for admin and tutor
- [ ] make api for easy adding the models (course, students, and tutors) 
- [ ] create scheduling for schedule the lectures

## how to run the project
first there is a few programs needed
1. `PHP 8.1.4` Link:
2. `Composer lastest` Link:
3. `mysql 8.0.28` Link:

open the terminal in the main folder

make sure you install PHP correctly and added to enviroment variable you can search in google `how to add php in enviroment variable windows 10`

now we need to install project packges, run:
```
composer install
```

run this command for copy env file

```
composer run post-root-package-install
```
open `.env` file and change DB connection settings as your enviroment
here an example of my env
```
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=web
DB_USERNAME=root
DB_PASSWORD=Password123
```
to make sure the connection work currectlly run this command
```
php artisan db:monitor
```
after all we need to generate `APP_KEY` for project run 
```
php arttisan key:generate
```
now we're ready to run the project and there is tow way to run it

1. you can run temporary by terminal 
```
php artisan serve
```
2. or using `apache|nginx` by opening the file in `public/index.php`
make sure the domain directory is the `public` folder to not allow any user open other files and see the content of the project


thank you at all
  we hope this project helpful

craeted by: Hamza Masoud, 
