# Laravel Technical Assignment

# TO BE SUBMITTED BY 23:59, ON THE 20th OF OCTOBER 2024

## Description

This assignment will help in assessing your technical skills. From ^php8.0 syntax to code structure, appropriate coding principles and design patterns, and last but not least proper and relevant test coverage.

## Project

An employee management software, nothing fancy it's just a simple API with a little bit of advanced features to showcase your skills😎 and knowledge of the Laravel framework.

## Stack/Tools

- Laravel 11
- PHP Unit / Pest for tests
- Laravel Sail
- Laravel Sanctum for authentication
- laravel-snappy(for pdf reports)
- Laravel Excel(for excel reports)
- Mailpit
- OpenApi specification(v3) for documentating **all** your endpoints. Use php 8 **attributes** NOT _docblocks_

## Features

- Full authentication system using Sanctum(Register, Login, Logout, Forgot password, Password reset)
- Employee CRUD, with minimum fields(names,email,employeeIdentifier,phoneNumber) all we care about is the thing to work
- Attendance management, record when an employee arrives at the office and when they leave
- Send email(using queues) to the employee when an attendance record is made
- Generate attendance report(pdf & excel) with daily attendance data
- Add a clear and concise readme that explains all the needed steps to deploy and run test of the project in a local environment

## Bonus Points
To make your application standout from the lot🤓😉

- Add github actions that run all tests on PR events
- Add Laravel Octane powered by FrankenPHP server

## Submission
- Share the link to your public github repository containing your code

**All features must be fully and properly tested!!!**

**PS: You don't need to wait until the deadline to submit your work😉**
